(function ($) {

  Drupal.behaviors.open_framework = {
    attach: function (context, settings) {
		
			// Bootstrap Dropdown Menu
			$('#main-menu ul > li:has(.active)').addClass('active');
			$('#main-menu ul > li:has(ul .active)').removeClass('active');			
	        $('#main-menu ul > li > ul > li:has(.active)').removeClass('active');	
			
			// Update CSS classes based on window load
			$(window).load(function() {
				var width = $(window).width(),
						documentBody = $('body');

				if ((width >= 751) && (width < 963)) {
				documentBody.addClass('tablet-vew');
				documentBody.find('.two-sidebars #sidebar-first').removeClass('span3').addClass('span4').
				end().find('.two-sidebars #sidebar-second').removeClass('span3').addClass('span12').
				end().find('.two-sidebars #content').removeClass('span6').addClass('span8').
				end().find('.two-sidebars .region-sidebar-second .block').addClass('span4').
		    end().find('.sidebar-first #sidebar-first').removeClass('span3').addClass('span4').
				end().find('.sidebar-first #content').removeClass('span9').addClass('span8').
				end().find('.sidebar-second #sidebar-second').removeClass('span3').addClass('span12').
				end().find('.sidebar-second #content').removeClass('span9').addClass('span12').
				end().find('.sidebar-second .region-sidebar-second .block').addClass('span4');
				}

				else {
				documentBody.addClass('desktop-view');
				documentBody.find('.two-sidebars #sidebar-first').removeClass('span4').addClass('span3').
				end().find('.two-sidebars #sidebar-second').removeClass('span12').addClass('span3').
				end().find('.two-sidebars #content').removeClass('span8').addClass('span6').
				end().find('.two-sidebars .region-sidebar-second .block').removeClass('span4').
		    end().find('.sidebar-first #sidebar-first').removeClass('span4').addClass('span3').
				end().find('.sidebar-first #content').removeClass('span8').addClass('span9').
				end().find('.sidebar-second #sidebar-second').removeClass('span12').addClass('span3').
				end().find('.sidebar-second #content').removeClass('span12').addClass('span9').
				end().find('.sidebar-second .region-sidebar-second .block').removeClass('span4');
				}

			});

			// Update CSS classes based on window resize
			$(window).resize(function() {
				var width = $(window).width();

				if ((width >= 751) && (width < 963)) {
				$('.two-sidebars #sidebar-first').removeClass('span3');
				$('.two-sidebars #sidebar-first').addClass('span4');
				$('.two-sidebars #sidebar-second').removeClass('span3');
				$('.two-sidebars #sidebar-second').addClass('span12');
				$('.two-sidebars #content').removeClass('span6');
				$('.two-sidebars #content').addClass('span8');
				$('.two-sidebars .region-sidebar-second .block').addClass('span4');
		    $('.sidebar-first #sidebar-first').removeClass('span3');
				$('.sidebar-first #sidebar-first').addClass('span4');
				$('.sidebar-first #content').removeClass('span9');
				$('.sidebar-first #content').addClass('span8');
				$('.sidebar-second #sidebar-second').removeClass('span3');
				$('.sidebar-second #sidebar-second').addClass('span12');
				$('.sidebar-second #content').removeClass('span9');
				$('.sidebar-second #content').addClass('span12');
				$('.sidebar-second .region-sidebar-second .block').addClass('span4');
				}

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
				$('.sidebar-first #content').addClass('span-awesome');
				$('.sidebar-second #sidebar-second').removeClass('span12');
				$('.sidebar-second #sidebar-second').addClass('span3');
				$('.sidebar-second #content').removeClass('span12');
				$('.sidebar-second #content').addClass('span9');
				$('.sidebar-second .region-sidebar-second .block').removeClass('span4');
				}
			});

		}
	}

  Drupal.behaviors.spotlight_seemore = {
    attach: function (context, settings) {
    	if ($('.spotlight').length>0) {
			  var spotlightShowMore = $('.spotlight a.show-more'),
			      visibleLines = 5,
			      visibleHeight = visibleLines*parseInt(spotlightShowMore.siblings('.spotlight-story').children('p').css('line-height'));
			  spotlightShowMore.each(function() {
			    var $this = $(this);
			    if (!$this.hasClass('showmore-processed')) {
			    	$this.addClass('showmore-processed');
				    var spotlightStory = $this.siblings('.spotlight-story'),
				      	storyContent = spotlightStory.children('p').height();
				    if (storyContent<=visibleHeight) {
				    	$this.remove();
				    } else {
					    $this.click(function() { 
						    var $this = $(this);
						    if (!$this.hasClass('active')) {
						      $this.html('<span>Show Less</span>');
						      spotlightStory.animate({'max-height': storyContent}, 350);
						      if (!$this.parents('.span4').length>0) {
						      	spotlightStory.siblings('.spotlight-image').animate({'min-height': storyContent + 20}, 350);
						      }
						    } else {
						      $this.html('<span>Show More</span>');
						      spotlightStory.animate({'max-height': visibleHeight}, 300);
						      if (!$this.parents('.span4').length>0) {
						      	spotlightStory.siblings('.spotlight-image').animate({'min-height': 158}, 350);
						      }
						 
						    }
						    $this.toggleClass('active');
					  	});
					  }
					}
			  });
			}
    }
  }

  Drupal.behaviors.button_behavior = {
    attach: function (context, settings) {
    	$('.video-play-icon').click(function () {
    		$(this).prev().click();
    	})
    }
  }

  Drupal.behaviors.theme_checkboxes = {
    attach: function (context, settings) {
    	if ($('.clubs-filter-exposed').length > 0) {
    		$(".clubs-filter-exposed .bef-checkboxes .form-item input").uniform();
    	}
    }
  }

  Drupal.behaviors.search_autocomplete = {
    attach: function (context, settings) {
    	if ($('.views-widget-filter-search_api_views_fulltext').length > 0) {
    		var searhBox = $('.views-widget-filter-search_api_views_fulltext input'),
    				searchLabel = searhBox.closest('.views-widget-filter-search_api_views_fulltext').children('label');
   			if (searhBox.val() != '') {
   				searchLabel.hide();
   			}
   			searhBox.focus(function () {
   				searchLabel.hide();
   			});
   			searhBox.blur(function() {
   				toggleLabel ($(this));
    			});
   			searhBox.change(function() {
   				toggleLabel ($(this));
   			});
   			function toggleLabel (e) {
   				var $this = e;
   				if ($this.val() == '') {
   					searchLabel.show();
   				} else {
   					searchLabel.hide();
   				}
   			}
    	}
    }
  }
  
}(jQuery));


