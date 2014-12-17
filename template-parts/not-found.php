<article class="not-found">
	
	<section class="content--entry">
	
		<?php do_action(Theme\Actions::A_CONTENT_ENTRY_PREPEND); ?>

		<?php 

			$was = array(
				'viciously tortured with a pair of scissors',
				'murdered by a rogue band of satanic bikers'
				);

			shuffle($was);

		?>

		<p>Sorry but the post or page you were looking for was <?php echo $was[0]; ?> .</p>

		<?php do_action(Theme\Actions::A_CONTENT_ENTRY_APPEND); ?>
	
	</section>

</article>