
		<?php
			if( get_field('videos') ): 
					while( has_sub_field('videos') ):
					$url = get_sub_field('url');
					?>
					<div class="video pas">
						<?php echo html_entity_decode($url) ?>
					</div>
					<?php endwhile; ?>
				<?php endif; ?>
		<?php
			if( get_field('gallery') ): 
				$images = get_field('gallery');
				$countImages = count( $images );
				if ($countImages >= 2) { //on déclenche le slider
					?><style>
					#content .flexslider {border: 0 none;overflow: hidden;padding-top: 1rem; margin: 0;}
#main .flex-direction-nav a::before {
    font-size: 30px;
}</style>
					<script type="text/javascript"> 
    jQuery(window).load(function() {  
        jQuery('.flexslider').flexslider({  
                  animation: "slide",
					controlNav: false,
					slideshowSpeed: 5000, 
					pauseOnAction: true,
       });  
   });     </script>
	<div class="flexslider">
					<?php
				}else {//on déclenche pas le slider
					?>
	<div class="noslider pts">
		<?php
				}
				?>
			<ul class="slides">
           <?php
		    foreach( $images as $image ):
			$imageID = $image['ID'];
				$width= $image['sizes']['headercateg-width'];
				$height= $image['sizes']['headercateg-height'];
				$src= $image['sizes']['headercateg'];
				$src_large= $image['full'];
				$alt= $image['alt'];
				if (empty ($image['alt'])) {
					$alt= $image['title'];
				};
				$imageMeta = wp_get_attachment_metadata($imageID);
                $alt = htmlentities($alt);
                $alt = str_replace('-', ' ',$alt);
				$alt = ucfirst($alt);
				$img_srcset = wp_calculate_image_srcset(array($width,$height), $src, $imageMeta );						

	//var_dump($image);
	?>
			<li>
						<img width="<?php echo $width; ?>" height="<?php echo $height; ?>" src="<?php echo $src; ?>" alt="<?php echo $alt; ?>" srcset="<?php echo esc_attr( $img_srcset ); ?>" 	 >
            </li>
					<?php endforeach; ?>
				<?php endif; ?></ul>
    </div><!--ggai_wp-gallery-->
	