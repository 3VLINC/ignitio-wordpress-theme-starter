// Video Gallery
;(
	
	function ( $, window, document, undefined )
	{

		// Menu
		var VideoGallery = function( element, config ) {

			var default_config = {

		    	classes : {
		    		modal: 'video-gallery--modal',
		    		modal_close: 'video-gallery--close',
		    		modal_open: 'video-gallery--open',
		    		video_wrapper: 'video-gallery--video--wrapper',
		    		video: 'video-gallery--video',
		    	},
		    	text : {
		    		close : 'Close'
		    	}
		    };

		    this.config = $.extend(true, {}, default_config, config );

		    this.classes = this.config.classes;

		    this.selectors = {
		    	modal: '.'+this.classes.modal,
		    	modal_close:'.'+this.classes.modal_close,
		    	modal_open:'.'+this.classes.modal_open,
		    	video_wrapper: '.'+this.classes.video_wrapper,
		    	video: '.'+this.classes.video
		    };

		    this.theme = window.Theme;

		    this.container = $(element);

			this.modal = false;

		    this.init();

		};

		VideoGallery.prototype = {

			init: function()
			{

				this.setupModal();

				this.bindControls();

				this.bindEvents();

			},

			setupModal: function()
			{

				this.modal = this.container.find(this.selectors.modal);

				this.modal.foundation('reveal');

			},

			bindControls: function()
			{
				
				var _this = this;

				this.container.find(this.selectors.modal_open).on('click',
					
					function(e)
					{

						_this.modal.foundation('reveal','open');

						e.preventDefault();

					}

				);

				this.container.find(this.selectors.modal_close).on('click',
					
					function(e)
					{

						_this.modal.foundation('reveal','close');

						e.preventDefault();

					}

				);

			},

			bindEvents: function()
			{

				this.modal.on(
					'opened',
					$.proxy(this.onGalleryOpened, this)
				);

				$(window).on('resize', $.proxy(this.onResize,this));

				$(window).on('orientationchange', $.proxy(this.onOrientationChange,this));

			},

			updateVideoOffset: function()
			{

				var window_height = $(window).height();

				var video_height = this.modal.find(this.selectors.video_wrapper).height();

				var offset = (window_height - video_height) / 2;

				if(offset < 0) {
				
					offset = 0;

				}

				this.modal.find(this.selectors.video_wrapper).css('top', offset);

			},
			
			onGalleryOpened: function()
			{
			
				this.updateVideoOffset();

			},
			onResize: function()
			{

				this.updateVideoOffset();

			},
			onOrientationChange: function()
			{

				this.updateVideoOffset();

			}
		};

		// A really lightweight plugin wrapper around the constructor,
		// preventing against multiple instantiations
		$.fn.videoGallery = function ( options ) {

		    return this.each(
		    
		    	function() {

					if ( !$.data( this, "video-gallery" ) ) {
				    
				    	$.data( this, "video-gallery", new VideoGallery( this, options ) );
				    
					}
				
				}
			
			);
		    
		};

	}

)( jQuery, window, document ); 