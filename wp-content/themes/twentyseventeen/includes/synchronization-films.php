<?php

/*
 * Catch save_post action
 */
function catch_save_post( $post_id, $post ) {

    $data = array();

    $post_type = get_post_type_object( $post->post_type );

    if( $post->post_type == 'films' ) {

        $sync_post              = get_post_meta( $post_id, '_sync_post', true );
        $data['_sync_post']     = $post_id;
        $data['_films_price']   = get_post_meta( $post_id, '_films_price', true );
        $data['thumbnail_id']   = get_post_thumbnail_id( $post_id );

        if( $sync_post && get_post( $sync_post ) ) { // update product

            product_from_film( add_data_to_post( $post, $data ), $sync_post );

        } else { // create product

               $product_id = product_from_film( add_data_to_post( $post, $data ) );

               update_post_meta( $post_id, '_sync_post', $product_id );
        }

//        wp_update_post( $post );
    }
}

add_action( 'save_post', 'catch_save_post', 20, 2 );

/*
 * Add custom data to Post obj
 */
function add_data_to_post( $post, $data ) {

    foreach( $data as $k => $v ) {
        $post->$k = $v;
    }

    return $post;
}

/*
 * Create / Update Product
 */
function product_from_film( $film, $product_id = null ) {

    $arr = array(
            'post_title'    => $film->post_title,
            'post_content'  => $film->post_content,
            'post_status'   => $film->post_status,
            'post_type'     => 'product',
            'post_excerpt'  => $film->post_excerpt
        );

    if( ! $product_id ) { // create product

        $product_id = wp_insert_post( $arr );

        wp_set_object_terms( $product_id, 'simple', 'product_type' );
    } else { // update product

        $arr['ID'] = $product_id;

        wp_update_post( $arr );
    }

    $terms = array();

    $taxonomy = 'films_category';

    $terms = wp_get_post_terms( $film->ID, $taxonomy );

    if ( $terms ) {

        $terms = wp_list_pluck( $terms, 'term_id' );
    }

    // set product terms from Films films_category taxonomy
    wp_set_object_terms( $product_id, $terms, $taxonomy );

    // update product meta
    update_post_meta( $product_id, '_visibility', 'visible' );
    update_post_meta( $product_id, '_virtual', 'yes' );
    update_post_meta( $product_id, '_regular_price', $film->_films_price );
    update_post_meta( $product_id, '_price', $film->_films_price );
    update_post_meta( $product_id, '_sync_post', $film->_sync_post );

    // set product thumbnail
    require_once( ABSPATH . 'wp-admin/includes/post.php' );
    require_once( ABSPATH . 'wp-admin/includes/image.php' );
    require_once( ABSPATH . 'wp-admin/includes/file.php' );
    require_once( ABSPATH . 'wp-admin/includes/media.php' );

    set_post_thumbnail( $product_id, $film->thumbnail_id );

    return $product_id;
}

/*
 * Catch after_delete_post action - Delete Product
 */
function catch_delete_post( $post_id ){

    global $post_type;

    if( $post_type != 'films' ) {

        return;
    }

    $post = get_post( $post_id );

    $sync_post = get_post_meta( $post_id, '_sync_post', true );

    if( $sync_post && get_post( $sync_post ) ) {
        // delete product
        wp_delete_post( $sync_post, true );
    }
}

add_action( 'after_delete_post', 'catch_delete_post' );
