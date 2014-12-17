<?php 

namespace Theme;

class Accessibility
{

	public function __construct()
	{

	}

	public function outputAccessibilityMenu()
	{

		$items = array();

		$items[Theme::getMainID()] = 'Skip to Content';		

		$links = array();

		foreach($items as $name => $label)
		{

			$links[] = sprintf(
				'<li><a href="#%s">%s</a></li>',
				$name,
				$label
			);

		}

		printf(
			'<ul class="accessibility-menu">%s</ul>',
			implode($links)
			);


	}

}

?>