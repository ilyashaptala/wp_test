<?php

/*
 * Add Films Price Meta-Box
 */
function add_films_price_meta_boxes() {
    add_meta_box(
        'films_price_meta_boxes',
        __( 'Price' ),
        'render_films_price_meta_box',
        'films',
        'side',
        'default'
    );
}

add_action( 'add_meta_boxes', 'add_films_price_meta_boxes' );

/*
 * Render Films Price Meta-Box
 */
function render_films_price_meta_box( $post ) {

    wp_nonce_field( basename( __FILE__ ), 'films_price_nonce' );
    ?>
        <p>
          <label for="films-price"><?php _e( 'Price' ); ?></label>
          <br />
          <input type="text" name="_films_price" id="films-price" value="<?php echo esc_attr( get_post_meta( $post->ID, '_films_price', true ) ); ?>" required="required" />
        </p>
    <?php
}

/*
 * Save Films Price Meta-Box
 */
function save_films_price_meta_box( $post_id, $post ) {

    if ( !isset( $_POST['films_price_nonce'] ) || !wp_verify_nonce( $_POST['films_price_nonce'], basename( __FILE__ ) ) ) {
        return $post_id;
    }

     $post_type = get_post_type_object( $post->post_type );

    if ( !current_user_can( $post_type->cap->edit_post, $post_id ) ) {
        return $post_id;
    }

    $value = isset( $_POST['_films_price'] ) && ! empty( $_POST['_films_price'] ) ? number_format( $_POST['_films_price'], 2, '.', ',' ) : '' ;

    update_post_meta( $post_id, '_films_price', $value );
}

add_action( 'save_post', 'save_films_price_meta_box', 10, 2 );
