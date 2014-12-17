// Common
jQuery(
	function(){


		function Theme()
		{

			this.init();

		}

		Theme.prototype = {

			init: function() {

					this.mode = null;

					this.checkForModeChange();

					$(window).on('resize', $.proxy(this.checkForModeChange,this));

				},

			checkForModeChange: function() {

					if(matchMedia(window.Foundation.media_queries.medium).matches && this.getMode() !== this.modes.DESKTOP )
					{

						this.setMode(this.modes.DESKTOP);
						

					}
					else if(!matchMedia(window.Foundation.media_queries.medium).matches && this.getMode() !== this.modes.MOBILE )
					{

						this.setMode(this.modes.MOBILE);

					}

				},

			setMode: function(mode) {

					switch(mode)
					{

						case this.modes.MOBILE:

							this.mode = this.modes.MOBILE;

							$(document).trigger(this.events.TO_MOBILE);

						break;

						case this.modes.DESKTOP:

							this.mode = this.modes.DESKTOP;

							$(document).trigger(this.events.TO_DESKTOP);

						break;

					}

				

				},

			getMode: function() {
					return this.mode;
				},

			events: {
				TO_MOBILE: 'theme-to-mobile',
				TO_DESKTOP: 'theme-to-desktop'
			},
			modes: {
				MOBILE: 'theme-mobile',
				DESKTOP : 'theme-desktop'
			}

		};

		window.Theme = new Theme();

	}

);