
		<h3><?php the_field('titre_documents'); ?></h3>
		   <?php if( have_rows('liens_documents') || have_rows('documents') ): ?>
			
			   <ul>
			
		   <?php if( have_rows('liens_documents') ): ?>
			   <?php while( have_rows('liens_documents') ): the_row();
				$intitule_du_lien = get_sub_field('intitule_du_lien');
				$lien = get_sub_field('lien');
			   ?>
			
				   <li><a href="<?php echo $lien; ?>"><?php echo $intitule_du_lien; ?></a></li>
				  
				   
			   <?php endwhile; ?>
			<?php endif; ?>
			
		     <?php if( have_rows('documents') ): ?>
			
			   <?php while( have_rows('documents') ): the_row();
				$intitule_du_lien = get_sub_field('intitule_du_lien');
				$lien = get_sub_field('fichier');
			   ?>
			
				   <li><a href="<?php echo $lien; ?>" target="_blank" class="download"><span><?php echo $intitule_du_lien; ?></span></a></li>
				  
				   
			   <?php endwhile; ?>
			
			   </ul>
		   <?php endif; ?>
		  <?php endif; ?>
			