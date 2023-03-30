<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if ( !function_exists( 'chld_thm_cfg_locale_css' ) ):
    function chld_thm_cfg_locale_css( $uri ){
        if ( empty( $uri ) && is_rtl() && file_exists( get_template_directory() . '/rtl.css' ) )
            $uri = get_template_directory_uri() . '/rtl.css';
        return $uri;
    }
endif;
add_filter( 'locale_stylesheet_uri', 'chld_thm_cfg_locale_css' );
         
if ( !function_exists( 'child_theme_configurator_css' ) ):
    function child_theme_configurator_css() {
        wp_enqueue_style( 'chld_thm_cfg_child', trailingslashit( get_stylesheet_directory_uri() ) . 'style.css', array( 'astra-theme-css','woocommerce-layout','woocommerce-smallscreen','woocommerce-general' ) );
    }
endif;
add_action( 'wp_enqueue_scripts', 'child_theme_configurator_css', 10 );

// END ENQUEUE PARENT ACTION


add_action('init', 'custom_post_type_movies');
function custom_post_type_movies() {
    $supports = array(
        'title', // post title
        'editor', // post content
        'author', // post author
        'thumbnail', // featured images
        'excerpt', // post excerpt
        'custom-fields', // custom fields
        'comments', // post comments
        'revisions', // post revisions
        'post-formats', // post formats
    );

    $labels = array(
        'name' => _x('Movie', 'plural'),
        'singular_name' => _x('Movie', 'singular'),
        'menu_name' => _x('Movie', 'admin menu'),
        'name_admin_bar' => _x('Movie', 'admin bar'),
        'add_new' => _x('Add New', 'add new'),
        'add_new_item' => __('Add New Movie'),
        'new_item' => __('New Movie'),
        'edit_item' => __('Edit Movie'),
        'view_item' => __('View Movie'),
        'all_items' => __('All Movie'),
        'search_items' => __('Search Movie'),
        'not_found' => __('No Movie found.'),
    );

    $args = array(
        'supports' => $supports,
        'labels' => $labels,
        'description' => 'Holds our movie and specific data',
        'public' => true,
        'taxonomies' => array( 'category'),
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'can_export' => true,
        'capability_type' => 'post',
        'show_in_rest' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'movie'),
        'has_archive' => true,
        'hierarchical' => true,
        'menu_position' => 6,
        'menu_icon' => 'dashicons-megaphone',
    );

    register_post_type('movie', $args); // Register Post type
}

add_filter('pre_get_posts', 'query_post_type');
function query_post_type($query) {
    if( is_category() ) {
        $post_type = get_query_var('post_type');
        if($post_type)
            $post_type = $post_type;
        else
            $post_type = array('nav_menu_item', 'post', 'movie'); // don't forget nav_menu_item to allow menus to work!
        $query->set('post_type',$post_type);
        return $query;
    }
}




