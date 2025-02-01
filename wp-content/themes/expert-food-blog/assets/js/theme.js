jQuery(function($){
    "use strict";
    jQuery('.main-menu > ul').superfish({
        delay:       500,
        animation:   {opacity:'show',height:'show'},
        speed:       'fast'
    });
});

"use strict";

//* Navbar Fixed
function navbarFixed(){
    if ( jQuery('.main-header.is-sticky-on').length ){ 
        $(window).on('scroll', function() {
            var scroll = jQuery($).scrollTop();
            if (scroll >= 295) {
                $(".main-header.is-sticky-on").addClass("header-fixed");
            } else {
                $(".main-header.is-sticky-on").removeClass("header-fixed");
            }
        });  
    };
};

jQuery('.navbar-menubar.responsive-menu .navbar-nav').find( 'a' ).on( 'focus blur', function() {
    jQuery( this ).parents( 'ul, li' ).toggleClass( 'focus' );
});   
    
/*Function Calls*/ 

jQuery(document).ready(function() {
    jQuery(".navbar-toggler").on("click", function(n) {
        if (jQuery(this).attr('aria-expanded') == 'false' ) {
            jQuery(".navbar-menubar").removeClass('active');
            jQuery(".navbar-toggler:not(.navbar-toggler-close)").focus();
        } else {
            jQuery(".navbar-menubar").addClass('active');
            jQuery(".navbar-toggler.navbar-toggler-close").focus();
            n.preventDefault();
            var t, a, c, o = document.querySelector(".navbar-menu");
            let e = 'button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])',
                m = document.querySelector(".navbar-toggler-close"),
                u = o.querySelectorAll(e),
                r = u[u.length - 1];
            if (!o) return !1;
            for (a = 0, c = (t = o.getElementsByTagName("button")).length; a < c; a++) t[a].addEventListener("focus", l, !0), t[a].addEventListener("blur", l, !0);

            function l() {
                for (var e = this; - 1 === e.className.indexOf("navbar-menu");) "li" === e.tagName.toLowerCase() && (-1 !== e.className.indexOf("focus") ? e.className = e.className.replace("focus", "") : e.className += " focus"), e = e.parentElement
            }
            document.addEventListener("keydown", function(e) {
                ("Tab" === e.key || 9 === e.keyCode) && (e.shiftKey ? document.activeElement === m && (r.focus(), e.preventDefault()) : document.activeElement === r && (m.focus(), e.preventDefault()))
            })
        }
    });

    var expert_food_blog_dropdownToggle = jQuery('.navbar-nav.main-nav .dropdown > a.nav-link');
    expert_food_blog_dropdownToggle.after('<button type="button" class="dropdown-icon"></button>');
    expert_food_blog_dropdownToggle.removeAttr('data-bs-toggle').removeAttr('data-bs-target').removeAttr('aria-expanded').removeAttr('data-bs-name').removeAttr('aria-haspopup');
    jQuery(document).on('click', '.navbar-nav.main-nav .dropdown > button.dropdown-icon', function() {
        jQuery(this).parent(".menu-item").toggleClass("show");
        jQuery(this).next(".sub-menu").slideToggle();
    });
    jQuery(window).on('resize', expert_food_blog_desktopmenu);
    function expert_food_blog_desktopmenu() {
        if (window.matchMedia("(min-width: 992px)").matches) {
            jQuery('.sub-menu.collapse').removeAttr('style');
        }
    }
    jQuery(document).on('click', '.navbar-nav.main-nav .dropdown > a', function() {
        location.href = this.href;
    });

    expert_food_blog_search_focus();
});
var btn = jQuery('#scrolltop');

jQuery(window).scroll(function() {
  if (jQuery(window).scrollTop() > 300) {
    btn.addClass('scroll');
  } else {
    btn.removeClass('scroll');
  }
});

btn.on('click', function(e) {
  e.preventDefault();
  jQuery('html, body').animate({scrollTop:0}, '300');
});

window.addEventListener('load', (event) => {
    jQuery(".loading").delay(2000).fadeOut("slow");
});

//sticy header js

jQuery(window).scroll(function () {
    var sticky = jQuery('.sticky-header'),
    scroll = jQuery(window).scrollTop();

    if (scroll >= 100) sticky.addClass('fixed-header');
    else sticky.removeClass('fixed-header');
});

// search
function expert_food_blog_search_focus() {

  /* First and last elements in the menu */
  var expert_food_blog_search_firstTab = jQuery('.inner_searchbox input[type="search"]');
  var expert_food_blog_search_lastTab  = jQuery('button.search-close'); /* Cancel button will always be last */

  jQuery(".open-search").click(function(e){
    e.preventDefault();
    e.stopPropagation();
    jQuery('body').addClass("search-focus");
    expert_food_blog_search_firstTab.focus();
  });

  jQuery("button.search-close").click(function(e){
    e.preventDefault();
    e.stopPropagation();
    jQuery('body').removeClass("search-focus");
    jQuery(".open-search").focus();
  });

  /* Redirect last tab to first input */
  expert_food_blog_search_lastTab.on('keydown', function (e) {
    if (jQuery('body').hasClass('search-focus'))
    if ((e.which === 9 && !e.shiftKey)) {
      e.preventDefault();
      expert_food_blog_search_firstTab.focus();
    }
  });

  /* Redirect first shift+tab to last input*/
  expert_food_blog_search_firstTab.on('keydown', function (e) {
    if (jQuery('body').hasClass('search-focus'))
    if ((e.which === 9 && e.shiftKey)) {
      e.preventDefault();
      expert_food_blog_search_lastTab.focus();
    }
  });

  /* Allow escape key to close menu */
  jQuery('.inner_searchbox').on('keyup', function(e){
    if (jQuery('body').hasClass('search-focus'))
    if (e.keyCode === 27 ) {
      jQuery('body').removeClass('search-focus');
      expert_food_blog_search_lastTab.focus();
    };
  });
}
