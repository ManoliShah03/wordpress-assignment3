<?php
/**
 * Displays top navigation
 *
 * @package Ecommerce Zone
 */
?>

<div class="container">
	<div class="row">
	  	<div class="col-lg-3 col-md-4">
		    <div class="navbar-brand">
		        <?php if ( has_custom_logo() ) : ?>
            		<div class="site-logo"><?php the_custom_logo(); ?></div>
          		<?php endif; ?>
          		<?php $ecommerce_zone_blog_info = get_bloginfo( 'name' ); ?>
            		<?php if ( ! empty( $ecommerce_zone_blog_info ) ) : ?>
              			<?php if ( is_front_page() && is_home() ) : ?>
              			<?php if( get_theme_mod('ecommerce_zone_logo_title',true) != ''){ ?>
                			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                		<?php } ?>
              			<?php else : ?>
              				<?php if( get_theme_mod('ecommerce_zone_logo_title',true) != ''){ ?>
	            				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
	            			<?php } ?>
              			<?php endif; ?>
            		<?php endif; ?>
		            <?php
						$ecommerce_zone_description = get_bloginfo( 'description', 'display' );
						if ( $ecommerce_zone_description || is_customize_preview() ) :
		            ?>
		            <?php if( get_theme_mod('ecommerce_zone_theme_description',false) != ''){ ?>
	            		<p class="site-description"><?php echo esc_html($ecommerce_zone_description); ?></p>
	            	<?php } ?>
          		<?php endif; ?>
		    </div>
	  	</div>
	  	<div class="col-lg-7 col-md-6">
	  		<?php if(class_exists('woocommerce')){ ?>
	   			<?php get_product_search_form(); ?>
	   		<?php }?>
	  	</div>
	 	<div class="col-lg-2 col-md-2">
	    	<div class="cart_no">
	  			<?php if(class_exists('woocommerce')){ ?>
		        	<?php global $woocommerce; ?>
		        	<a class="cart-customlocation" href="<?php echo esc_url(wc_get_cart_url()); ?>" title="<?php esc_attr_e( 'shopping cart','ecommerce-zone' ); ?>"><i class="fas fa-shopping-bag"></i><span class="cart-value"><?php echo sprintf ( esc_html( '%d', '%d', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?></span><span class="cart-total"><?php echo wp_kses_data( WC()->cart->get_cart_total() ); ?></span></a>
		        <?php }?>
	      	</div>
	  	</div>
	</div>
</div>
