<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Ecommerce Zone
 */
get_header(); ?>
    <div class="container">
        <div class="row my-4">
            <section id="primary" class="content-area col-lg-9 col-md-9">
                <main id="main" class="site-main module-border-wrap">
                    <div class="row">
                        <?php if (have_posts()) : ?>
                            <header class="page-header">
                                <h4 class="page-title">
                                    <?php
                                        /* translators: %s: search query. */
                                        printf(esc_html__('Search Results for: %s', 'ecommerce-zone'), '<span>' . get_search_query() . '</span>');
                                    ?>
                                </h4>
                            </header>
                            <?php
                            /* Start the Loop */
                            while (have_posts()) : the_post();

                                /**
                                 * Run the loop for the search to output the results.
                                 * If you want to overload this in a child theme then include a file
                                 * called content-search.php and that will be used instead.
                                 */
                                get_template_part('template-parts/content', 'search');

                            endwhile;

                            the_posts_navigation();

                        else :

                            get_template_part('template-parts/content', 'none');

                        endif; ?>
                    </div>
                </main>
            </section>
            <aside id="secondary" class="widget-area col-lg-3 col-md-3">
                <div class="sidebar ">
                    <?php dynamic_sidebar( 'sidebar-1' ); ?>
                </div>
            </aside>
        </div>
    </div>
<?php
get_footer();