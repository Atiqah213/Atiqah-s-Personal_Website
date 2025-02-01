// menus 
function adventure_camping_menu_open_nav() {
	window.adventure_camping_responsiveMenu=true;
	jQuery(".sidenav").addClass('show');
}
function adventure_camping_menu_close_nav() {
	window.adventure_camping_responsiveMenu=false;
 	jQuery(".sidenav").removeClass('show');
}
jQuery(function($){
 	"use strict";
 	jQuery('.main-menu > ul').superfish({
		delay: 500,
		animation: {opacity:'show',height:'show'},
		speed: 'fast'
 	});
});

jQuery(document).ready(function () {
	window.adventure_camping_currentfocus=null;
  	adventure_camping_checkfocusdElement();
	var adventure_camping_body = document.querySelector('body');
	adventure_camping_body.addEventListener('keyup', adventure_camping_check_tab_press);
	var adventure_camping_gotoHome = false;
	var adventure_camping_gotoClose = false;
	window.adventure_camping_responsiveMenu=false;
 	function adventure_camping_checkfocusdElement(){
	 	if(window.adventure_camping_currentfocus=document.activeElement.className){
		 	window.adventure_camping_currentfocus=document.activeElement.className;
	 	}
 	}
 	function adventure_camping_check_tab_press(e) {
		"use strict";
		// pick passed event or global event object if passed one is empty
		e = e || event;
		var activeElement;

		if(window.innerWidth < 999){
		if (e.keyCode == 9) {
			if(window.adventure_camping_responsiveMenu){
			if (!e.shiftKey) {
				if(adventure_camping_gotoHome) {
					jQuery( ".main-menu ul:first li:first a:first-child" ).focus();
				}
			}
			if (jQuery("a.closebtn.mobile-menu").is(":focus")) {
				adventure_camping_gotoHome = true;
			} else {
				adventure_camping_gotoHome = false;
			}

		}else{

			if(window.adventure_camping_currentfocus=="responsivetoggle"){
				jQuery( "" ).focus();
			}}}
		}
		if (e.shiftKey && e.keyCode == 9) {
		if(window.innerWidth < 999){
			if(window.adventure_camping_currentfocus=="header-search"){
				jQuery(".responsivetoggle").focus();
			}else{
				if(window.adventure_camping_responsiveMenu){
				if(adventure_camping_gotoClose){
					jQuery("a.closebtn.mobile-menu").focus();
				}
				if (jQuery( ".main-menu ul:first li:first a:first-child" ).is(":focus")) {
					adventure_camping_gotoClose = true;
				} else {
					adventure_camping_gotoClose = false;
				}

			}else{

			if(window.adventure_camping_responsiveMenu){
			}}}}
		}
	 	adventure_camping_checkfocusdElement();
	}
});

jQuery('document').ready(function($){
	// preloader
  setTimeout(function () {
		jQuery("#preloader").fadeOut("slow");
  },1000);

  // Sticky Header
  $(window).scroll(function(){
		var sticky = $('.header-sticky'),
			scroll = $(window).scrollTop();

		if (scroll >= 100) sticky.addClass('header-fixed');
		else sticky.removeClass('header-fixed');
	});
});

// Scroller
jQuery(document).ready(function () {
	jQuery(window).scroll(function () {
    if (jQuery(this).scrollTop() > 100) {
      jQuery('.scrollup i').fadeIn();
    } else {
      jQuery('.scrollup i').fadeOut();
    }
	});
	jQuery('.scrollup i').click(function () {
    jQuery("html, body").animate({
      scrollTop: 0
    }, 600);
    return false;
	});
});

// search
jQuery(document).ready(function () {
    function adventure_camping_search_loop_focus(element) {
    var adventure_camping_focus = element.find('select, input, textarea, button, a[href]');
    var adventure_camping_firstFocus = adventure_camping_focus[0];  
    var adventure_camping_lastFocus = adventure_camping_focus[adventure_camping_focus.length - 1];
    var KEYCODE_TAB = 9;

    element.on('keydown', function adventure_camping_search_loop_focus(e) {
      var isTabPressed = (e.key === 'Tab' || e.keyCode === KEYCODE_TAB);

      if (!isTabPressed) { 
        return; 
      }

      if ( e.shiftKey ) /* shift + tab */ {
        if (document.activeElement === adventure_camping_firstFocus) {
          adventure_camping_lastFocus.focus();
            e.preventDefault();
          }
        } else /* tab */ {
        if (document.activeElement === adventure_camping_lastFocus) {
          adventure_camping_firstFocus.focus();
            e.preventDefault();
          }
        }
    });
  }
  jQuery('.search-box span a').click(function(){
      jQuery(".serach_outer").slideDown(1000);
      adventure_camping_search_loop_focus(jQuery('.serach_outer'));
  });

  jQuery('.closepop a').click(function(){
      jQuery(".serach_outer").slideUp(1000);
  });
});

// Post slider
jQuery('document').ready(function(){
  var owl = jQuery('#camp-section .owl-carousel');
    owl.owlCarousel({
    loop: true,
    dots:false,
    autoplay : true,
    nav:true,
    navText : ['<i class="fa-solid fa-angle-left"></i>','<i class="fa-solid fa-angle-right"></i>'],
    responsive: {
      0: {
        items: 1,
      },
      600: {
        items: 2
      },
      1024: {
        items: 3,
        margin:10
      },
      1200: {
        items: 3,
        margin:10,
      }
    },
    autoplayHoverPause : true,
    mouseDrag: true
  });
});