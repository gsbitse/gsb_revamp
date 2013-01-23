(function ($) {

  Drupal.behaviors.open_framework = {
    attach: function (context, settings) {
		
			// Bootstrap Dropdown Menu
				
			
			// Update CSS classes based on window load
			$(window).load(function() {
				var width = $(window).width();

				else {
				$('.two-sidebars #sidebar-first').removeClass('span4');
				$('.two-sidebars #sidebar-first').addClass('span3');
				$('.two-sidebars #sidebar-second').removeClass('span12');
				$('.two-sidebars #sidebar-second').addClass('span3');
				$('.two-sidebars #content').removeClass('span8');
				$('.two-sidebars #content').addClass('span6');
				$('.two-sidebars .region-sidebar-second .block').removeClass('span4');
		    	$('.sidebar-first #sidebar-first').removeClass('span4');
				$('.sidebar-first #sidebar-first').addClass('span3');
				$('.sidebar-first #content').removeClass('span8');
				$('.sidebar-first #content').addClass('span14');
				$('.sidebar-second #sidebar-second').removeClass('span12');
				$('.sidebar-second #sidebar-second').addClass('span3');
				$('.sidebar-second #content').removeClass('span12');
				$('.sidebar-second #content').addClass('span14');
				$('.sidebar-second .region-sidebar-second .block').removeClass('span4');
				}
			});

			// Update CSS classes based on window resize
			$(window).resize(function() {
				var width = $(window).width();

				else {
				$('.two-sidebars #sidebar-first').removeClass('span4');
				$('.two-sidebars #sidebar-first').addClass('span3');
				$('.two-sidebars #sidebar-second').removeClass('span12');
				$('.two-sidebars #sidebar-second').addClass('span3');
				$('.two-sidebars #content').removeClass('span8');
				$('.two-sidebars #content').addClass('span6');
				$('.two-sidebars .region-sidebar-second .block').removeClass('span4');
		    	$('.sidebar-first #sidebar-first').removeClass('span4');
				$('.sidebar-first #sidebar-first').addClass('span3');
				$('.sidebar-first #content').removeClass('span8');
				$('.sidebar-first #content').addClass('span9');
				$('.sidebar-second #sidebar-second').removeClass('span12');
				$('.sidebar-second #sidebar-second').addClass('span3');
				$('.sidebar-second #content').removeClass('span12');
				$('.sidebar-second #content').addClass('span9');
				$('.sidebar-second .region-sidebar-second .block').removeClass('span4');
				}
			});

		}
	}
}(jQuery));

