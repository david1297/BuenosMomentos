(function($) {
    "use strict"; // Start of use strict
  
    // Smooth scrolling using jQuery easing
    $('a.js-scroll-trigger[href*="#"]:not([href="#"])').click(function() {
      if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
        var target = $(this.hash);
        target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
       
        $('html, body').animate({
            scrollTop: (target.offset().top-200)
          }, 1000);
      }
    });
    $('body').scrollspy({
        target: '#main',
        offset: 1000
      });
  
   
  
  
  })(jQuery); // End of use strict
  