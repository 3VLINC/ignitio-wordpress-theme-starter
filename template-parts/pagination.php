<?php 

	$pagination_prev = 'Older posts';
	$pagination_next = 'Newer posts';

	if ( is_search() ) {
		
		$pagination_prev = 'Previous results';
		$pagination_next = 'Next results';
	}
	
?>


<div class="pagination">

	<div class="nav-previous"><?php next_posts_link( $pagination_prev ); ?></div>
			
	<div class="nav-next"><?php previous_posts_link( $pagination_next ); ?></div>

</div>



