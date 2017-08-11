
<div class="textesPatho w80 flex-item-center tiny-w100 mbl mtm">
	<div class="flex-container">
		<div class="flex-container  mbm pbs">
		<?php
		if (get_field('intervention')) {
			echo '<div class="w33 small-w100 tiny-w100 mtm  txtcenter">';
				echo '<div>';
					echo '<h2><span class="inbl prm">'.__('Intervention','wpblank2017_s').'</span></h2>';
					echo '<div id="intervention">';
					echo '<div class="text">'.get_field('intervention').'</div>';
					echo '</div>';
				echo '</div>';
			echo '</div>';
		}
		if (get_field('suites')) {
			echo '<div class="w33 small-w100 tiny-w100 mtm  txtcenter">';
				echo '<div class="mlm small-ma0 tiny-ma0">';
					echo '<h2><span class="inbl">'.__('Postoperative <br>suites','wpblank2017_s').'</span></h2>';
					echo '<div id="suites">';
					echo '<div class="text">'.get_field('suites').'</div>';
					echo '</div>';
				echo '</div>';
			echo '</div>';
		}
		if (get_field('effets')) {
			echo '<div class="w33 small-w100 tiny-w100 mtm  txtcenter">';
				echo '<div class="mlm small-ma0 tiny-ma0 small-pa0 tiny-pa0">';
					echo '<h2><span class="mlm small-ma0 tiny-ma0 inbl">'.__('Side effects','wpblank2017_s').'</span></h2>';
					echo '<div id="effets">';
					echo '<div class="text">'.get_field('effets').'</div>';
					echo '</div>';
				echo '</div>';
			echo '</div>';
		}
		?>
		</div>
	<?php
		get_template_part( 'template-parts/bloc', 'praticiens' );
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