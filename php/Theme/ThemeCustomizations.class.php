<?php

namespace Theme;

class ThemeCustomizations
{

	const S_SOCIAL = 'social-links';

	const S_HOME_SETTINGS = 'home-settings';

	const SK_HOME_DESC = 'home-description';

	const S_FOOTER_SETTINGS = 'footer-settings';

	const SK_FOOTER_COPYRIGHT = 'footer-copyright';

	public function __construct()
	{

		add_action( 'customize_register', array(get_class(), 'register') );

	}

	public static function register( $wp_customize ) {

		$wp_customize->add_section(
			self::S_SOCIAL,
			array(
				'title' => 'Social Media Links',
				'description' => 'Set up the links for the social media icons in the footer',
				'priority' => 35
			)
		);

		foreach(Theme::getSocialMediaChannels() as $handle => $name)
		{

			$wp_customize->add_setting( $handle , 
				array(
					'default'     => 'http://',
					'sanitize_callback' => array(get_class(), 'filterPrependHttp')
				) 
			);

			$wp_customize->add_control(
				$handle,
				array(
					'label' => $name,
					'section' => self::S_SOCIAL,
					'type' => 'text'
				)
			);

		}

		$wp_customize->add_section(
			self::S_HOME_SETTINGS,
			array(
				'title' => 'Homepage Settings',
				'description' => 'Set text and settings for the home page',
				'priority' => 36
			)
		);

		$wp_customize->add_setting( self::SK_HOME_DESC , 
				array(
					'default' => 'The University of Maine is where potential becomes purpose. Our journey is what we make it. Our destination is what we know can be. Our restless community of inventors, uncoverers, visionaries, and pragmatists work 
together to create a stronger Maine and a better world—one that can be, 
and indeed must be, what we make it.',
				) 
			);

			$wp_customize->add_control(
				self::SK_HOME_DESC,
				array(
					'label' => 'Homepage Desktop Description',
					'section' => self::S_HOME_SETTINGS,
					'type' => 'text'
				)
			);

		$wp_customize->add_section(
			self::S_FOOTER_SETTINGS,
			array(
				'title' => 'Footer Settings',
				'description' => 'Set text for the footer',
				'priority' => 36
			)
		);

		$wp_customize->add_setting( self::SK_FOOTER_COPYRIGHT , 
				array(
					'default' => '©',
				) 
			);

			$wp_customize->add_control(
				self::SK_FOOTER_COPYRIGHT,
				array(
					'label' => 'Copyright Notice',
					'section' => self::S_FOOTER_SETTINGS,
					'type' => 'text'
				)
			);

	}

	public static function filterPrependHttp($val)
	{

		if(empty($val)) return $val;
		
		return self::httpify($val);

	}

	public static function filterIntval($val)
	{
		return intval($val);
	}

	public static function httpify($link, $append = 'http://', $allowed = array('http://', 'https://'))
    {

        $found = false;
        
        foreach($allowed as $protocol)
        {
        
            if(strpos($link, $protocol) === 0)
            {
                
                return $link;

            }

        }

        return $append.$link;

    }

	

}

?>