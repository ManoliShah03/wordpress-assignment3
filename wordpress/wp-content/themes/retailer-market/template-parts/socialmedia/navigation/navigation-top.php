<?php
/**
 * Displays top navigation
 *
 * @package Retailer Market
 */
?>
<div class="toggle-nav mobile-menu">
    <?php if(has_nav_menu('primary')){ ?>
        <button onclick="ecommerce_zone_openNav()" class="mobiletoggle"><i class="fas fa-bars"></i><span class="screen-reader-text"><?php esc_html_e('Open Button','retailer-market'); ?></span></button>
    <?php }?>
</div>
<div class="container">
    <div class="row">
        <div class="col-lg-2 col-md-5 align-self-center">
            <div class="all-categories">
                <?php if(class_exists('woocommerce')){ ?>
                    <button><?php esc_html_e('All Categories','retailer-market'); ?></button>
                    <div class="home_product_cat">
                      <?php $ecommerce_zone_args = array(
                          'number'     => '',
                          'orderby'    => 'title',
                          'order'      => 'ASC',
                          'hide_empty' => '',
                          'include'    => ''
                      );
                      $retailer_market_product_categories = get_terms( 'product_cat', $ecommerce_zone_args );
                      $ecommerce_zone_count = count($retailer_market_product_categories);
                        if ( $ecommerce_zone_count > 0 ){
                          foreach ( $retailer_market_product_categories as $product_category ) {
                          echo '<h4><a href="' . get_term_link( $product_category ) . '">' . $product_category->name . '</a></h4>';
                          $ecommerce_zone_args = array(
                            'posts_per_page' => -1,
                            'tax_query' => array(
                              'relation' => 'AND',
                              array(
                                'taxonomy' => 'product_cat',
                                'field' => 'slug',
                                'terms' => $product_category->slug
                              )
                            ),
                            'post_type' => 'product',
                            'orderby' => 'title,'
                          );
                        }
                      }?>
                    </div>
                <?php }?>
            </div>
        </div>
        <div class="col-lg-8 col-md-2 align-self-center">
            <div id="mySidenav" class="nav sidenav">
                <nav id="site-navigation" class="main-navigation navbar navbar-expand-xl" aria-label="<?php esc_attr_e( 'Top Menu', 'retailer-market' ); ?>">
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
                <a href="javascript:void(0)" class="closebtn mobile-menu" onclick="ecommerce_zone_closeNav()"><i class="fas fa-times"></i><span class="screen-reader-text"><?php esc_html_e('Close Button','retailer-market'); ?></span></a>
            </div>
        </div>
        <div class="col-lg-2 col-md-5 align-self-center">
            <div class="sale-btn">
                <?php if( get_theme_mod('retailer_market_sale_btn_link') != '' || get_theme_mod('retailer_market_sale_btn_text') != '' ){ ?>
                    <a href="<?php echo esc_url(get_theme_mod('retailer_market_sale_btn_link','')); ?>"><?php echo esc_html(get_theme_mod('retailer_market_sale_btn_text','')); ?></a>
                <?php }?>
            </div>
        </div>
    </div>
</div>
