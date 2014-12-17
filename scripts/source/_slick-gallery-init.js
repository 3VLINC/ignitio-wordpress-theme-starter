jQuery(document).ready(

	function($) {

		$('#slick-gallery .slick-gallery--carousel .slick-gallery--slide').on(
			'click', onCarouselItemClicked
		);

		$('#slick-gallery .slick-gallery--main').append('<a href="#" class="slick-gallery--close"><span>Close</span></a>');

		$('#slick-gallery .slick-gallery--main .slick-gallery--close').on('click', onCloseClicked);

		var rtime = new Date(1, 1, 2000, 12,00,00);
		
		var timeout = false;
		
		var delta = 200;

		var original_viewport = '';
		
		$(window).resize(function() {

		    rtime = new Date();

		    if (timeout === false) {

		        timeout = true;

		        setTimeout(onResize, delta);

		    }

		});

		function onCloseClicked(e) {

			closeGallery();

			e.preventDefault();

		}

		function onCarouselItemClicked(e) {

			var index = $(this).data('index');

			openGallery(index);

			e.preventDefault();

		}

		function closeGallery()
		{

			$('body').removeClass('slick-gallery--open');

			$('#slick-gallery .slick-gallery--main').unslick();

		}

		function openGallery(goto)
		{

			$('body').addClass('slick-gallery--open');

			$('#slick-gallery .slick-gallery--main').slick();

			$('#slick-gallery .slick-gallery--main').slickGoTo(goto);
			
			$("html, body").scrollTop(0);

			updateOffset();

		}


		function onResize()
		{

			if (new Date() - rtime < delta) {
		    
		        setTimeout(onResize, delta);
		    
		    } else {
		        
		        timeout = false;
		        

				// Scroll back to top of page so ios in landscape mode
				// works better

		        $("html, body").scrollTop(0);

		        updateOffset();

		    }

		}

		function updateOffset() {

			var window_height = $(window).outerHeight();

			var video_height = $('#slick-gallery .slick-gallery--main').outerHeight();

			var offset = (window_height - video_height)/2;

			if(offset < 0) {
			
				offset = 0;

			}

			$('#slick-gallery .slick-gallery--main').animate({'top': offset},500);

		}

	}

);
