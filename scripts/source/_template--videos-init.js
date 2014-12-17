jQuery(document).ready(

	function($)
	{

		if(typeof theme_videos == 'undefined') return;

		var videos = theme_videos;

		var videos_area = $('[data-videos-area]');

		doLayout();

		function doLayout()
		{

			if(videos.length > 0)
			{

				videos_area.empty();

				var video_player = $('<div class="video-player" data-video-player />');

				video_player.append(videos[0]['video-embed']);

				videos_area.append(video_player);

				var videos_grid = $('<ul class="videos-grid"/>');

				$(videos).each(

					function(index, element) {

						var video = $('<li class="videos-grid--item">').append(
							$('<div class="videos-grid--item--wrapper">').css(
								{
									'background-image': 'url('+element['video-still']+')'
								}
							).append(
								$('<h1 class="video-title">'+element['video-title']+'</h1>')
							)
						);

						video.data('embed',element['video-embed']);

						video.on('click',loadVideo);

						videos_grid.append(video);

					}

				);

				videos_area.append(videos_grid);

			}


		}

		function loadVideo(e)
		{
			
			var video_player = $('[data-video-player]');

			video_player.html($(this).data('embed'));

			var offset = video_player.offset();

			$(document).scrollTop( offset.top - $('.page--header.fixed').height() );

			e.preventDefault();

		}

	}

);