<div class="map">
	<div class="acf-map">
                        <?php
					$location = get_field('location',1);
					?>
					
					<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>">
					<?php
					    $nom_societe = get_theme_mod( 'nom_societe' );
					   $nom_societe2 = get_theme_mod( 'nom_societe2' );
					    if (!empty($nom_societe))  { ?>
						<p class="name"><strong><?php echo $nom_societe ?></strong></p>
                        <?php }; 
                        if (!empty($nom_societe2)) { ?>
						<p class="slogan"><strong><?php echo $nom_societe2; ?></strong></p>
                        <?php }
                        else if (empty($nom_societe) && empty($nom_societe2)) { ?>
                            
						<p class="name"><strong><?php bloginfo('name'); ?></strong></p>
						<p class="slogan"><strong><?php bloginfo('description'); ?></strong></p>
                        <?php }; ?>
						<?php
						$adresse1_societe = get_theme_mod( 'adresse1_societe' );
						$adresse2_societe = get_theme_mod( 'adresse2_societe' );
						$cp_societe = get_theme_mod( 'cp_societe' );
						$ville_societe = get_theme_mod( 'ville_societe' );
						if (!empty($adresse1_societe)):?>
						<p class="adresse1_societe"><?php echo $adresse1_societe; ?></p>
						<?php endif; 
						if (!empty($adresse2_societe)):?>
						<p class="adresse2_societe"><?php echo $adresse2_societe; ?></p>
						<?php endif; 
						if (!empty($cp_societe) || !empty($ville_societe)):?>
						<p class="cpville_societe"><?php echo $cp_societe; ?> <?php echo $ville_societe; ?></p>
						<?php endif; ?>
						<!--</div>-->
						<!--<div class="col deux">-->
						
						<?php
						$tel = get_theme_mod( 'tel_societe' );
						$tel_url = get_theme_mod( 'tel_url_societe' );
						$fax = get_theme_mod( 'fax_societe' );
						$email = get_theme_mod( 'email_societe' );
						if (!empty($tel) && !empty($tel_url)):?>
						<p><?php echo  __('Tel.', 'wpblank2017_s') ?>: <a href="tel:<?php echo $tel_url; ?>"><?php echo $tel; ?></a></p>
						<?php
						elseif (!empty($tel) && empty($tel_url)):?>
						<p><?php echo  __('Tel.', 'wpblank2017_s') ?><?php echo $tel; ?></p>
						<?php endif; ?>
						<?php if (!empty($fax)):?>
						<p><?php echo  __('Fax', 'wpblank2017_s') ?>: <?php echo $fax; ?></p>
						<?php endif; ?>
						<?php if (!empty($email)):?>
						<p><a href="mailto:<?php echo antispambot($email, 1); ?>"><?php echo $email; ?></a></p>
						<?php endif; ?>
					</div>
	</div>
</div>