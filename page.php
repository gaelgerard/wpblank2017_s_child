<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Wordpress_blank_theme
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

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

			<?php if ( $post->post_parent ) { ?>
			<div class="flex-container">
				<a class="button mtl flex-item-center" href="<?php echo get_permalink( $post->post_parent ); ?>" >
				   <?php $parentTitle = get_the_title( $post->post_parent );
				   printf(__('Go back to page %s'), $parentTitle, 'wpblank2017_s')
				   ?>
				   
				</a>
			</div>
			<?php } ?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
