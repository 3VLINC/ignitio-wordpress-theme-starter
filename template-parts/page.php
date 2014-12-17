<article <?php post_class(); ?>>

	<div class="content--container">

		<div class="content--wrapper">

			<header class="content--header">
				
				<?php do_action(Theme\Actions::A_CONTENT_HEADER_PREPEND); ?>

				<div class="content--meta">
				
					<?php echo apply_filters(Theme\Filters::F_CONTENT_META,get_the_ID()); ?>
				
				</div>
				
				<?php do_action(Theme\Actions::A_CONTENT_HEADER_APPEND); ?>

			</header>


			
			<section class="content--entry">
			
				<?php do_action(Theme\Actions::A_CONTENT_ENTRY_PREPEND); ?>

				<?php the_content(); ?>

				<?php do_action(Theme\Actions::A_CONTENT_ENTRY_APPEND); ?>
			
			</section>

			<footer class="content--footer">

				<?php do_action(Theme\Actions::A_CONTENT_FOOTER_PREPEND); ?>

				<?php do_action(Theme\Actions::A_CONTENT_FOOTER_APPEND); ?>

			</footer>

		</div>

	</div>

</article>