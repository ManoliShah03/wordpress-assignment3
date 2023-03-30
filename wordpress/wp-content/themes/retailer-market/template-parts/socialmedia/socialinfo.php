<?php
/**
 * Displays top navigation
 *
 * @package Retailer Market
 */
?>

<div class="container">
	<div class="row">
		<div class="col-lg-4 col-md-4 align-self-center">
			<?php if( get_theme_mod('retailer_market_free_delivery_link') != '' || get_theme_mod('retailer_market_free_delivery_text') != ''){ ?>
				<a href="<?php echo esc_url(get_theme_mod('retailer_market_free_delivery_link','')); ?>" class="mr-2"><i class="fas fa-truck mr-2"></i><?php echo esc_html(get_theme_mod('retailer_market_free_delivery_text','')); ?></a>
			<?php }?>
			<?php if( get_theme_mod('retailer_market_privacy_policy_link') != '' || get_theme_mod('retailer_market_privacy_policy_text') != '' ){ ?>
				<a href="<?php echo esc_url(get_theme_mod('retailer_market_privacy_policy_link','')); ?>"><i class="fas fa-globe mr-2"></i><?php echo esc_html(get_theme_mod('retailer_market_privacy_policy_text','')); ?></a>
			<?php }?>
		</div>
		<div class="col-lg-3 col-md-4 align-self-center">
					<?php if(get_theme_mod('retailer_market_facebook_url') != ''){ ?>
						<a href="<?php echo esc_url(get_theme_mod('retailer_market_facebook_url','')); ?>"><i class="<?php echo esc_attr( get_theme_mod('retailer_market_facebook_icon') ); ?>"></i></a>
					<?php }?>
					<?php if(get_theme_mod('retailer_market_pintrest_url') != ''){ ?>
						<a href="<?php echo esc_url(get_theme_mod('retailer_market_pintrest_url','')); ?>"><i class="<?php echo esc_attr( get_theme_mod('retailer_market_pinterest_icon') ); ?>"></i></a>
					<?php }?>
					<?php if(get_theme_mod('retailer_market_intagram_url') != ''){ ?>
						<a href="<?php echo esc_url(get_theme_mod('retailer_market_intagram_url','')); ?>"><i class="<?php echo esc_attr( get_theme_mod('retailer_market_instagram_icon') ); ?>"></i></a>
					<?php }?>
					<?php if(get_theme_mod('retailer_market_linkedin_url') != ''){ ?>
						<a href="<?php echo esc_url(get_theme_mod('retailer_market_linkedin_url','')); ?>"><i class="<?php echo esc_attr( get_theme_mod('retailer_market_linkedin_icon') ); ?>"></i></a>
					<?php }?>
		</div>
		<div class="col-lg-5 col-md-4 align-self-center">
			<?php if(class_exists('woocommerce')){ ?>
                <div class="user-account">
                    <?php if ( is_user_logged_in() ) { ?>
                        <a href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>" title="<?php esc_attr_e('My Account','retailer-market'); ?>"><?php esc_html_e('My Account','retailer-market'); ?></a>
                    <?php }
                    else { ?>
                        <a href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>" title="<?php esc_attr_e('Login / Register','retailer-market'); ?>"><?php esc_html_e('Login / Register','retailer-market'); ?></a>
                    <?php } ?>
                </div>
            <?php }?>
		</div>
	</div>
</div>
