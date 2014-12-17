<?php

	get_template_part('template-parts/page--header');			

?>

<div class="template--page">

	<div class="primary-area">

	<?php 
	
		do_action(Theme\Actions::A_CONTENT_PREPEND);
	
		if (have_posts()) : 
	
			while ( have_posts() ) : the_post();
	
				get_template_part('template-parts/page');
	
			endwhile;
	
		else:
		
			get_template_part('template-parts/not-found');
			
		endif;
	
	 	do_action(Theme\Actions::A_CONTENT_APPEND); 
	
	 ?>

	</div>

</div><!-- end .page -->

<?php

	get_template_part('template-parts/page--footer'); 

?>