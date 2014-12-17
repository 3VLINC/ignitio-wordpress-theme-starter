<?php

	namespace Theme;

	class TypeKit
	{
	
		const KIT_ID = '';
		// add typekit ID

		public function __construct()
		{

			add_action('wp_enqueue_scripts',array(get_class(), 'enqueueScript'));

			add_action('wp_head',array(get_class(), 'outputInitScript'));

		}

		public static function enqueueScript()
		{
			
			wp_enqueue_script( 'typekit', '//use.typekit.net/'.self::KIT_ID.'.js', false, '1', false );

		}

		public static function outputInitScript()
		{

			echo '<script>try{Typekit.load();}catch(e){}</script>';

		}

	}

?>