
		<h3><?php the_field('titre_sejour'); ?></h3>
		   <?php if( have_rows('liens_sejour') ): ?>
			
			   <ul>
			
			   <?php while( have_rows('liens_sejour') ): the_row();
				$intitule_du_lien = get_sub_field('intitule_du_lien');
				$lien = get_sub_field('lien');
			   ?>
			
				   <li><a href="<?php echo $lien; ?>"><?php echo $intitule_du_lien; ?></a></li>
				  
				   
			   <?php endwhile; ?>
			
			   </ul>
			
		   <?php endif; ?>