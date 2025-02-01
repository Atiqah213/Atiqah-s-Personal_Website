// menus 
function street_food_truck_menu_open_nav() {
	window.street_food_truck_responsiveMenu=true;
	jQuery(".sidenav").addClass('show');
}
function street_food_truck_menu_close_nav() {
	window.street_food_truck_responsiveMenu=false;
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
	window.street_food_truck_currentfocus=null;
  	street_food_truck_checkfocusdElement();
	var street_food_truck_body = document.querySelector('body');
	street_food_truck_body.addEventListener('keyup', street_food_truck_check_tab_press);
	var street_food_truck_gotoHome = false;
	var street_food_truck_gotoClose = false;
	window.street_food_truck_responsiveMenu=false;
 	function street_food_truck_checkfocusdElement(){
	 	if(window.street_food_truck_currentfocus=document.activeElement.className){
		 	window.street_food_truck_currentfocus=document.activeElement.className;
	 	}
 	}
 	function street_food_truck_check_tab_press(e) {
		"use strict";
		// pick passed event or global event object if passed one is empty
		e = e || event;
		var activeElement;

		if(window.innerWidth < 999){
		if (e.keyCode == 9) {
			if(window.street_food_truck_responsiveMenu){
			if (!e.shiftKey) {
				if(street_food_truck_gotoHome) {
					jQuery( ".main-menu ul:first li:first a:first-child" ).focus();
				}
			}
			if (jQuery("a.closebtn.mobile-menu").is(":focus")) {
				street_food_truck_gotoHome = true;
			} else {
				street_food_truck_gotoHome = false;
			}

		}else{

			if(window.street_food_truck_currentfocus=="responsivetoggle"){
				jQuery( "" ).focus();
			}}}
		}
		if (e.shiftKey && e.keyCode == 9) {
		if(window.innerWidth < 999){
			if(window.street_food_truck_currentfocus=="header-search"){
				jQuery(".responsivetoggle").focus();
			}else{
				if(window.street_food_truck_responsiveMenu){
				if(street_food_truck_gotoClose){
					jQuery("a.closebtn.mobile-menu").focus();
				}
				if (jQuery( ".main-menu ul:first li:first a:first-child" ).is(":focus")) {
					street_food_truck_gotoClose = true;
				} else {
					street_food_truck_gotoClose = false;
				}

			}else{

			if(window.street_food_truck_responsiveMenu){
			}}}}
		}
	 	street_food_truck_checkfocusdElement();
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

// Slick
jQuery('#slider .slider-for').slick({
  slidesToShow: 1,
  infinite: true,
  arrows: false,
  autoplay:true,
  autoplaySpeed:5000,
  fade: true,
  asNavFor: '.slider-nav',

});
jQuery('#slider .slider-nav').slick({
  slidesToShow: 3,
  infinite: true,
  centerPadding: '0px',
  arrows: true,
  slidesToScroll: 1,
  asNavFor: '#slider .slider-for',
  dots: true,
  focusOnSelect: true,
	responsive: [
      {
        breakpoint: 991,
        settings: {
          slidesToShow: 3,
        }
      },
      {
        breakpoint: 767,
        settings: {
          slidesToShow: 3,
        }
      }
    ]
})
