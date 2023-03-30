<?php
/**
 * Ecommerce Zone functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Ecommerce Zone
 */

include get_theme_file_path( 'vendor/wptrt/autoload/src/Ecommerce_Zone_Loader.php' );

$ecommerce_zone_loader = new \WPTRT\Autoload\Ecommerce_Zone_Loader();

$ecommerce_zone_loader->ecommerce_zone_add( 'WPTRT\\Customize\\Section', get_theme_file_path( 'vendor/wptrt/customize-section-button/src' ) );

$ecommerce_zone_loader->ecommerce_zone_register();

if ( ! function_exists( 'ecommerce_zone_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function ecommerce_zone_setup() {

		add_theme_support( 'responsive-embeds' );

		add_theme_support( 'woocommerce' );

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

        add_image_size('ecommerce-zone-featured-header-image', 2000, 660, true);

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus( array(
            'primary' => esc_html__( 'Primary','ecommerce-zone' ),
	        'footer'=> esc_html__( 'Footer Menu','ecommerce-zone' ),
        ) );

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
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

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
add_action( 'after_setup_theme', 'ecommerce_zone_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function ecommerce_zone_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'ecommerce_zone_content_width', 1170 );
}
add_action( 'after_setup_theme', 'ecommerce_zone_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function ecommerce_zone_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'ecommerce-zone' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'ecommerce-zone' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Home Sidebar', 'ecommerce-zone' ),
		'id'            => 'sidebar-2',
		'description'   => esc_html__( 'Add widgets here.', 'ecommerce-zone' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 1', 'ecommerce-zone' ),
		'id'            => 'ecommerce-zone-footer1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5 class="footer-column-widget-title">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 2', 'ecommerce-zone' ),
		'id'            => 'ecommerce-zone-footer2',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5 class="footer-column-widget-title">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 3', 'ecommerce-zone' ),
		'id'            => 'ecommerce-zone-footer3',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5 class="footer-column-widget-title">',
		'after_title'   => '</h5>',
	) );
}
add_action( 'widgets_init', 'ecommerce_zone_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function ecommerce_zone_scripts() {

	require_once get_theme_file_path( 'inc/wptt-webfont-loader.php' );

		wp_enqueue_style(
			'roboto',
			wptt_get_webfont_url( 'https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap' ),
			array(),
			'1.0'
		);

    // load bootstrap css
    wp_enqueue_style( 'bootstrap-css',get_template_directory_uri() . '/assets/css/bootstrap.css');

    wp_enqueue_style( 'ecommerce-zone-block-editor-style', get_theme_file_uri('/assets/css/block-editor-style.css') );

		// fontawesome
		wp_enqueue_style( 'fontawesome-css',get_template_directory_uri().'/assets/css/fontawesome/css/all.css' );

		wp_enqueue_style( 'owl.carousel-css',get_template_directory_uri().'/assets/css/owl.carousel.css' );

    wp_enqueue_style( 'ecommerce-zone-style', get_stylesheet_uri() );

    wp_style_add_data('ecommerce-zone-style', 'rtl', 'replace');

    wp_enqueue_script('jquery-js',get_template_directory_uri() . '/assets/js/jquery.js', array(), '', true );

    wp_enqueue_script('owl.carousel-js',get_template_directory_uri() . '/assets/js/owl.carousel.js', array(), '', true );

    wp_enqueue_script('ecommerce-zone-theme-js',get_template_directory_uri() . '/assets/js/theme-script.js', array(), '', true );

    wp_enqueue_script('ecommerce-zone-skip-link-focus-fix',get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20151215', true);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'ecommerce_zone_scripts' );

function ecommerce_zone_styles() {
	if ( !class_exists( 'Theme_Font' ) ) {
		wp_enqueue_style( 'theme-font', 'https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i', array(), null );
	}
}
add_action( 'enqueue_block_editor_assets', 'ecommerce_zone_styles' );

/**
 * Enqueue theme color style.
 */
function ecommerce_zone_theme_color() {

    $ecommerce_zone_theme_color_css = '';
    $ecommerce_zone_theme_color = get_theme_mod('ecommerce_zone_theme_color');
		$ecommerce_zone_theme_color_2 = get_theme_mod('ecommerce_zone_theme_color_2');
    $ecommerce_zone_preloader_bg_color = get_theme_mod('ecommerce_zone_preloader_bg_color');
    $ecommerce_zone_preloader_dot_1_color = get_theme_mod('ecommerce_zone_preloader_dot_1_color');
    $ecommerce_zone_preloader_dot_2_color = get_theme_mod('ecommerce_zone_preloader_dot_2_color');

    if(get_theme_mod('ecommerce_zone_preloader_bg_color') == '') {
			$ecommerce_zone_preloader_bg_color = '#000';
	}
	if(get_theme_mod('ecommerce_zone_preloader_dot_1_color') == '') {
		$ecommerce_zone_preloader_dot_1_color = '#fff';
	}
	if(get_theme_mod('ecommerce_zone_preloader_dot_2_color') == '') {
		$ecommerce_zone_preloader_dot_2_color = '#fd8e35';
	}

	$ecommerce_zone_theme_color_css = '
		.sticky .entry-title::before,.main-navigation .menu > li > a:hover,.main-navigation .sub-menu,#button,.sidebar input[type="submit"],.comment-respond input#submit,.post-navigation .nav-previous a:hover, .post-navigation .nav-next a:hover, .posts-navigation .nav-previous a:hover, .posts-navigation .nav-next a:hover,.pro-button a:hover, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover, .woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover,.wp-block-button__link,.serv-box:hover,.woocommerce-account .woocommerce-MyAccount-navigation ul li,.btn-primary,span.cart-value,.toggle-nav.mobile-menu button,.woocommerce .woocommerce-ordering select,.woocommerce ul.products li.product .onsale, .woocommerce span.onsale,.slider-inner-box a:hover, .cat-pro-inner-box a:hover,span.onsale,.stick_header,.admin-bar .head-menu.stick_header {
			background: '.esc_attr($ecommerce_zone_theme_color).';
		}
		a,.sidebar a:hover,#colophon a:hover, #colophon a:focus,p.price, .woocommerce ul.products li.product .price, .woocommerce div.product p.price, .woocommerce div.product span.price,.woocommerce-message::before, .woocommerce-info::before,.navbar-brand a {
			color: '.esc_attr($ecommerce_zone_theme_color).';
		}
		.woocommerce-message, .woocommerce-info,.wp-block-pullquote,.wp-block-quote, .wp-block-quote:not(.is-large):not(.is-style-large), .wp-block-pullquote,.btn-primary,.pro-button a:hover, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover, .woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover,.slider-inner-box a:hover, .cat-pro-inner-box a:hover,#homepage-product h3{
			border-color: '.esc_attr($ecommerce_zone_theme_color).';
		}
		#button:hover,#button:active,.sidebar h5{
			background: '.esc_attr($ecommerce_zone_theme_color_2).';
		}
		#homepage-product h3,.socialmedia p,.user-account a,.sidebar li,.sidebar a,.sidebar select,.sidebar .tagcloud a,.cart_no i{
			color: '.esc_attr($ecommerce_zone_theme_color_2).';
		}
		.loading{
			background-color: '.esc_attr($ecommerce_zone_preloader_bg_color).';
		 }
		 @keyframes loading {
		  0%,
		  100% {
		  	transform: translatey(-2.5rem);
		    background-color: '.esc_attr($ecommerce_zone_preloader_dot_1_color).';
		  }
		  50% {
		  	transform: translatey(2.5rem);
		    background-color: '.esc_attr($ecommerce_zone_preloader_dot_2_color).';
		  }
		}
	';
    wp_add_inline_style( 'ecommerce-zone-style',$ecommerce_zone_theme_color_css );

}
add_action( 'wp_enqueue_scripts', 'ecommerce_zone_theme_color' );

