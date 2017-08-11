
		<?php
			$post_parent = $post->post_parent;
			//echo $post_parent;
			if( get_field('gallery') ){ 
				$images = get_field('gallery');
			}elseif (!get_field('gallery')) {
				if ( $post_parent == 4 || $post_parent == 5){ 
					$images = get_field('gallery', 4);
				}if ( $post_parent == 12){ 
					$images = get_field('gallery', 12);
				}else {
					$images = get_field('gallery', 3);
					
				}
			}
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
				$img_sizes = wp_calculate_image_sizes(array($width,$height), $src, $imageMeta );					

	//var_dump($image);
	?>
			<li>
						<img width="<?php echo $width; ?>" height="<?php echo $height; ?>" src="<?php echo $src; ?>" alt="<?php echo $alt; ?>" srcset="<?php echo esc_attr( $img_srcset ); ?>" sizes="<?php echo esc_attr( $img_sizes ); ?>"	 >
            </li>
					<?php endforeach; ?>
			</ul>
    </div><!--ggai_wp-gallery-->
	