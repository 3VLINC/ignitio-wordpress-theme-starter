<article <?php post_class('post--excerpt'); ?>>
		
	<?php 

	if ( has_post_thumbnail() ) {
			
	?>	
		
	<div class="content--thumbnail--container">

		<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="content--thumbnail--wrapper">

			<?php

				the_post_thumbnail(Theme\Theme::IMG_SIZE_SQUARE, array('class' => 'content--thumbnail content--thumbnail__square'));
				
				the_post_thumbnail(Theme\Theme::IMG_SIZE_BANNER, array('class' => 'content--thumbnail content--thumbnail__banner'));

			?>

		</a>		
		
	</div>

	<?php
	
		}
	?>

	<div class="content--container">

		<div class="content--wrapper">

			<header class="content--header">
				
				<?php do_action(Theme\Actions::A_CONTENT_HEADER_PREPEND); ?>

				<h1 class="content--title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
				
				<div class="content--meta">
				
					<?php echo apply_filters(Theme\Filters::F_CONTENT_META,get_the_ID()); ?>
				
				</div>
				
				<?php do_action(Theme\Actions::A_CONTENT_HEADER_APPEND); ?>

			</header>
			
			<section class="content--entry">
			
				<?php do_action(Theme\Actions::A_CONTENT_ENTRY_PREPEND); ?>

				<?php the_excerpt(); ?>

				<?php do_action(Theme\Actions::A_CONTENT_ENTRY_APPEND); ?>
			
			</section>

			<footer class="content--footer">

				<?php do_action(Theme\Actions::A_CONTENT_FOOTER_PREPEND); ?>

				<?php do_action(Theme\Actions::A_CONTENT_FOOTER_APPEND); ?>

			</footer>

		</div>

	</div>

</article>
