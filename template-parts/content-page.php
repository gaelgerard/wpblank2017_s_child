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
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
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
<?php
	$postID = get_the_ID();
    $args = array(
        'post_parent'     => $postID,
		'post_type' => 'page',
    );
// The Query
$the_query = new WP_Query( $args );
 
// The Loop
if ( $the_query->have_posts() ) {
    echo '<ul>';
    while ( $the_query->have_posts() ) {
        $the_query->the_post();
if (is_page(3)){
        echo '<li><a href="'.get_the_permalink().'">' . get_the_post_thumbnail( $_post->ID,'linkcateg') . '' . get_the_title() . '</a></li>';
} else {
		 echo '<li><a href="'.get_the_permalink().'">' . get_the_title() . '</a></li>';

		}
    }
    echo '</ul>';
} else {
    // no posts found
}
/* Restore original Post Data */
wp_reset_postdata();

if (is_page(3)){
    $args = array(
        'post_parent__in'     => array(12,4),
		'post_type' => 'page',
    );
// The Query
$the_query = new WP_Query( $args );
 
// The Loop
if ( $the_query->have_posts() ) {
    echo '<ul>';
    while ( $the_query->have_posts() ) {
        $the_query->the_post();
        echo '<li><a href="'.get_the_permalink().'">' . get_the_title() . '</a></li>';
    }
    echo '</ul>';
} else {
    // no posts found
}
/* Restore original Post Data */
wp_reset_postdata();
}

// Reset Query
wp_reset_query();

?>