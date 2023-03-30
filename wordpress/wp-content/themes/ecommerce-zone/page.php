<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
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
                    <?php
                        while (have_posts()) : the_post();

                            get_template_part('template-parts/content', 'page');

                            // If comments are open or we have at least one comment, load up the comment template.
                            if (comments_open() || get_comments_number()) :
                                comments_template();
                            endif;

                        endwhile; // End of the loop.
                    ?>
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