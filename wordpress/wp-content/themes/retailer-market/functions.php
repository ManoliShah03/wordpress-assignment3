<?php
/**
 * Retailer Market functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Retailer Market
 */

if ( ! defined( 'ECOMMERCE_ZONE_URL' ) ) {
    define( 'ECOMMERCE_ZONE_URL', esc_url( 'https://www.themagnifico.net/themes/retailer-market-wordpress-theme/', 'retailer-market') );
}
if ( ! defined( 'ECOMMERCE_ZONE_TEXT' ) ) {
    define( 'ECOMMERCE_ZONE_TEXT', __( 'Retailer Market Pro','retailer-market' ));
}
if ( ! defined( 'ECOMMERCE_ZONE_CONTACT_SUPPORT' ) ) {
define('ECOMMERCE_ZONE_CONTACT_SUPPORT',__('https://wordpress.org/support/theme/retailer-market','retailer-market'));
}
if ( ! defined( 'ECOMMERCE_ZONE_REVIEW' ) ) {
define('ECOMMERCE_ZONE_REVIEW',__('https://wordpress.org/support/theme/retailer-market/reviews/#new-post','retailer-market'));
}
if ( ! defined( 'ECOMMERCE_ZONE_LIVE_DEMO' ) ) {
define('ECOMMERCE_ZONE_LIVE_DEMO',__('https://www.themagnifico.net/demo/retailer-market/','retailer-market'));
}
if ( ! defined( 'ECOMMERCE_ZONE_GET_PREMIUM_PRO' ) ) {
define('ECOMMERCE_ZONE_GET_PREMIUM_PRO',__('https://www.themagnifico.net/themes/retailer-market-wordpress-theme/','retailer-market'));
}
if ( ! defined( 'ECOMMERCE_ZONE_PRO_DOC' ) ) {
define('ECOMMERCE_ZONE_PRO_DOC',__('https://www.themagnifico.net/eard/wathiqa/retailer-market-pro-doc/','retailer-market'));
}

function retailer_market_admin_scripts() {
    // demo CSS
    wp_enqueue_style( 'retailer-market-demo-css', get_theme_file_uri( 'assets/css/demo.css' ) );
    }
    add_action( 'admin_enqueue_scripts', 'retailer_market_admin_scripts' );


function retailer_market_enqueue_styles() {
    wp_enqueue_style( 'bootstrap-css', esc_url(get_template_directory_uri()) . '/assets/css/bootstrap.css');
    $retailer_market_parentcss = 'ecommerce-zone-style';
    $retailer_market_theme = wp_get_theme(); wp_enqueue_style( $retailer_market_parentcss, get_template_directory_uri() . '/style.css', array(), $retailer_market_theme->parent()->get('Version'));
    wp_enqueue_style( 'retailer-market-style', get_stylesheet_uri(), array( $retailer_market_parentcss ), $retailer_market_theme->get('Version'));

    wp_enqueue_script('retailer-market-child-theme-js', esc_url(get_theme_file_uri()) . '/assets/js/child-theme-script.js', array( 'jquery' ), true );

    wp_enqueue_script( 'comment-reply', '/wp-includes/js/comment-reply.min.js', array(), false, true );
}

add_action( 'wp_enqueue_scripts', 'retailer_market_enqueue_styles' );

