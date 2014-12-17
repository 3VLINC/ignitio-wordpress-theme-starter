jQuery(document).ready(

	function($) {

		var iframe = $('#whyhorror-trailer iframe')[0];

		// Not found then return
		if(iframe === undefined) return;

		var player = $f(iframe);

		var do_autoplay = false;

		$(document).on('opened', '#trailer[data-reveal]', function () {

			  	var modal = $(this);
			  	
			  	do_autoplay = true;

			}

		);

		$(document).on('closed', '#trailer[data-reveal]', function () {

			  	var modal = $(this);
			  	
			  	do_autoplay = false;

			}

		);

		player.addEvent('ready', function() {
				    
				if(do_autoplay)
				{

					player.api('play');

				}

			}

		);

	}

 );