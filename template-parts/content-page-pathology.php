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
			<?php the_title( '<h1 class="entry-title txt-vert">', '</h1>' ); ?>
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
<div class="textesPatho w80 flex-item-center tiny-w100 mbl">
	<div class="flex-container">
		
		<?php
		if (get_field('intervention')) {
			echo '<div class="w33 small-w100 tiny-w100 mtl mbl txtcenter">';
				echo '<div>';
					echo '<h2><span class="inbl prm">'.__('Intervention','wpblank2017_s').'</span></h2>';
					echo '<div id="intervention">';
					echo '<div class="text">'.get_field('intervention').'</div>';
					echo '</div>';
				echo '</div>';
			echo '</div>';
		}
		if (get_field('suites')) {
			echo '<div class="w33 small-w100 tiny-w100 mtl mbl txtcenter">';
				echo '<div class="mlm small-ma0 tiny-ma0">';
					echo '<h2><span class="inbl">'.__('Postoperative <br>suites','wpblank2017_s').'</span></h2>';
					echo '<div id="suites">';
					echo '<div class="text">'.get_field('suites').'</div>';
					echo '</div>';
				echo '</div>';
			echo '</div>';
		}
		if (get_field('effets')) {
			echo '<div class="w33 small-w100 tiny-w100 mtl mbl txtcenter">';
				echo '<div class="mlm small-ma0 tiny-ma0 small-pa0 tiny-pa0">';
					echo '<h2><span class="mlm small-ma0 tiny-ma0 inbl">'.__('Side effects','wpblank2017_s').'</span></h2>';
					echo '<div id="effets">';
					echo '<div class="text">'.get_field('effets').'</div>';
					echo '</div>';
				echo '</div>';
			echo '</div>';
		}
		?>
<?php if ( $post->post_parent ) { ?>
 <a class="button mtl flex-item-center" href="<?php echo get_permalink( $post->post_parent ); ?>" >
    <?php $parentTitle = get_the_title( $post->post_parent );
	printf(__('Go back to page %s'), $parentTitle, 'wpblank2017_s')
	?>
	
 </a> 
<?php } ?>
	</div>
</div>
<?php
/* Restore original Post Data */
wp_reset_postdata();
// Reset Query
wp_reset_query();

?>
<script type="text/javascript">
	 jQuery(window).load(function() {
			var intervention = document.getElementById('intervention');
						Ps.initialize(intervention);
			var effets = document.getElementById('effets');
						Ps.initialize(effets);
			var suites = document.getElementById('suites');
						Ps.initialize(suites);
    });
</script>