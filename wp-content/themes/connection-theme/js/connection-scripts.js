jQuery.noConflict();

(function($){
	/*!
	* Mobile Menu
	*/
	$(function(){
    setInterval(function(){
      cycleImages($('.featured-slider'));
    }, 15000);

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

		$('.prev, .next').click(fakeNav);

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
      if(ev.target == $('.pulldown')[0] || ev.target == $('.flydown')[0] || $(ev.target).parents('.flydown').length && $loginForm.hasClass('expanded')) {
        return;
      } else pullDownLogin.goUp($('.pulldown'), $loginForm);
    });

		var $mobileMemberTrigger = $('[data-role="toggle-members-nav"]');
		$mobileMemberTrigger.on('click', toggleMembersNav);

	   //fake placeholders with label elements
	   $('.input-field input').focus(function(){
	     $(this).parent().find('label.abs').hide();
	   }).blur(function(){
	     $(this).parent().find('label.abs').show();
	   });

	  $('.post-entry .gallery-item').each(function(i, el){
	    var img = $(el).find('.gallery-icon img');
	    var title = img.attr('data-image-title');
	    img.after('<span class="gallery-item-title">'+title+'</span>');
	  });
	});

	var away = true;
	function toggleMembersNav(e){
		away = !away;
		$(e.target).toggleClass('icon-login', away).toggleClass('icon-logout', !away);
		$('.members-menu').toggleClass('away', away);
	}

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

  function fakeNav(e){
  	var btn = $(e.target).find('a');
  	btn.click();
  }

  var cycleImages = function($container){
    var $active = $container.find('.current'),
        $prev = $active.prev(),
        $next = ($container.find('.current').next().length > 0) ? $container.find('.current').next() : $container.find('img:first');
    $next.show().css('zIndex', 2);
    $active.fadeOut(1500, function(){ //fade out the top image
      $active.css('z-index', 1).removeClass('current'); //reset the z-index and unhide the image
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
