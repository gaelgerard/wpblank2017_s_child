
		<h3><?php the_field('titre_video'); ?></h3>

			
		     <?php if( get_field('lien_video') ): ?>
			<?php
			 
			 // get iframe HTML
			 $iframe = get_field('lien_video');
			 
			 
			 // use preg_match to find iframe src
			 preg_match('/src="(.+?)"/', $iframe, $matches);
			 $src = $matches[1];
			 
			 
			 // add extra params to iframe src
			 $params = array(
				 'controls'    => 0,
				 'hd'        => 1,
				 'autohide'    => 1
			 );
			 
			 $new_src = add_query_arg($params, $src);
			 
			 $iframe = str_replace($src, $new_src, $iframe);
			 
			 
			 // add extra attributes to iframe html
			 $attributes = 'frameborder="0" class="bloc12"';
			 
			 $iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);
			 
			 
			 // echo $iframe
			 echo $iframe;
			 
			 ?>
		
			
		   <?php endif; ?>
			