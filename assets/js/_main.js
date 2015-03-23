/* ========================================================================
 * DOM-based Routing
 * Based on http://goo.gl/EUTi53 by Paul Irish
 *
 * Only fires on body classes that match. If a body class contains a dash,
 * replace the dash with an underscore when adding it to the object below.
 *
 * .noConflict()
 * The routing is enclosed within an anonymous function so that you can 
 * always reference jQuery with $, even when in .noConflict() mode.
 *
 * Google CDN, Latest jQuery
 * To use the default WordPress version of jQuery, go to lib/config.php and
 * remove or comment out: add_theme_support('jquery-cdn');
 * ======================================================================== */

(function($) {

// Use this variable to set up the common and page specific functions. If you 
// rename this variable, you will also need to rename the namespace below.
var Roots = {
  // All pages
  common: {
    init: function() {
      // JavaScript to be fired on all pages
    }
  },
  // Home page
  home: {
    init: function() {
      // JavaScript to be fired on the home page
    }
  },
  // About us page, note the change from about-us to about_us.
  about_us: {
    init: function() {
      // JavaScript to be fired on the about us page
    }
  }
};

// The routing fires all common scripts, followed by the page specific scripts.
// Add additional events for more control over timing e.g. a finalize event
var UTIL = {
  fire: function(func, funcname, args) {
    var namespace = Roots;
    funcname = (funcname === undefined) ? 'init' : funcname;
    if (func !== '' && namespace[func] && typeof namespace[func][funcname] === 'function') {
      namespace[func][funcname](args);
    }
  },
  loadEvents: function() {
    UTIL.fire('common');

    $.each(document.body.className.replace(/-/g, '_').split(/\s+/),function(i,classnm) {
      UTIL.fire(classnm);
    });
  }
};

$(document).ready(UTIL.loadEvents);

})(jQuery); // Fully reference jQuery after this point.


//********** Scroll Direction Check *************//
var felcsoki=0;
var lecsoki=0;
var mousewheelevt = (/Firefox/i.test(navigator.userAgent)) ? "DOMMouseScroll" : "mousewheel"; //FF doesn't recognize mousewheel as of FF3.x
$(document).bind(mousewheelevt, function(e) {
        var evt = window.event || e; //equalize event object     
        evt = evt.originalEvent ? evt.originalEvent : evt; //convert to originalEvent if possible               
        var delta = evt.detail ? evt.detail*(-40) : evt.wheelDelta; //check for detail first, because it is used by Opera and FF
        if(delta > 0)
            {
            //console.log('Felfele');
            if (felcsoki++ >= 2 ) {
              lecsoki=0;
              $('.fixedhead').addClass('show');
              $('body').attr('data-offset','65');
            }
            }
        else
            {
            //console.log('Lefele');
            if (lecsoki++ > 2 ) {
              felcsoki=0;
              $('.fixedhead').removeClass('show');
              $('body').attr('data-offset','0');
            }
            }
    }
);

//*********** Smooth scroll *************

jQuery(document).ready(function() {
  
  $('.is_dark').waypoint(function() {
    $('.navbar').removeClass('redbg');
    $('.navbar').addClass('whitebg');
  }, { offset: 65 });
  $('.is_light').waypoint(function() {
    $('.navbar').removeClass('whitebg');
    $('.navbar').addClass('redbg');
  }, { offset: 65 });
  $('.is_opaque').waypoint(function() {
    $('.navbar').removeClass('redbg');
    $('.navbar').removeClass('whitebg');
  }, { offset: 65 });



  /************* Main header Fixing ***********/
  var htop = $('.navbar').offset().top - parseFloat($('.navbar').css('marginTop').replace(/auto/, 0));
  $(window).scroll(function (event) {
    var y = $(this).scrollTop();
    if (y-3 >= htop) {
      $('.navbar').addClass('fixedhead');
    } else {
      $('.navbar').removeClass('fixedhead');
    }
    //$('body').attr('data-offset' ,  $('.banner').height() );
  });
  /************* End of fixing ***********/




  $('.popup-zoom').magnificPopup({
    type: 'image',
    closeOnContentClick: true,
    closeBtnInside: false,
    fixedContentPos: true,
    mainClass: 'mfp-with-zoom', // class to remove default margin from left and right side
    image: {
      verticalFit: true
    },
    zoom: {
      enabled: true,
      duration: 300 // don't foget to change the duration also in CSS
    }
  });


  $('.popup-3d').magnificPopup({
    disableOn: 480,
    type: 'iframe',
    mainClass: 'mfp-with-zoom',
    removalDelay: 160,
    preloader: false,

    fixedContentPos: true,
    zoom: {
      enabled: true,
      duration: 300 // don't foget to change the duration also in CSS
    }
  });


  $('.home--videoblock').fitVids();


});

