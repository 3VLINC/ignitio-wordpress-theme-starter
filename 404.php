<?php

	get_template_part('template-parts/page--header');			

?>

<div class="template--404">

	<div class="primary-area">
	
		<?php 
		
			do_action(Theme\Actions::A_CONTENT_PREPEND);
		
			get_template_part('template-parts/not-found');
		
		 	do_action(Theme\Actions::A_CONTENT_APPEND); 
		
		 ?>

	</div>
	
</div>
	
<?php

	get_template_part('template-parts/page--footer'); 

?>