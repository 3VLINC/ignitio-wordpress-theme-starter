<?php 

namespace Theme;

class Filters
{

	const F_CONTENT_META = 'content-meta';

	public function __construct()
	{

		add_filter(self::F_CONTENT_META, array(get_class(),'getContentMeta'));

	}

	public static function getContentMeta($id)
	{
		
		if('post' === get_post_type($id))
		{

			return sprintf('Posted %s', get_the_date());

		}

		return '';

	}



}

?>