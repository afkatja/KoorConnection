jQuery.noConflict();

(function($){
	/*!
	* Mobile Menu
	*/
	$(function(){
		var $expander = $('[data-role="mobile-nav-expander"]');
		var $mainNav = $('.main-nav');
		
		// Close the mobile menu when clicked outside of it.
		$(document).click(function (e) {
			if($(e.target).is($expander)) {
			return;
			} else {
				// Check if the menu is open, close in that case.
				if ($expander.hasClass('nav-toggle-open')) {
					$mainNav.removeClass('shown');
					$expander.removeClass('nav-toggle-open');
				}
			}
		});
		
		$expander.click(function (e) {
			e.preventDefault();
			var shown = $mainNav.hasClass('shown');
			if(!shown){ 
				$(this).addClass('nav-toggle-open');
				$mainNav.addClass('shown');
			} else {
				$(this).removeClass('nav-toggle-open');
				$mainNav.removeClass('shown');
			}
		});

		//toggle open login menu
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
	     if($(ev.target)[0] == $('.pulldown')[0] && $loginForm.hasClass('expanded')) {
	        return;
	     } else pullDownLogin.goUp($('.pulldown'), $loginForm);  
	   });
	   
	   //fake placeholders with label elements
	   $('.input-field input').focus(function(){
	     $(this).parent().find('label.abs').hide();
	   }).blur(function(){
	     $(this).parent().find('label.abs').show();
	   });
	   
	  /* Isotope masonic tiles */
	  /*$('.post-entry .gallery').isotope({
	    // options
	    itemSelector : '.gallery-item'
	  });
	  $('.post-entry .photonic-stream').isotope({
	  	itemSelector: '.photonic-gallery-c'
	  });*/
	  
	  $('.post-entry .gallery-item').each(function(i, el){
	    var img = $(el).find('.gallery-icon img');
	    var title = img.attr('data-image-title');
	    img.after('<span class="gallery-item-title">'+title+'</span>');
	  });
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
})(jQuery);