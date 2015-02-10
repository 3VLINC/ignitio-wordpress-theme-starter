				
			<?php do_action(Theme\Actions::A_MAIN_APPEND); ?>

		</main><!-- end #<?php echo Theme\Theme::getMainID(); ?> -->
			
		<footer id="footer" class="page-footer">

			<?php do_action(Theme\Actions::A_FOOTER_PREPEND); ?>
			
			<aside class="widget-area--footer">

				<?php Theme\WidgetAreas::outputWidgetArea(Theme\WidgetAreas::WA_FOOTER); ?>

				<section class="contact-us">
					
					<ul class="follow-us">
					
						<?php
							
							foreach (Theme\Theme::getSocialMediaChannels() as $handle => $name){
								
								if(get_theme_mod($handle)!='http://' && get_theme_mod($handle)!=''){
								
									printf ('<li class="follow-us--link"><a href="%s" class="fc-webicon %s">%s</a></li>', get_theme_mod($handle), $handle, $name);
									
									
								}
									
							}
						
						?>
					
					</ul>

				</section>
	
			</aside><!-- end .at-a-glance -->

			<?php 

				$copyright = get_theme_mod(Theme\ThemeCustomizations::SK_FOOTER_COPYRIGHT);

				echo (!empty($copyright)) ? sprintf('<div class="copyright"><p>%s</p></div>',esc_html($copyright)) : '';

			?>

			<?php do_action(Theme\Actions::A_FOOTER_APPEND); ?>
			
		</footer>

		<?php wp_footer(); ?>

	</body>
	
</html>