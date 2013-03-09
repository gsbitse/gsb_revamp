(function ($) {

  Drupal.behaviors.open_framework = {
    attach: function (context, settings) {
		
			// Bootstrap Dropdown Menu
			$('#main-menu ul > li:has(.active)').addClass('active');
			$('#main-menu ul > li:has(ul .active)').removeClass('active');			
	    $('#main-menu ul > li > ul > li:has(.active)').removeClass('active');	

		}
	}

  Drupal.behaviors.spotlight_seemore = {
    attach: function (context, settings) {
    	if ($('.spotlight').length>0) {
			  var spotlightShowMore = $('.spotlight a.show-more'),
			      visibleLines = 4,
			      visibleHeight = visibleLines * parseInt(spotlightShowMore.siblings('.spotlight-story').children('p').css('line-height'));
			  spotlightShowMore.each(function() {
			  	var visHeight = visibleHeight,
			  		$this = $(this);
			    if ( !$this.hasClass('showmore-processed') ) {
			    	$this.addClass('showmore-processed');
				    var spotlightStory = $this.siblings('.spotlight-story'),
				      	storyContent = spotlightStory.children('p').height();

				     if ( spotlightStory.position().top > 285 && spotlightStory.children('p').height() > 57 && spotlightStory.parents('.span4').length == 0 ) { // >276 means description is lower 
				     	spotlightStory.css('max-height', 35); // set height to 2 lines
				     	visHeight = parseInt(visHeight / visibleLines * visibleLines/2);
				     }
				    if ( storyContent <= visHeight ) {
				    	$this.remove();
				    } else {
					    $this.click(function() {
						    var $this = $(this);
						    if ( !$this.hasClass('active') ) {
						      $this.html('<span>Show Less</span>');
						      spotlightStory.animate({'max-height' : storyContent}, 350);
						    } else {
						      $this.html('<span>Show More</span>');
						      spotlightStory.animate({'max-height' : visHeight}, 300);						 
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

  Drupal.behaviors.accordion = {
    attach: function (context, settings) {

    	var acctitle = $('.acc-title');
    	if ( acctitle.length > 0 ) {
    		acctitle.each(function () {
    			var $this = $(this),
    				next = $this.next('.acc-body');
    				if ( next.length > 0 ) {
    					next.wrapAll('<div class="accordion-body-wrap" />');
    					touchNeighbour(next, 'acc-body');
    				} else {
    					$this.removeClass('acc-title');
    				}
    		});
    		var firstelem = acctitle.first();
    		if ( !firstelem.parent().hasClass('accordion-processed') ) {
	    		firstelem.wrap('<div class="accordion-body accordion-processed" />');
	    		touchNeighbour( firstelem, 'acc-title', 'accordion-body-wrap' );
    		}


    	}

    	if ( $('.field-name-field-accordion-item, .acc-title').length > 0 ) {
        $(".pane-bundle-gsb-accordion").addClass('designed-box');
    		var accordionHead = $(".field-name-field-accordion-item .field-name-field-header, .acc-title");
    		accordionHead.prepend('<span class="accordion-toggle"></span>');
    		accordionHead.click(function (e) {
    			var $this = $(this);
    			if ($this.parents('.entity').length > 0) {
    				$this.toggleClass('opened').parents('.entity').find('.field-name-field-description').slideToggle(250);
    			} else {
    				$this.toggleClass('opened').next('.accordion-body-wrap').slideToggle(250);
    			
    			}
    		});    		

    	}

    	function touchNeighbour(e, className, className2) {
    		var next = e.parent().next(); 		
    		if ( next.hasClass(className) || next.hasClass(className2) ) {
    			next.insertAfter(e);
    			touchNeighbour(next, className, className2);
    		} else {
    			return false;
    		}
    	}
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


