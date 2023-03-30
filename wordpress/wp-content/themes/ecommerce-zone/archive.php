<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Ecommerce Zone
 */

get_header(); ?>
    <div class="container">
        <div class="row my-4">
            <div id="primary" class="content-area col-lg-9 col-md-9">
                <main id="main" class="site-main module-border-wrap">
                    <div class="row">
                        <?php if (have_posts()) : ?>

                            <header class="page-header">
                                <?php
                                the_archive_title('<h2 class="page-title">', '</h2>');
                                the_archive_description('<div class="archive-description">', '</div>');
                                ?>
                            </header>

                            <?php
                            /* Start the Loop */
                            while (have_posts()) :
                                the_post();

                                /*
                                 * Include the Post-Type-specific template for the content.
                                 * If you want to override this in a child theme, then include a file
                                 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
                                 */
                                get_template_part('template-parts/content', get_post_type());

                            endwhile;

                            the_posts_navigation();

                        else :

                            get_template_part('template-parts/content', 'none');

                        endif;
                        ?>
                    </div>
                </main> 
            </div>
            <aside id="secondary" class="widget-area col-lg-3 col-md-3">
                <div class="sidebar ">
                    <?php dynamic_sidebar( 'sidebar-1' ); ?>
                </div>
            </aside>
        </div>
    </div>
<?php 

get_footer();