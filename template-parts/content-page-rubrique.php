
<?php
		$postID = get_the_ID();
		$args = array(
			'post_parent'     => $postID,
			'post_type' => 'page',
			'order_by' => 'title',
			'order' => 'ASC',
		);
		echo '<div class="flex-container w60 tiny-w100 flex-item-center rubriques">';
	
	// The Query
	$the_query = new WP_Query( $args );
	// The Loop
	if ( $the_query->have_posts() ) {
		while ( $the_query->have_posts() ) {
			$the_query->the_post();
			?>
			<div class="linkcateg withimage txtcenter">
			<?php
		 if (has_post_thumbnail()){
				$image=get_the_post_thumbnail( $_post->ID,'linkcateg');
		 }else {
				$image=get_the_post_thumbnail( 19,'linkcateg');

		 };
				echo '<a href="'.get_the_permalink().'">'.$image .'</a>';
			 echo '<h2 class="button flex-item-center w90"><a href="'.get_the_permalink().'">' . get_the_title() . '</a></h2>';
			
	
			
			?>
			</div>
			<?php
		}
	};
		echo '</div>';
/* Restore original Post Data */
wp_reset_postdata();
// Reset Query
wp_reset_query();

?>