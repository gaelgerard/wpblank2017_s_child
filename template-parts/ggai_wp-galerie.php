
		<?php
			if( get_field('videos') ): 
					while( has_sub_field('videos') ):
					$url = get_sub_field('url');
					?>
					<div class="video">
						<?php echo html_entity_decode($url) ?>
					</div>
					<?php endwhile; ?>
				<?php endif; ?>
		<?php
			if( get_field('gallery') ): 
				$images = get_field('gallery');
				?><style>
#main .flex-direction-nav a::before {
    font-size: 30px;
}</style>
	<div class="flexslider">
			<ul class="slides">
           <?php
		    foreach( $images as $image ):
				$width= $image['sizes']['headercateg-width'];
				$height= $image['sizes']['headercateg-height'];
				$src= $image['sizes']['headercateg'];
				$src_large= $image['full'];
				$alt= $image['alt'];
				if (empty ($image['alt'])) {
					$alt= $image['title'];
				};
                $alt = htmlentities($alt);
                $alt = str_replace('-', ' ',$alt);
				$alt = ucfirst($alt);

	//var_dump($image);
	?>
			<li>
				<article class="<?php echo $class_image; ?> <?php echo $class_texte; ?>">
                    <div class="image">
						<img width="<?php echo $width; ?>" height="<?php echo $height; ?>" src="<?php echo $src; ?>" alt="<?php echo $alt; ?>">
					 </div>
                 </article>
            </li>
					<?php endforeach; ?>
				<?php endif; ?></ul>
    </div><!--ggai_wp-gallery-->