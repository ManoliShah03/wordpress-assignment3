<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Ecommerce Zone
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php if ( function_exists( 'wp_body_open' ) ) { wp_body_open();} else { do_action( 'wp_body_open' ); }
    $ecommerce_zone_sticky_header = get_theme_mod('ecommerce_zone_sticky_header');
    $ecommerce_zone_data_sticky = "false";
    if ($ecommerce_zone_sticky_header) {
        $ecommerce_zone_data_sticky = "true";
    }
?>
<?php if(get_theme_mod('ecommerce_zone_preloader_hide','')){ ?>
    <div class="loading">
        <div class="dot"></div>
        <div class="dot"></div>
        <div class="dot"></div>
    </div>
<?php } ?>

<style type="text/css"> header#masthead{ background-image: url('<?php header_image(); ?>'); }</style>
<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#main"><?php esc_html_e('Skip to content', 'ecommerce-zone'); ?></a>
    <header id="masthead" class="site-header fixed-top shadow-sm navbar-dark bg-primary">
        <div class="socialmedia">
            <?php get_template_part('template-parts/socialmedia/socialinfo', 'social'); ?>
        </div>
        <div class="logo-head">
            <?php get_template_part('template-parts/socialmedia/header-logo', 'social'); ?>
        </div>
        <div class="head-menu" data-sticky="<?php echo esc_attr($ecommerce_zone_data_sticky); ?>">
            <?php get_template_part('template-parts/navigation/navigation', 'top'); ?>
        </div>
    </header>
