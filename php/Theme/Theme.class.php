<?php 

namespace Theme;

class Theme {

	const ENV_DEV = 1;
	const ENV_STAGE = 2;
	const ENV_PROD = 4;

	const MK_SUPPRESS_SIDEBAR = 'suppress-sidebar';
	
	const MK_TWITTER = 'twitter';
	const MK_WEBSITE = 'website';

	const HIDE_ADMIN_BAR = true;


	public function __construct()
	{

		new Actions();
		new Filters();
		new Menus();
		new WidgetAreas();
		new ThemeCustomizations();
		new AdvancedCustomFieldsConfiguration();
		new Accessibility();
		new Typekit();

		// Post Types

		// Remove the default WordPress inline gallery styles
		add_filter( 'use_default_gallery_style', '__return_false' );

		add_action('wp_enqueue_scripts', array(get_class(), 'enqueueScripts'));

		add_action('wp_enqueue_scripts', array(get_class(), 'enqueueStyles'));

		add_filter('body_class', array(get_class(),'addCustomBodyClasses'));
		
		add_action('init', array(get_class(), 'setupFeaturedImages'));
		
		add_action('init', array(get_class(), 'addFeaturedImageSizes'));

		if(true === self::HIDE_ADMIN_BAR)
		{
			
			add_filter( 'show_admin_bar', '__return_false' );

		}

	}

	public static function enqueueScripts()
	{

		wp_deregister_script('jquery');

		wp_register_script('jquery', self::getResourceUrl('bower_components/jquery/dist/jquery.min.js'), false, '2.1.1', true );

		wp_register_script('fastclick', self::getResourceUrl('bower_components/fastclick/lib/fastclick.js'), false,'1.0.2', true);

		wp_register_script('jquery-placeholder', self::getResourceUrl('bower_components/jquery-placeholder/jquery.placeholder.js'), array('jquery'), '2.0.8', true);

		wp_register_script('jquery.cookie', self::getResourceUrl('bower_components/jquery.cookie/jquery.cookie.js'), array('jquery'), '1.4.1', true );

		wp_register_script('modernizr', self::getResourceUrl('bower_components/modernizr/modernizr.js'), false, '2.8.2', true);

		wp_register_script( 'jquery.matchHeight', self::getResourceUrl('bower_components/matchHeight/jquery.matchHeight-min.js'), array('jquery'),'0.5.2', true );

		wp_register_script('respond', self::getResourceUrl('bower_components/respond/dest/respond.min.js'),false,'1.4.2', true);
		
		wp_register_script('foundation', self::getResourceUrl('bower_components/foundation/js/foundation.min.js'),array('jquery','modernizr','fastclick','jquery.cookie','jquery-placeholder'),'5.2.3',true);

		wp_register_script('theme', self::getResourceUrl('scripts/compiled/theme-min.js'), array('jquery','foundation'),'1.0.0', true);

		wp_enqueue_script('theme');

		wp_enqueue_script('respond');

		
		
	}

	public static function enqueueStyles()
	{

		wp_enqueue_style( 'theme', self::getResourceUrl('styles/compiled/theme.css'), false, '1.0', 'all' );

	}

	public static function getResourceUrl($resource) {

		$resource = ltrim($resource, '/');

		$resource = '/'.$resource;

		return get_stylesheet_directory_uri().$resource;

	}

	public static function getResourcePath($resource) {

		$resource = ltrim($resource, '/');
		
		$resource = '/'.$resource;

		return get_stylesheet_directory().$resource;

	}

	public static function getSocialMediaChannels()
	{
		
		return array(

			'facebook' => 'Facebook',
			'twitter' => 'Twitter',
			'youtube' => 'YouTube',
			'flickr' => 'Flickr'
			
		);

	}

	public static function addCustomBodyClasses($classes)
	{
		
		return $classes;

	}

	public static function getEnvironment()
	{

		return self::ENV_DEV;
			
	}

	public static function getMainID()
	{

		return 'main';
		
	}

	public static function getMainClass()
	{
		
		return 'main';

	}
	
	public static function setupFeaturedImages() {
		
		add_theme_support( 'post-thumbnails' ); 
		
	}
	
	public static function addFeaturedImageSizes() {

		//add image sizes here

	}	

}

?>