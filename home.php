<?php

	get_template_part('template-parts/page--header');			

?>

<div class="template--home">

	<div class="primary-area">
	
		<?php 
		
			do_action(Theme\Actions::A_CONTENT_PREPEND);
		
			if (have_posts()) : 
		
				while ( have_posts() ) : the_post();
		
					get_template_part('template-parts/post--excerpt');
		
				endwhile;

		?>
				
			<?php get_template_part('template-parts/pagination'); ?>
		
		<?php
		
			else:
			
				get_template_part('template-parts/not-found');
				
			endif;
		
		 	do_action(Theme\Actions::A_CONTENT_APPEND); 
		
		 ?>

	</div><!-- end .primary-area -->

	<aside class="secondary-area">

		<?php get_template_part('template-parts/blog-widget-area'); ?>

	</aside>
	
</div><!-- end .template-home -->
	
<?php

	get_template_part('template-parts/page--footer'); 

?>