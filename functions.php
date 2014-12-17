<?php 

spl_autoload_register('theme_autoload');

function theme_autoload($class_name)
{
	
	spl_autoload_extensions('.class.php');
	
	set_include_path(__DIR__.'/php/');
	
	$class_name = str_replace('\\', '/', $class_name);

	SPL_autoload_suxx($class_name);
	
}

// Hack for broken autoloading case insesitivity
if(!function_exists('SPL_autoload_suxx'))
{
	function SPL_autoload_suxx($name)
	{
		
		$rc = FALSE;
		
		$exts = explode(',', spl_autoload_extensions());

		$sep = (substr(PHP_OS, 0, 3) == 'Win') ? ';' : ':';
		
		$paths = explode($sep, ini_get('include_path'));
		
		foreach($paths as $path) {
		
			foreach($exts as $ext) {		

				$file = $path . DIRECTORY_SEPARATOR . $name . $ext;

				if(is_readable($file)) {

					require_once $file;

					$rc = $file;

					break;

				}

			}

		}
		
		return $rc;

	}

}

global $theme;

$theme = new Theme\Theme();

?>