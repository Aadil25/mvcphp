/*!

 =========================================================
 * Paper Dashboard - v1.2.0
 =========================================================

 * Product Page: http://www.creative-tim.com/product/paper-dashboard
 * Copyright 2018 Creative Tim (http://www.creative-tim.com)
 * Licensed under MIT (https://github.com/creativetimofficial/paper-dashboard/blob/master/LICENSE.md)

 =========================================================

 * The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

 */


var fixedTop = false;
var transparent = true;
var navbar_initialized = false;
var mobile_menu_initialized = false;

jQuery(document).ready(function(){
    window_width = jQuery(window).width();

    // Init navigation toggle for small screens
    if(window_width <= 991){
        pd.initRightMenu();
    }

    //  Activate the tooltips
    jQuery('[rel="tooltip"]').tooltip();

});

jQuery(document).on('click', '.navbar-toggle', function(){
  $toggle = jQuery(this);
  if(pd.misc.navbar_menu_visible == 1) {
    jQuery('html').removeClass('nav-open');
    pd.misc.navbar_menu_visible = 0;
    jQuery('#bodyClick').remove();
    setTimeout(function(){
      $toggle.removeClass('toggled');
    }, 400);
  } else {
    setTimeout(function(){
      $toggle.addClass('toggled');
    }, 430);

    div = '<div id="bodyClick"></div>';
    jQuery(div).appendTo("body").click(function() {
      jQuery('html').removeClass('nav-open');
      pd.misc.navbar_menu_visible = 0;
      jQuery('#bodyClick').remove();
      setTimeout(function(){
        $toggle.removeClass('toggled');
      }, 400);
    });

    jQuery('html').addClass('nav-open');
    pd.misc.navbar_menu_visible = 1;
  }
});

// activate collapse right menu when the windows is resized
jQuery(window).resize(function(){
    if(jQuery(window).width() <= 991){
        pd.initRightMenu();
    }
});

pd = {
    misc:{
        navbar_menu_visible: 0
    },
    checkScrollForTransparentNavbar: debounce(function() {
        if(jQuery(document).scrollTop() > 381 ) {
            if(transparent) {
                transparent = false;
                jQuery('.navbar-color-on-scroll').removeClass('navbar-transparent');
                jQuery('.navbar-title').removeClass('hidden');
            }
        } else {
            if( !transparent ) {
                transparent = true;
                jQuery('.navbar-color-on-scroll').addClass('navbar-transparent');
                jQuery('.navbar-title').addClass('hidden');
            }
        }
    }),
    initRightMenu: debounce(function() {
        var $sidebar_wrapper = jQuery('.sidebar-wrapper');
        var $sidebar = jQuery('.sidebar');

        if (!mobile_menu_initialized) {
            var $navbar = jQuery('nav').find('.navbar-collapse').children('.navbar-nav');

            mobile_menu_content = '';

            nav_content = $navbar.html();

            nav_content = '<ul class="nav nav-mobile-menu">' + nav_content + '</ul>';

            $sidebar_nav = $sidebar_wrapper.find(' > .nav');

            // insert the navbar form before the sidebar list
            $sidebar.addClass('off-canvas-sidebar');
            $nav_content = jQuery(nav_content);
            $nav_content.insertBefore($sidebar_nav);

            jQuery(".sidebar-wrapper .dropdown .dropdown-menu > li > a").click(function(event) {
                event.stopPropagation();

            });

            // simulate resize so all the charts/maps will be redrawn
            window.dispatchEvent(new Event('resize'));

            mobile_menu_initialized = true;
        } else {
            if (jQuery(window).width() > 991) {
                // reset all the additions that we made for the sidebar wrapper only if the screen is bigger than 991px
                $sidebar_wrapper.find('.nav-mobile-menu').remove();
                $sidebar.removeClass('off-canvas-sidebar');

                mobile_menu_initialized = false;
            }
        }
    }, 200)
}


// Returns a function, that, as long as it continues to be invoked, will not
// be triggered. The function will be called after it stops being called for
// N milliseconds. If `immediate` is passed, trigger the function on the
// leading edge, instead of the trailing.

function debounce(func, wait, immediate) {
	var timeout;
	return function() {
		var context = this, args = arguments;
		clearTimeout(timeout);
		timeout = setTimeout(function() {
			timeout = null;
			if (!immediate) func.apply(context, args);
		}, wait);
		if (immediate && !timeout) func.apply(context, args);
	};
};
