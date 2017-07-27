
			
			   <?php while( have_rows('liens_boutons') ): the_row();
				$intitule_du_lien = get_sub_field('intitule_du_lien');
				$lien = get_sub_field('boutons_liens');
				$class = get_sub_field('classe_du_bouton');
			   ?>
			
				   <div class="w25 tiny-w50 fl">
  <a href="<?php echo $lien; ?>" class="<?php echo $class; ?> flex-container"><span class="flex-item-center"><?php echo $intitule_du_lien; ?></span></a><div class="border80 txt-bleu-80"></div></div>
				  
				   
			   <?php endwhile; ?>