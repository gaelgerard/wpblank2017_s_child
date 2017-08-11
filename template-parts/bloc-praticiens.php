<?php if( have_rows('nos_praticiens',44) ) : ?>
	  <aside class="practitioners txtcenter mtl mbl fl w100">
		<h3 class="mbs"><span><?php echo __('Our practitioners','wpblank2017_s'); ?></span></h3>
			
		<div class="w100">
			
			   <?php 
				// loop through the rows of data
			  
				// add a counter
				$count = 0;
				$group = 0;
				while( have_rows('nos_praticiens',44) ): the_row();
				 $nom = get_sub_field('nom');
				 $specialisation = get_sub_field('specialisation');
				 if ($count % 5 == 0) {
				   $group++;
				   ?>
					 <div class="line-<?php echo $group; ?>">
				   <?php 
				 }
			   ?>
			
				   <div class="w20 small-w50 tiny-w50 inbl flex-item-center mts mbl tiny-fl small-fl">
					<p><strong><?php echo $nom; ?></strong></p>
					<p><?php echo $specialisation; ?></p>
				   </div>
				   <?php 
				if ($count % 5 == 4) {
				  ?>
					</div><!-- #teachers -->
				  <?php 
				}
				$count++;
				endwhile; ?>
			</div>
	  </aside>
<?php endif; ?>