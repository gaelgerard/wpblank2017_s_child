<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Wordpress_blank_theme
 */

?>

			<?php 

			$images = get_field('gallery');
			if( $images ):
				get_template_part('template-parts/ggai_wp-galerie');			
			endif; ?>
<div class="flex-container">
	<article id="post-<?php the_ID(); ?>" <?php post_class(array('ptl','w60','tiny-w100','flex-item-center','txtcenter')); ?>>
		<header class="entry-header">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		</header><!-- .entry-header -->
	
		<div class="entry-content">
			<?php
				the_content();
	
				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'wpblank2017_s' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->
	
		<?php if ( get_edit_post_link() ) : ?>
			<footer class="entry-footer">
				<?php
					edit_post_link(
						sprintf(
							wp_kses(
								/* translators: %s: Name of current post. Only visible to screen readers */
								__( 'Edit <span class="screen-reader-text">%s</span>', 'wpblank2017_s' ),
								array(
									'span' => array(
										'class' => array(),
									),
								)
							),
							get_the_title()
						),
						'<span class="edit-link">',
						'</span>'
					);
				?>
			</footer><!-- .entry-footer -->
		<?php endif; ?>
	</article><!-- #post-<?php the_ID(); ?> -->
</div>
<div class="your-pathology">
<?php
if (get_field('categorie_a_afficher')) {
$categorie = get_field('categorie_a_afficher');
  $args = array(
        //'category__in'     => $categorie,
		'post_type' => 'pathology',
		'tax_query' => array(
			array(
				'taxonomy' => 'category_pathology',
				'field' => 'term_id',
				'terms' => $categorie,
			),
		   ),
    );
}else {
		$postID = get_the_ID();
		$args = array(
			'post_parent'     => $postID,
			'post_type' => 'page',
			'order_by' => 'title',
			'order' => 'ASC',
		);
	 
}
		echo '<div class="txtcenter mtl w100 categories">';
/* Restore original Post Data */
wp_reset_postdata();
// Reset Query
wp_reset_query();
	// The Query
	$the_query = new WP_Query( $args );
	// The Loop
	if ( $the_query->have_posts() ) {
		while ( $the_query->have_posts() ) {
			$the_query->the_post();
			?>
			
			<?php
			 echo '<div class="linkpatho inbl"><h2 class="button flex-container pas bg-bleu"><a class="flex-item-center" href="'.get_the_permalink().'">' . get_the_title() . '<span></span></a></h2></div>';	?>
			
			<?php
		}
		echo '</div>';
	} else {
		// no posts found
	}
/* Restore original Post Data */
wp_reset_postdata();
// Reset Query
wp_reset_query();

?></div>