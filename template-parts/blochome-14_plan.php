<div class="prs">
		<h3><?php the_field('titre_plan'); ?></h3>
<div class="map-container flex-item-center">
			<?php
					get_template_part( 'template-parts/map', 'adresse' );
				 ?>

			
		<a href="<?php the_field('lien_plan'); ?>" class="button fr"><?php the_field('intitule_lien_plan'); ?></a></div>
</div>