<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Wordpress_blank_theme
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<?php if ( function_exists('yoast_breadcrumb') ) {
			yoast_breadcrumb('<p id="breadcrumbs">','</p>');
			} ?>
<p id="breadcrumbs"><span xmlns:v="http://rdf.data-vocabulary.org/#"><span typeof="v:Breadcrumb"><a href="<?php echo get_bloginfo('url'); ?>" rel="v:url" property="v:title"><Home><?php _e('Home','wpblank2017_s'); ?></a> &gt; <span rel="v:child" typeof="v:Breadcrumb">
	<p class="the_category"><?php $terms = get_terms("category_pathology"); $count = count($terms); if ( $count > 0 ){ foreach ( $terms as $term ) { echo $term->name.' &gt; '; } } ?></p><span class="breadcrumb_last">Lithotritie extra-corporelle</span></span></span></span></p>
		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', get_post_format() );

			the_post_navigation();

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