function retailer_market_customize_register($wp_customize){

    $wp_customize->add_setting('retailer_market_free_delivery_text',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('retailer_market_free_delivery_text',array(
        'label' => esc_html__('Free Delivery Text','retailer-market'),
        'section' => 'ecommerce_zone_social_info_block',
        'setting' => 'retailer_market_free_delivery_text',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('retailer_market_free_delivery_link',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('retailer_market_free_delivery_link',array(
        'label' => esc_html__('Free Delivery Link','retailer-market'),
        'section' => 'ecommerce_zone_social_info_block',
        'setting' => 'retailer_market_free_delivery_link',
        'type'  => 'url'
    ));

    $wp_customize->add_setting('retailer_market_privacy_policy_text',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('retailer_market_privacy_policy_text',array(
        'label' => esc_html__('Privacy Policy Text','retailer-market'),
        'section' => 'ecommerce_zone_social_info_block',
        'setting' => 'retailer_market_privacy_policy_text',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('retailer_market_privacy_policy_link',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('retailer_market_privacy_policy_link',array(
        'label' => esc_html__('Privacy Policy Link','retailer-market'),
        'section' => 'ecommerce_zone_social_info_block',
        'setting' => 'retailer_market_privacy_policy_link12',
        'type'  => 'url'
    ));

    $wp_customize->add_setting('retailer_market_sale_btn_text',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('retailer_market_sale_btn_text',array(
        'label' => esc_html__('Sale Button Text','retailer-market'),
        'section' => 'ecommerce_zone_social_info_block',
        'setting' => 'retailer_market_sale_btn_text',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('retailer_market_sale_btn_link',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('retailer_market_sale_btn_link',array(
        'label' => esc_html__('Sale Button Link','retailer-market'),
        'section' => 'ecommerce_zone_social_info_block',
        'setting' => 'retailer_market_sale_btn_link',
        'type'  => 'url'
    ));

    // Social Media
    $wp_customize->add_section('retailer_market_social_media',array(
        'title' => esc_html__('Social Media','retailer-market'),
    ));

    $wp_customize->add_setting('retailer_market_facebook_icon',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('retailer_market_facebook_icon',array(
        'label' => esc_html__('Social Icon','retailer-market'),
        'section' => 'retailer_market_social_media',
        'setting' => 'retailer_market_facebook_icon',
        'type'  => 'text',
        'default' => 'fab fa-facebook-f',
        'description' =>  __('Select font awesome icons <a target="_blank" href="https://fontawesome.com/v5/search?m=free">Click Here</a> for select icon. for eg:-fab fa-facebook-f','retailer-market')
    ));

    $wp_customize->add_setting('retailer_market_facebook_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('retailer_market_facebook_url',array(
        'label' => esc_html__('Facebook Link','retailer-market'),
        'section' => 'retailer_market_social_media',
        'setting' => 'retailer_market_facebook_url',
        'type'  => 'url'
    ));

    $wp_customize->add_setting('retailer_market_pinterest_icon',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('retailer_market_pinterest_icon',array(
        'label' => esc_html__('Social Icon','retailer-market'),
        'section' => 'retailer_market_social_media',
        'setting' => 'retailer_market_pinterest_icon',
        'type'  => 'text',
        'default' => 'fab fa-pinterest-p',
        'description' =>  __('Select font awesome icons <a target="_blank" href="https://fontawesome.com/v5/search?m=free">Click Here</a> for select icon. for eg:-fab fa-pinterest-p','retailer-market')
    ));

    $wp_customize->add_setting('retailer_market_pintrest_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('retailer_market_pintrest_url',array(
        'label' => esc_html__('Pinterest Link','retailer-market'),
        'section' => 'retailer_market_social_media',
        'setting' => 'retailer_market_pintrest_url',
        'type'  => 'url'
    ));

     $wp_customize->add_setting('retailer_market_instagram_icon',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('retailer_market_instagram_icon',array(
        'label' => esc_html__('Social Icon','retailer-market'),
        'section' => 'retailer_market_social_media',
        'setting' => 'retailer_market_instagram_icon',
        'type'  => 'text',
        'default' => 'fab fa-instagram',
        'description' =>  __('Select font awesome icons <a target="_blank" href="https://fontawesome.com/v5/search?m=free">Click Here</a> for select icon. for eg:-fab fa-instagram','retailer-market')
    ));

    $wp_customize->add_setting('retailer_market_intagram_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('retailer_market_intagram_url',array(
        'label' => esc_html__('Intagram Link','retailer-market'),
        'section' => 'retailer_market_social_media',
        'setting' => 'retailer_market_intagram_url',
        'type'  => 'url'
    ));

    $wp_customize->add_setting('retailer_market_linkedin_icon',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('retailer_market_linkedin_icon',array(
        'label' => esc_html__('Social Icon','retailer-market'),
        'section' => 'retailer_market_social_media',
        'setting' => 'retailer_market_linkedin_icon',
        'type'  => 'text',
        'default' => 'fab fa-linkedin-in',
        'description' =>  __('Select font awesome icons <a target="_blank" href="https://fontawesome.com/v5/search?m=free">Click Here</a> for select icon. for eg:-fab fa-linkedin-in','retailer-market')
    ));

    $wp_customize->add_setting('retailer_market_linkedin_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('retailer_market_linkedin_url',array(
        'label' => esc_html__('Linkedin Link','retailer-market'),
        'section' => 'retailer_market_social_media',
        'setting' => 'retailer_market_linkedin_url',
        'type'  => 'url'
    ));

    $wp_customize->add_setting('ecommerce_zone_cat_slider_title',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('ecommerce_zone_cat_slider_title',array(
        'label' => esc_html__('Category Section Title','retailer-market'),
        'section' => 'ecommerce_zone_cat_product',
        'setting' => 'ecommerce_zone_cat_slider_title',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('ecommerce_zone_cat_slider_text',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('ecommerce_zone_cat_slider_text',array(
        'label' => esc_html__('Category Section Text','retailer-market'),
        'section' => 'ecommerce_zone_cat_product',
        'setting' => 'ecommerce_zone_cat_slider_text',
        'type'  => 'text'
    ));
}
add_action('customize_register', 'retailer_market_customize_register');

if ( ! function_exists( 'retailer_market_setup' ) ) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function retailer_market_setup() {

        add_theme_support( 'responsive-embeds' );

        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support( 'title-tag' );

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support( 'post-thumbnails' );

        add_image_size('retailer-market-featured-header-image', 2000, 660, true);

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         * to output valid HTML5.
         */
        add_theme_support( 'html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ) );

        // Set up the WordPress core custom background feature.
        add_theme_support( 'custom-background', apply_filters( 'ecommerce_zone_custom_background_args', array(
            'default-color' => '',
            'default-image' => '',
        ) ) );

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support( 'custom-logo', array(
            'height'      => 50,
            'width'       => 50,
            'flex-width'  => true,
        ) );

        add_editor_style( array( '/editor-style.css' ) );

        add_theme_support( 'align-wide' );

        add_theme_support( 'wp-block-styles' );
    }
endif;
add_action( 'after_setup_theme', 'retailer_market_setup' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function retailer_market_widgets_init() {
        register_sidebar( array(
        'name'          => esc_html__( 'Sidebar', 'retailer-market' ),
        'id'            => 'sidebar',
        'description'   => esc_html__( 'Add widgets here.', 'retailer-market' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h5 class="widget-title">',
        'after_title'   => '</h5>',
    ) );
}
add_action( 'widgets_init', 'retailer_market_widgets_init' );

function retailer_market_remove_customize_register() {
    global $wp_customize;
    $wp_customize->remove_section( 'ecommerce_zone_color_option' );
    $wp_customize->remove_section( 'ecommerce_zone_general_settings' );

    $wp_customize->remove_setting( 'ecommerce_zone_phone_number_info' );
    $wp_customize->remove_control( 'ecommerce_zone_phone_number_info' );

    $wp_customize->remove_setting( 'ecommerce_zone_email_info' );
    $wp_customize->remove_control( 'ecommerce_zone_email_info' );

    $wp_customize->remove_setting( 'ecommerce_zone_location_info' );
    $wp_customize->remove_control( 'ecommerce_zone_location_info' );
}
add_action( 'customize_register', 'retailer_market_remove_customize_register', 11 );

function retailer_market_sanitize_select( $input, $setting ){
    $input = sanitize_key($input);
    $choices = $setting->manager->get_control( $setting->id )->choices;
    return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}


function social_button_shortcode( $atts ) {
    $atts = shortcode_atts( array(
        'type' => '',
    ), $atts );

    if ( $atts['type'] == 'twitter' ) {
        return '<a href="https://twitter.com/share" target="_blank"><i class="fab fa-twitter"></i></a>';
    } elseif ( $atts['type'] == 'facebook' ) {
        return '<a href="https://www.facebook.com/sharer/sharer.php?u=' . get_permalink() . '" target="_blank"><i class="fab fa-facebook"></i></a>';
    }
}
add_shortcode( 'social_button', 'social_button_shortcode' );