/**
 * Enqueue S Header.
 */
function ecommerce_zone_sticky_header() {

  $ecommerce_zone_sticky_header = get_theme_mod('ecommerce_zone_sticky_header');

  $ecommerce_zone_custom_style= "";

  if($ecommerce_zone_sticky_header != true){

    $ecommerce_zone_custom_style .='.stick_header{';

      $ecommerce_zone_custom_style .='position: static;';

    $ecommerce_zone_custom_style .='}';
  }

  wp_add_inline_style( 'ecommerce-zone-style',$ecommerce_zone_custom_style );

}
add_action( 'wp_enqueue_scripts', 'ecommerce_zone_sticky_header' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/custom-header.php';

/*dropdown page sanitization*/
function ecommerce_zone_sanitize_dropdown_pages( $page_id, $setting ) {
	// Ensure $input is an absolute integer.
	$page_id = absint( $page_id );
	// If $page_id is an ID of a published page, return it; otherwise, return the default.
	return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
}

//select sanitization function
function ecommerce_zone_sanitize_select( $input, $setting ){

    //input must be a slug: lowercase alphanumeric characters, dashes and underscores are allowed only
    $input = sanitize_key($input);

    //get the list of possible select options
    $choices = $setting->manager->get_control( $setting->id )->choices;

    //return input if valid or return default option
    return ( array_key_exists( $input, $choices ) ? $input : $setting->default );

}

function ecommerce_zone_sanitize_number_absint( $number, $setting ) {
	// Ensure $number is an absolute integer (whole number, zero or greater).
	$number = absint( $number );

	// If the input is an absolute integer, return it; otherwise, return the default
	return ( $number ? $number : $setting->default );
}

function ecommerce_zone_sanitize_phone_number( $phone ) {
	return preg_replace( '/[^\d+]/', '', $phone );
}

/**
 * Fix skip link focus in IE11.
 *
 * This does not enqueue the script because it is tiny and because it is only for IE11,
 * thus it does not warrant having an entire dedicated blocking script being loaded.
 *
 * @link https://git.io/vWdr2
 */
function ecommerce_zone_skip_link_focus_fix() {
	?>
	<script>
	/(trident|msie)/i.test(navigator.userAgent)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",function(){var t,e=location.hash.substring(1);/^[A-z0-9_-]+$/.test(e)&&(t=document.getElementById(e))&&(/^(?:a|select|input|button|textarea)$/i.test(t.tagName)||(t.tabIndex=-1),t.focus())},!1);
	</script>
	<?php
}
add_action( 'wp_print_footer_scripts', 'ecommerce_zone_skip_link_focus_fix' );

function ecommerce_zone_sanitize_checkbox( $input ) {
  // Boolean check
  return ( ( isset( $input ) && true == $input ) ? true : false );
}

/**
 * Get CSS
 */

function ecommerce_zone_getpage_css($hook) {
	if ( 'appearance_page_ecommerce-zone-info' != $hook ) {
		return;
	}
	wp_enqueue_style( 'ecommerce-zone-demo-style', get_template_directory_uri() . '/assets/css/demo.css' );
}
add_action( 'admin_enqueue_scripts', 'ecommerce_zone_getpage_css' );

add_action('after_switch_theme', 'ecommerce_zone_setup_options');

function ecommerce_zone_setup_options () {
	wp_redirect( admin_url() . 'themes.php?page=ecommerce-zone-info.php' );
}

if ( ! defined( 'ECOMMERCE_ZONE_CONTACT_SUPPORT' ) ) {
define('ECOMMERCE_ZONE_CONTACT_SUPPORT',__('https://wordpress.org/support/theme/ecommerce-zone','ecommerce-zone'));
}
if ( ! defined( 'ECOMMERCE_ZONE_REVIEW' ) ) {
define('ECOMMERCE_ZONE_REVIEW',__('https://wordpress.org/support/theme/ecommerce-zone/reviews/#new-post','ecommerce-zone'));
}
if ( ! defined( 'ECOMMERCE_ZONE_LIVE_DEMO' ) ) {
define('ECOMMERCE_ZONE_LIVE_DEMO',__('https://www.themagnifico.net/eard/ecommerce-wordpress-theme/','ecommerce-zone'));
}
if ( ! defined( 'ECOMMERCE_ZONE_GET_PREMIUM_PRO' ) ) {
define('ECOMMERCE_ZONE_GET_PREMIUM_PRO',__('https://www.themagnifico.net/themes/ecommerce-wordpress-theme/','ecommerce-zone'));
}
if ( ! defined( 'ECOMMERCE_ZONE_PRO_DOC' ) ) {
define('ECOMMERCE_ZONE_PRO_DOC',__('https://www.themagnifico.net/eard/wathiqa/ecommerce-pro-doc','ecommerce-zone'));
}

add_action('admin_menu', 'ecommerce_zone_themepage');
function ecommerce_zone_themepage(){
	$theme_info = add_theme_page( __('Theme Options','ecommerce-zone'), __('Theme Options','ecommerce-zone'), 'manage_options', 'ecommerce-zone-info.php', 'ecommerce_zone_info_page' );
}

function ecommerce_zone_info_page() {
	$user = wp_get_current_user();
	$ecommerce_zone_theme = wp_get_theme();
	?>
	<div class="wrap about-wrap ecommerce-zone-add-css">
		<div>
			<h1>
				<?php esc_html_e('Welcome To ','ecommerce-zone'); ?><?php echo esc_html( $ecommerce_zone_theme ); ?>
			</h1>
			<div class="feature-section three-col">
				<div class="col">
					<div class="widgets-holder-wrap">
						<h3><?php esc_html_e("Contact Support", "ecommerce-zone"); ?></h3>
						<p><?php esc_html_e("Thank you for trying Ecommerce Zone , feel free to contact us for any support regarding our theme.", "ecommerce-zone"); ?></p>
						<p><a target="_blank" href="<?php echo esc_url( ECOMMERCE_ZONE_CONTACT_SUPPORT ); ?>" class="button button-primary get">
							<?php esc_html_e("Contact Support", "ecommerce-zone"); ?>
						</a></p>
					</div>
				</div>
				<div class="col">
					<div class="widgets-holder-wrap">
						<h3><?php esc_html_e("Checkout Premium", "ecommerce-zone"); ?></h3>
						<p><?php esc_html_e("Our premium theme comes with extended features like demo content import , responsive layouts etc.", "ecommerce-zone"); ?></p>
						<p><a target="_blank" href="<?php echo esc_url( ECOMMERCE_ZONE_GET_PREMIUM_PRO ); ?>" class="button button-primary get">
							<?php esc_html_e("Get Premium", "ecommerce-zone"); ?>
						</a></p>
					</div>
				</div>
				<div class="col">
					<div class="widgets-holder-wrap">
						<h3><?php esc_html_e("Review", "ecommerce-zone"); ?></h3>
						<p><?php esc_html_e("If You love Ecommerce Zone theme then we would appreciate your review about our theme.", "ecommerce-zone"); ?></p>
						<p><a target="_blank" href="<?php echo esc_url( ECOMMERCE_ZONE_REVIEW ); ?>" class="button button-primary get">
							<?php esc_html_e("Review", "ecommerce-zone"); ?>
						</a></p>
					</div>
				</div>
			</div>
		</div>
		<hr>
		<h2><?php esc_html_e("Free Vs Premium","ecommerce-zone"); ?></h2>
		<div class="ecommerce-zone-button-container">
			<a target="_blank" href="<?php echo esc_url( ECOMMERCE_ZONE_PRO_DOC ); ?>" class="button button-primary get">
				<?php esc_html_e("Checkout Documentation", "ecommerce-zone"); ?>
			</a>
			<a target="_blank" href="<?php echo esc_url( ECOMMERCE_ZONE_LIVE_DEMO ); ?>" class="button button-primary get">
				<?php esc_html_e("View Theme Demo", "ecommerce-zone"); ?>
			</a>
		</div>
		<table class="wp-list-table widefat">
			<thead class="table-book">
				<tr>
					<th><strong><?php esc_html_e("Theme Feature", "ecommerce-zone"); ?></strong></th>
					<th><strong><?php esc_html_e("Basic Version", "ecommerce-zone"); ?></strong></th>
					<th><strong><?php esc_html_e("Premium Version", "ecommerce-zone"); ?></strong></th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td><?php esc_html_e("Header Background Color", "ecommerce-zone"); ?></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Custom Navigation Logo Or Text", "ecommerce-zone"); ?></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Hide Logo Text", "ecommerce-zone"); ?></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Premium Support", "ecommerce-zone"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Fully SEO Optimized", "ecommerce-zone"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Recent Posts Widget", "ecommerce-zone"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Easy Google Fonts", "ecommerce-zone"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Pagespeed Plugin", "ecommerce-zone"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Only Show Header Image On Front Page", "ecommerce-zone"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Show Header Everywhere", "ecommerce-zone"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Custom Text On Header Image", "ecommerce-zone"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Full Width (Hide Sidebar)", "ecommerce-zone"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Only Show Upper Widgets On Front Page", "ecommerce-zone"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Replace Copyright Text", "ecommerce-zone"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Customize Upper Widgets Colors", "ecommerce-zone"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Customize Navigation Color", "ecommerce-zone"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Customize Post/Page Color", "ecommerce-zone"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Customize Blog Feed Color", "ecommerce-zone"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Customize Footer Color", "ecommerce-zone"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Customize Sidebar Color", "ecommerce-zone"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Customize Background Color", "ecommerce-zone"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Importable Demo Content	", "ecommerce-zone"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
			</tbody>
		</table>
		<div class="ecommerce-zone-button-container">
			<a target="_blank" href="<?php echo esc_url( ECOMMERCE_ZONE_GET_PREMIUM_PRO ); ?>" class="button button-primary get">
				<?php esc_html_e("Go Premium", "ecommerce-zone"); ?>
			</a>
		</div>
	</div>
	<?php
}
