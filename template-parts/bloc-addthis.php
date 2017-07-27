<?php
						$addthis = get_theme_mod( 'tag_addthis' );
						if (!empty($addthis)):
?>
<div class="share_box">
<!-- AddThis Button BEGIN -->
			<div class="addthis">
				<div class="addthis_inline_follow_toolbox addthis_default_style addthis_32x32_style">
				<!--<a class="addthis_counter addthis_bubble_style"></a>-->
				</div>
				<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=<?php echo $addthis; ?>"></script>
			</div>
						<script type="text/javascript">
var addthis_config = addthis_config||{};
addthis_config.lang = 'fr' //show in Spanish regardless of browser settings;
</script>
			
</div>
						
						<?php endif; ?>	