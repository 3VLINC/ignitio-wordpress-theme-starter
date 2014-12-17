jQuery(document).ready(
	function($)
	{

		if($('[data-map-marker-viewer]').length == 0) return;

		var add_marker_ui_config = $('[data-map-marker-viewer]').data('map-marker-viewer-add-marker-ui-config');
		
		add_marker_ui_config.on_add_extra_fields = theme_add_marker_on_add_extra_fields;

		add_marker_ui_config.on_prepare_data_for_save = theme_add_marker_on_prepare_data_for_save;

		add_marker_ui_config.on_clear_form = theme_add_marker_on_clear_form;

		add_marker_ui_config.on_data_validation = theme_add_marker_on_data_validation;

		$('[data-map-marker-viewer]').data('map-marker-viewer-add-marker-ui-config',add_marker_ui_config);

		var map_ui_config = $('[data-map-marker-viewer]').data('map-marker-viewer-map-ui-config');

		map_ui_config.on_marker_clicked = theme_map_on_marker_clicked;

		map_ui_config.map_styles = [
		    {
		        "featureType": "administrative",
		        "elementType": "labels",
		        "stylers": [
		            {
		                "visibility": "off"
		            }
		        ]
		    },
		    {
		        "featureType": "administrative.country",
		        "elementType": "geometry.stroke",
		        "stylers": [
		            {
		                "visibility": "off"
		            }
		        ]
		    },
		    {
		        "featureType": "administrative.province",
		        "elementType": "geometry.stroke",
		        "stylers": [
		            {
		                "visibility": "off"
		            }
		        ]
		    },
		    {
		        "featureType": "landscape",
		        "elementType": "geometry",
		        "stylers": [
		            {
		                "visibility": "on"
		            },
		            {
		                "color": "#e3e3e3"
		            }
		        ]
		    },
		    {
		        "featureType": "landscape.natural",
		        "elementType": "labels",
		        "stylers": [
		            {
		                "visibility": "off"
		            }
		        ]
		    },
		    {
		        "featureType": "poi",
		        "elementType": "all",
		        "stylers": [
		            {
		                "visibility": "off"
		            }
		        ]
		    },
		    {
		        "featureType": "road",
		        "elementType": "all",
		        "stylers": [
		            {
		                "color": "#cccccc"
		            }
		        ]
		    },
		    {
		        "featureType": "road",
		        "elementType": "labels",
		        "stylers": [
		            {
		                "visibility": "off"
		            }
		        ]
		    },
		    {
		        "featureType": "transit",
		        "elementType": "labels.icon",
		        "stylers": [
		            {
		                "visibility": "off"
		            }
		        ]
		    },
		    {
		        "featureType": "transit.line",
		        "elementType": "geometry",
		        "stylers": [
		            {
		                "visibility": "off"
		            }
		        ]
		    },
		    {
		        "featureType": "transit.line",
		        "elementType": "labels.text",
		        "stylers": [
		            {
		                "visibility": "off"
		            }
		        ]
		    },
		    {
		        "featureType": "transit.station.airport",
		        "elementType": "geometry",
		        "stylers": [
		            {
		                "visibility": "off"
		            }
		        ]
		    },
		    {
		        "featureType": "transit.station.airport",
		        "elementType": "labels",
		        "stylers": [
		            {
		                "visibility": "off"
		            }
		        ]
		    },
		    {
		        "featureType": "water",
		        "elementType": "geometry",
		        "stylers": [
		            {
		                "color": "#FFFFFF"
		            }
		        ]
		    },
		    {
		        "featureType": "water",
		        "elementType": "labels",
		        "stylers": [
		            {
		                "visibility": "off"
		            }
		        ]
		    }
		];

		$('[data-map-marker-viewer]').data('map-marker-viewer-map-ui-config',map_ui_config);
		

		function theme_add_marker_on_add_extra_fields()
		{
			
			var extra_fields = $('<div class="map-marker-viewer--add-marker-ui--extra-fields" />').append(
				$('<input name="map-your-name" type="text" />').attr('placeholder', 'What\'s your name?')
			).append(
				$('<input name="map-favourite-film" type="text" />').attr('placeholder', 'What\'s your favourite horror film?')
			).append(
				$('<input name="map-why-like-horror" type="text" />').attr('placeholder','Why do you like horror?')
			);

			return extra_fields;

		}

		function theme_add_marker_on_prepare_data_for_save(the_data)
		{

			the_data.meta = {
				name: $('[name="map-your-name"]').val(),
				favourite_film: $('[name="map-favourite-film"]').val(),
				why_like_horror: $('[name="map-why-like-horror"]').val()
			};

			return the_data;

		}

		function theme_add_marker_on_clear_form()
		{

			$('[name="map-your-name"]').val('');
			$('[name="map-favourite-film"]').val('');
			$('[name="map-why-like-horror"]').val('');

		}

		function theme_add_marker_on_data_validation(the_data)
		{

			if(the_data.meta.name == '')
			{
				
				return 'Sorry, you must enter your name.';

			}

			return true;

		}

		function theme_map_on_marker_clicked(marker, map, info_window)
		{

			var	meta = jQuery.parseJSON(marker.meta);

			meta.name = unescape(meta.name);

			meta.favourite_film = unescape(meta.favourite_film);

			meta.why_like_horror = unescape(meta.why_like_horror);

			var info_window_content = $('<div class="map-marker-viewer-marker--info"></div>');

			info_window_content.append($('<p class="map-marker-viewer--marker--name">'+meta.name+'</p>'));

			if("" !== meta.favourite_film)
			{

				info_window_content.append($('<p class="map-marker-viewer--marker--favourite-film"><span class="map-marker-viewer--marker--label">Favourite Film:</span> '+meta.favourite_film+'</p>'));

			}

			if("" !== meta.why_like_horror)
			{

				info_window_content.append($('<p class="map-marker-viewer--marker--why-like-horror"><span class="map-marker-viewer--marker--label">Why do you like horror?</span><br />'+meta.why_like_horror+'</p>'));

			}

			info_window.content = info_window_content.get(0);

			info_window.open(map, marker);

		}

		function unescape(str)
		{

			 // +   original by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
			  // +   improved by: Ates Goral (http://magnetiq.com)
			  // +      fixed by: Mick@el
			  // +   improved by: marrtins
			  // +   bugfixed by: Onno Marsman
			  // +   improved by: rezna
			  // +   input by: Rick Waldron
			  // +   reimplemented by: Brett Zamir (http://brett-zamir.me)
			  // +   input by: Brant Messenger (http://www.brantmessenger.com/)
			  // +   bugfixed by: Brett Zamir (http://brett-zamir.me)
			  // *     example 1: stripslashes('Kevin\'s code');
			  // *     returns 1: "Kevin's code"
			  // *     example 2: stripslashes('Kevin\\\'s code');
			  // *     returns 2: "Kevin\'s code"

			  return (str + '').replace(/\\(.?)/g, function (s, n1) {
			    switch (n1) {
			    case '\\':
			      return '\\';
			    case '0':
			      return '\u0000';
			    case '':
			      return '';
			    default:
			      return n1;
			    }
			  });

		}

	}

);


