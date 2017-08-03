<?php 
/*
	Template Name: Page Accueil
*/
get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<div class="grid w100 tiny-hidden">
				<?php
					get_template_part( 'template-parts/blochome', '01_video' );
				 ?>
			</div>
			<div class="flex-container pas">
				<div class="w50 grid-6-small-4 tiny-w100 prm">
					<div class="two-thirds push small-w100 tiny-w100 medium-w100 ">
					<?php
					while ( have_posts() ) : the_post();
		
						get_template_part( 'template-parts/content', 'homepage' );
		
					endwhile; // End of the loop.
					?>
					</div>
				</div>
				<div class="w50 tiny-w100 pls">
				<?php
					get_template_part( 'template-parts/blochome', '03_actualite' );
				 ?>
				</div>
			</div>
			<div class="grid w100 fl bloc4">
				<?php
					get_template_part( 'template-parts/blochome', '04_boutons' );
				 ?>
			</div>
			<div class="flex-container clear txtcenter blocsListes">
				<div class="w33 flex-container  tiny-w100 small-w50 pal medium-w50">
					<div class="flex-item-center">
					<?php
						get_template_part( 'template-parts/blochome', '05_adultes' );
					 ?>
					</div>
				 </div>
				<div class="w33 flex-container  tiny-w100 small-w50  medium-w50">
					<div class="flex-item-center">
					<?php
						get_template_part( 'template-parts/blochome', '07_qualite' );
					 ?>
					</div>
				 </div>
				<div class="w33 flex-container  tiny-w100 small-w50 pal medium-w50 bg-grisclair">
					<div class="flex-item-center">
					<?php
						get_template_part( 'template-parts/blochome', '06_enfants' );
					 ?>
					</div>
				 </div>
				<div class="w33 flex-container  tiny-w100 small-w50 pal medium-w50 bg-grisclair">
					<div class="flex-item-center">
					<?php
						get_template_part( 'template-parts/blochome', '09_sejour' );
					 ?>
					</div>
				 </div>
				<div class="w33 flex-container  tiny-w100 small-w50 pal medium-w50 bg-bleugris txt-blanc">
					<div class="flex-item-center">
					<?php
						get_template_part( 'template-parts/blochome', '10_documents' );
					 ?>
					</div>
				 </div>
				<div class="w33 flex-container  tiny-w100 small-w50 medium-w50">
					<div class="flex-item-center">
					<?php
						get_template_part( 'template-parts/blochome', '11_formalites' );
					 ?>
					</div>
				 </div>
			</div>
			<div class="flex-container clear pam">
				<div class="w33 tiny-w100 medium-w50 small-w50 pbs pal tiny-pa0 mbm">
				<?php
					get_template_part( 'template-parts/blochome', '12_video' );
				 ?>
				 </div>
				<div class="w33 tiny-w100 medium-w50 small-w50 pal tiny-pa0 mbm">
				<?php
					get_template_part( 'template-parts/blochome', '13_follow' );
				 ?>
				 </div>
				<div class="w33  tiny-w100 medium-w100 small-w100 blochome-map pal tiny-pa0">
				<?php
					get_template_part( 'template-parts/blochome', '14_plan' );
				 ?>
				 </div>
			 </div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
