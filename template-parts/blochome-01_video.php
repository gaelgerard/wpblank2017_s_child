
			
			   <?php
			   $choix = get_field('choix_bloc_1');
			   
			   if ($choix == "video") {
				?>
					<?php
				
		     if( get_field('video_youtube') ): 
			 
			 // get iframe HTML
			 $iframe = get_field('video_youtube');
			 
			 
			 // use preg_match to find iframe src
			 preg_match('/src="(.+?)"/', $iframe, $matches);
			 $src = $matches[1];
			 
			 
			 // add extra params to iframe src
			 $params = array(
				 'controls'    => 1,
				 'hd'        => 1,
				 'autohide'    => 1,
				 'rel' =>0,
				 'showinfo'=>0,
				 'modestbranding'=>1,
			 );
			 
			 $new_src = add_query_arg($params, $src);
			 
			 $iframe = str_replace($src, $new_src, $iframe);
			 
			 
			 // add extra attributes to iframe html
			 $attributes = 'frameborder="0"';
			 
			 $iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);
			 
			 
			 // echo $iframe
			 echo $iframe;
			 
			 ?>
			
		   <?php endif; 
			   }
			   if ($choix == "diapo") {
				while( have_rows('diaporama_dimage') ): the_row();
				$intitule_du_lien = get_sub_field('intitule_du_lien');
				$lien = get_sub_field('lien_du_slide');
				$class = get_sub_field('classe_du_bouton');
			   ?>
			
				   <div class="w25 tiny-w50 fl"><a href="<?php echo $lien; ?>" class="<?php echo $class; ?>"><?php echo $intitule_du_lien; ?></a></div>
				  
				   
			   <?php endwhile;
			   } else {};
			   
				
			   
			 