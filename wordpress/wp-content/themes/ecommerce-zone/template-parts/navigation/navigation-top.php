<?php
/**
 * Displays top navigation
 *
 * @package Ecommerce Zone
 */
?>
<div class="toggle-nav mobile-menu">
    <?php if(has_nav_menu('primary')){ ?>
        <button onclick="ecommerce_zone_openNav()" class="mobiletoggle"><i class="fas fa-bars"></i><span class="screen-reader-text"><?php esc_html_e('Open Button','ecommerce-zone'); ?></span></button>
    <?php }?>
</div>
<div class="container">
    <div class="row">
        <div class="col-lg-10 col-md-8">
            <div id="mySidenav" class="nav sidenav">
                <nav id="site-navigation" class="main-navigation navbar navbar-expand-xl" aria-label="<?php esc_attr_e( 'Top Menu', 'ecommerce-zone' ); ?>">
                    <?php if(has_nav_menu('primary')){ ?>
                        <?php
                            wp_nav_menu(
                                array(
                                    'theme_location' => 'primary',
                                    'menu_class'     => 'menu',
                                    'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                                )
                            );
                        ?>
                    <?php }?>
                </nav>
                <a href="javascript:void(0)" class="closebtn mobile-menu" onclick="ecommerce_zone_closeNav()"><i class="fas fa-times"></i><span class="screen-reader-text"><?php esc_html_e('Close Button','ecommerce-zone'); ?></span></a>
            </div>
        </div>
        <div class="col-lg-2 col-md-4">
            <?php if(class_exists('woocommerce')){ ?>
                <div class="user-account">
                    <?php if ( is_user_logged_in() ) { ?>
                        <a href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>" title="<?php esc_attr_e('My Account','ecommerce-zone'); ?>"><?php esc_html_e('My Account','ecommerce-zone'); ?></a>
                    <?php } 
                    else { ?>
                        <a href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>" title="<?php esc_attr_e('Login / Register','ecommerce-zone'); ?>"><?php esc_html_e('Login / Register','ecommerce-zone'); ?></a>
                    <?php } ?>
                </div>
            <?php }?>
        </div>
    </div>
</div>