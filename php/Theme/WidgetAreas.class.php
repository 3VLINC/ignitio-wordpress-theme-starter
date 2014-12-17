<?php 

namespace Theme;

class WidgetAreas {

	const WA_FOOTER = 'front-page';
	
	const WA_BLOG = 'blog';

	public function __construct()
	{
		
		add_action('widgets_init',array(get_class(),'register'),1,1);

	}

	public static function register()
	{
		
		$args = array(
			'name'          => 'Footer Sidebar',
			'id'            => self::WA_FOOTER,
			'description'   => 'Footer widget area',
		    'class'         => '',
			'before_widget' => '<div id="%1$s" class="widget--container %2$s"><div class="widget--wrapper"><section class="widget">',
			'after_widget'  => '</section></div></div>',
			'before_title'  => '<h1 class="widget--title"><span>',
			'after_title'   => '</span></h1>' );
		
			register_sidebar( $args );
			
		$args = array(
			'name'          => 'Blog',
			'id'            => self::WA_BLOG,
			'description'   => 'Blog page widget area',
		    'class'         => '',
			'before_widget' => '<div id="%1$s" class="widget--container %2$s"><div class="widget--wrapper"><section class="widget">',
			'after_widget'  => '</section></div></div>',
			'before_title'  => '<h1 class="widget--title"><span>',
			'after_title'   => '</span></h1>' );
		
			register_sidebar( $args );		
		
	}

	public static function outputWidgetArea($index)
	{
		
		if(is_active_sidebar($index ))
		{
			
			echo '<div class="widget-area">';

			dynamic_sidebar( $index );

			echo '</div>';

		}

	}

}

?>