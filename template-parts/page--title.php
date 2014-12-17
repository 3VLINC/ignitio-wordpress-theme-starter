<?php 
	
	use Theme\CrewMemberPostType;
	use Theme\InterviewSubjectPostType;
	
	if(
		!is_front_page() && 
		!is_page_template('templates/trailer.php' ) &&
		!is_page_template('templates/videos.php' ))
	{

?>

<div class="page--title--container">

	<div class="page--title--wrapper">
	
		<h1 class="page--title">
			
			<?php 

				if(is_home())
				{

					printf('News');

				}
				elseif(is_singular('post'))
				{
					
					printf(
						'<a href="%s">News</a>',
						(get_option( 'show_on_front' ) == 'page' ) ? 
						get_permalink( get_option('page_for_posts' ) ) 
						: site_url('/')
					);

				}
				elseif(is_archive())
				{

					if ( is_day() ) :
						printf( 'Daily Archives: %s', '<span class="page--title--qualifier">' . get_the_date() . '</span>' );
					elseif ( is_month() ) :
						printf( 'Monthly Archives: %s', '<span class="page--title--qualifier">' . get_the_date('F Y') . '</span>' );
					elseif ( is_year() ) :
						printf( 'Yearly Archives: %s','<span class="page--title--qualifier">' . get_the_date( 'Y') . '</span>' );
					elseif( is_category()) :
						printf( 'Category: %s', '<span class="page--title--qualifier">' . single_cat_title( '', false ) . '</span>' );
					elseif( is_tag()) :
						printf( 'Tag: %s', '<span class="page--title--qualifier">' . single_tag_title( '', false ) . '</span>' );
					else :
						printf('Archives');
					endif;

				}
				elseif(is_singular(CrewMemberPostType::SLUG)){}
				elseif(is_singular(InterviewSubjectPostType::SLUG)){}
				elseif(is_singular())
				{
					the_title();
				}
				elseif(is_search())
				{

					printf(
						'Search Results: %s', '<span class="page--title--qualifier">' . get_search_query( false ) . '</span>'
					);

				}
				elseif(is_404())
				{
					printf('Post or Page Not Found');
				}

			?>

		</h1>
	
	</div>

</div>

<?php
	
	}

?>