<?php 
/*
	Template Name: Page Category
*/
get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<?php
			if ( function_exists('yoast_breadcrumb') ) {
			yoast_breadcrumb('
			<p id="breadcrumbs">','</p>
			');
			}
			?>
			<?php
			while ( have_posts() ) : the_post();
				get_template_part('template-parts/ggai_wp-galerie');	
				get_template_part( 'template-parts/content', 'page' );
				get_template_part( 'template-parts/content', 'page-category' );
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
