<?php 

namespace Theme;

class AdvancedCustomFieldsConfiguration
{

	const HIDE_ACF_UI = true;

	public function __construct()
	{
		
		if(self::HIDE_ACF_UI)
		{	
			define( 'ACF_LITE' , true );
		}

		require('advanced-custom-fields/acf.php');

		require('acf-repeater/acf-repeater.php');

		if(!function_exists("register_field_group")) return;

		$this->register();

	}

	private function register()
	{

		// add here your custom fields code

	}

}

?>
