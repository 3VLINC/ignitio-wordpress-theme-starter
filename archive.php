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
		
			else:
			
				get_template_part('template-parts/not-found');
				
			endif;
		
		 	do_action(Theme\Actions::A_CONTENT_APPEND); 
		
		 ?>

	</div>
	
	<aside class="secondary-area">

		<?php get_template_part('template-parts/blog-widget-area'); ?>

	</aside>
	
</div><!-- end .page-home -->
	
<?php

	get_template_part('template-parts/page--footer'); 

?>