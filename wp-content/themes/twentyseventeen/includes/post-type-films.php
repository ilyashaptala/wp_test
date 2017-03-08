<?php

function create_post_type_films() {

    register_post_type( 'films', array(
        'labels' => array(
            'name' => __( 'Films' ),
        ),
        'public' => true,
        'has_archive' => true,
        'show_in_nav_menus' => true,
        'menu_icon' => 'dashicons-format-video',
        'rewrite' => array( 'slug' => 'films', 'with_front' => false ),
        'description' => 'Films.',
        'capability_type' => 'page',
        'hierarchical' => false, '_builtin' => false,
        'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt' )
        )
    );

    register_taxonomy( 'films_category', array( 'films' ), array(
        'hierarchical' => true,
        'labels' => array( 'name' => 'Categories' ),
        'show_ui' => true,
        'show_in_nav_menus' => true,
        'label'             => 'Categories',
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array( 'hierarchical' => true, 'slug' => 'films_category' ),
    ) );
}

add_action( 'init', 'create_post_type_films' );

/**
 * Films Price Meta-Box.
 */
require get_parent_theme_file_path( '/includes/films-price-meta-box.php' );

/**
 * Synchronization Films with Product.
 */
require get_parent_theme_file_path( '/includes/synchronization-films.php' );

/**
 * Add field Skype to Woo Register form.
 */
require get_parent_theme_file_path( '/includes/woo-register-form-customize.php' );

/**
 * Add field Skype to Admin User Profile.
 */
require get_parent_theme_file_path( '/includes/user-profile-add-fields.php' );

/**
 * Add field Skype to Admin User Profile.
 */
require get_parent_theme_file_path( '/includes/woo-profile-user-form-customize.php' );
