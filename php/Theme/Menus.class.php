<?php 

namespace Theme;

class Menus
{

    const MN_TOP_BAR = 'top-bar-menu';
    const MN_INTRO = 'intro-menu';
    const MN_SOCIAL_MEDIA = 'social-media';

	public function __construct()
	{
		
		add_action( 'after_setup_theme', array(get_class(), 'registerMenus'));

	}

	public static function registerMenus()
	{

		register_nav_menu( self::MN_TOP_BAR, 'Top Bar Menu' );

        register_nav_menu( self::MN_INTRO, 'Intro Menu' ); 

	}

    public static function outputMenu($menu)
    {

         if($menu === self::MN_SOCIAL_MEDIA)
         {
            self::outputSocialMediaMenu();
         }
         else
         {

             $options = array(
                'container' => false,                           // remove nav container
                'menu_class' => self::getMenuClass($menu),             // adding custom nav class,
                'menu_id' => self::getMenuID($menu),
                'theme_location' => $menu,                // where it's located in the theme
                'depth' => 1,                                   // limit the depth of the nav
                'walker' => false
            );

            switch($menu) {

                case self::MN_TOP_BAR:

                    $options['depth'] = 0;
                    
                    $options['menu_class'] .= ' dropdown-menu--menu';
                    
                    $options['items_wrap'] = '<ul class="right">%3$s</ul>';

                    $options['walker'] = new FoundationDropdownMenuWalker(
                        array(
                            'in_top_bar'=>true,
                            'item_type' => 'li',
                            'menu_type' => 'main-menu'
                        )
                    );

                break;

            }

             wp_nav_menu($options);

         }

    }

	
    private static function outputSocialMediaMenu()
    {

        $links = array();

        foreach(Theme::getSocialMediaChannels() as $handle => $name)
        {
        	        	
            $url = get_theme_mod($handle);

            if($url!='http://' && $url!='')
            {
            	
            	$links[] = sprintf('<li class="follow-us--link"><a href="%s" class="%s"><span>%s</span>%s</a></li>', 
            		$url,
            		$handle,
            		$name,
            		self::displaySvg($handle)
				);

            }

        }

		printf( '<ul id="%s" class="follow-us">%s</ul>',
			self::getMenuID(self::MN_SOCIAL_MEDIA),
			implode($links) 
		);

    }	
    
    public static function displaySvg($handle){
		
		$svg_path = sprintf('images/svg/%s.svg',$handle);
		
		ob_start();
		
			include(Theme::getResourcePath($svg_path));
		
			$svg = ob_get_contents();
		
		ob_end_clean();
		
		return $svg;
	
	} 
    
    public static function getMenuID($menu)
    {
        return $menu.'-menu';
    }

    public static function getMenuClass($menu)
    {
        return $menu.'-menu';
    }

}

?>