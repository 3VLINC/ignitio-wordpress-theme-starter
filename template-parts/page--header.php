<?php 

	namespace Theme;

?>

<!doctype html>
<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

	<head>
		
		<meta charset="utf-8">
		
		<!-- Google Chrome Frame for IE -->
		
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		
		<!-- mobile meta -->
		
		<meta name="HandheldFriendly" content="True">
		
		<meta name="MobileOptimized" content="320">

		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, minimal-ui"/>
		
		<title><?php wp_title('| ',true,'right'); ?><?php bloginfo('name') ?></title>
		
		<link rel="apple-touch-icon" href="<?php echo Theme::getResourceUrl('images/apple-icon-touch.png'); ?>">
		
		<link rel="icon" href="<?php echo Theme::getResourceUrl('images/favicon.png'); ?>">
		
		<!--[if IE]>
		
			<link rel="shortcut icon" href="<?php echo Theme::getResourceUrl('images/favicon.ico'); ?>">
		
		<![endif]-->
		
		<!-- or, set /favicon.ico for IE10 win -->
		
		<meta name="msapplication-TileColor" content="#f01d4f">
		
		<meta name="msapplication-TileImage" content="<?php echo Theme::getResourceUrl('images/win8-tile-icon.png'); ?>">

		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
				
		<?php wp_head(); ?>

	</head>
	
	<body <?php body_class(); ?>>

		<?php get_template_part('template-parts/accessibility-menu'); ?>

		<header class="page--header fixed contain-to-grid">

			<?php do_action(Actions::A_HEADER_PREPEND); ?>

			<nav class="top-bar page--header--top-bar" data-topbar>
	            
				<ul class="title-area page--header--title">
				
					<li class="page--header--logo name"><h1><a href="<?php echo home_url(); ?>"><span class="logo"><span class="logo--text"><?php bloginfo('name'); ?></span></span></a></h1></li>
					
					<li class="page--header--menu-toggle toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>

				</ul>

		    	 <section class="page--header--navigation top-bar-section">
		    
					 <?php Menus::outputMenu(Menus::MN_TOP_BAR); ?>
					 
		    	 </section>
				
            </nav>	

	        <?php do_action(Actions::A_HEADER_APPEND); ?>

       	</header>

		<main id="<?php echo Theme::getMainID(); ?>" class="<?php echo Theme::getMainClass(); ?>">

			<?php do_action(Actions::A_MAIN_PREPEND); ?>

			<?php get_template_part('template-parts/page--title'); ?>