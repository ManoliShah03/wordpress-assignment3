<?php
/**
* Template Name: Left sidebar
 */

get_header(); ?>

    <div id="primary" class="content-area">
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

<?php get_footer();