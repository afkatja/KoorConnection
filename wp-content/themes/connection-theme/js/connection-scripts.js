jQuery(function($){
  var $loginForm = $('.login-form');
  $loginForm.addClass('hidden');
  $('a.pulldown').click(function(e){
    e.preventDefault();
    if($(this).hasClass('icon-expand')) { 
    	pullDownLogin.goDown(this, $loginForm); 
    } else {
    	pullDownLogin.goUp(this, $loginForm); 
  	}
   });
   $(document).click(function(ev){  
     if($.contains($('.login-form')[0], ev.target) || ($(ev.target)[0] == $('.pulldown')[0] && $loginForm.hasClass('expanded'))) {
        return;
     } else pullDownLogin.goUp($('.pulldown'), $loginForm);  
   });
   $('.input-field input').focus(function(){
     $(this).parent().find('label.abs').hide();
   }).blur(function(){
     $(this).parent().find('label.abs').show();
   });
   
  /* Isotope masonic tiles */
  $('.gallery').isotope({
    // options
    itemSelector : '.gallery-item'
  });
   
  var picasaweb = 'https://picasaweb.google.com/data/feed/api/user/114842468267912126592/albumid/5664032092199429489?kind=photo',
  photos = [];
  
  $.getJSON(picasaweb + "&alt=json-in-script&callback=?", function(data, status) {
    $.each(data.feed.entry, function(i, pic) {
      var thumb = pic.media$group.media$thumbnail[0];
      var photo = pic.media$group.media$content[0];
      var desc = pic.media$group.media$description.$t;
      $('<img/>').attr({
          'src': pic.content.src,
          'alt': desc
      }).appendTo('.photo-slider p.mask').hide();
    //$('.photo-slider img:first').addClass('current');
    });
    //setInterval(cycleImages, 5000);
  });

  var pullDownLogin = {
    init: function(){
       
    },
     goDown: function(target, div){
       $(div).removeClass('hidden').slideDown(200, function(){
         $(this).addClass('expanded').find('input').eq(0).focus();
       });
       $(target).removeClass('icon-expand').addClass('active icon-collapse');
     },
     goUp: function(target, div){
       $(div).addClass('expanded').slideUp(200).addClass('hidden');
       $(target).removeClass('active icon-collapse').addClass('icon-expand');
     }
  };
  
  var cycleImages = function(){       
    var $active = $('.photo-slider .current'),
        $prev = $active.prev(),
        $next = ($('.photo-slider .current').next().length > 0) ? $('.photo-slider .current').next() : $('.photo-slider img:first');
    $next.css('z-index', 2); //move the next image up the pile
    $active.fadeOut(1500, function(){ //fade out the top image
      $active.css('z-index', 1).show().removeClass('current'); //reset the z-index and unhide the image
      $next.css('z-index', 3).addClass('current').fadeIn(1500); //make the next image the top one
      $prev.hide();
    });
  };
      
  function randomCycle(){
    var imgarr = $('.photo-slider img'),
        x = Math.floor(Math.random() * imgarr.length),
        $current = imgarr.eq(x),
        $next = $current.next().length > 0 ? $current.next() : $('.photo-slider img:first');
    $current.fadeOut(1500);
    $next.fadeIn(1500);
  }

  setInterval(function(){
    randomCycle();
  }, 3000);
});

jQuery.fn.filterNode = function(name) {
  return this.filter(function() {
      return this.nodeName === name;
  });
};

/*!
 * Mobile Menu
 */
(function ($) {
	var current = $('.main-nav li.current-menu-item a').html();
	current = $('.main-nav li.current_page_item a').html();
	if ($('span').hasClass('custom-mobile-menu-title')) {
		current = $('span.custom-mobile-menu-title').html();
	} else if (typeof current == 'undefined' || current === null) {
			switch ($('body').attr('class')) {
				case 'home':
					if ($('#logo span').hasClass('site-name')) {
						current = $('#logo .site-name a').html();
					} else {
						current = $('#logo img').attr('alt');
					}
				break;
				case 'woocommerce':
					current = $('.page-title').html();
				break;
				case 'archive':
					current = $('.title-archive').html();
				break;
				case 'search-results':
					current = $('.title-search-results').html();
				break;
				case 'page-template-blog-excerpt-php':
					current = $('.current_page_item').text();
				break;
				case 'page-template-blog-php':
				break;
				case 'post-title':
					current = $('.post-title').html();
				break;
				default: 
					current = '&nbsp;';
			}
	}
	$('.main-nav').append('<a id="responsive_menu_button" class="icon-menu-1" />').prepend('<p id="responsive_current_menu_item">' + current + '</p>');
	$('a#responsive_menu_button, #responsive_current_menu_item').click(function () {
		$('.js .main-nav .menu').slideToggle(function () {
			if ($(this).is(':visible')) {
				$('a#responsive_menu_button').addClass('responsive-toggle-open');
			}
			else {
				$('a#responsive_menu_button').removeClass('responsive-toggle-open');
				$('.js .main-nav .menu').removeAttr('style');
			}
		});
	});
})(jQuery);

// Close the mobile menu when clicked outside of it.
(function ($) {
	$(document).click(function () {
		// Check if the menu is open, close in that case.
		if ($('a#responsive_menu_button').hasClass('responsive-toggle-open')) {
			$('.js .main-nav .menu').slideToggle(function () {
				$('a#responsive_menu_button').removeClass('responsive-toggle-open');
				$('.js .main-nav .menu').removeAttr('style');
			});
		}
	})
})(jQuery);