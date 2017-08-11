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
		/* Restore original Post Data */
		wp_reset_postdata();
		// Reset Query
		wp_reset_query();
		$postID = get_the_ID();
		$args = array(
			'post_parent'     => $postID,
			'post_type' => 'page',
			'order_by' => 'title',
			'order' => 'ASC',
		);
		// The Query
		$the_query = new WP_Query( $args );
		// The Loop
		if ( $the_query->have_posts() ) {
	 ?>
<aside class="your-pathology txtcenter mtl fl w100">
	<h1><?php echo __('Your pathology','wpblank2017_s'); ?></h1>
		<div class="mtl w100 categories">
		<?php
			while ( $the_query->have_posts() ) {
				$the_query->the_post();
				?>
			
			<?php
			 echo '<div class="linkpatho inbl"><h2 class="button flex-container pas bg-bleu"><a class="flex-item-center inbl" href="'.get_the_permalink().'">' . get_the_title() . '<span></span></a></h2></div>';	?>
			
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

?></aside>