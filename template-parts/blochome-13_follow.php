
		<h3><?php the_field('titre_follow'); ?></h3>

			
		     <?php if( get_field('identifiant_facebook') ):
       $identifiant_facebook = get_field('identifiant_facebook');
       ?>
      <?php echo do_shortcode( ' [custom-facebook-feed id='.$identifiant_facebook.' num=1] '); ?>
			
		   <?php endif; ?>
			