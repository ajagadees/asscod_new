(function ($) {
    "use strict";


  

  
 
  
   
  /***************************************
  jquery Scollup activation code
  ***************************************/
  $.scrollUp({
    scrollText: '<i class="fa fa-long-arrow-up"></i>',
    easingType: 'linear',
    scrollSpeed: 900,
    animation: 'fade'
  });


   


  /****************************************
   Carousel slider initiation
  ***************************************/
  $('.kon-carousel').each(function () {
      var carousel = $(this),
          loop = carousel.data('loop'),
          items = carousel.data('items'),
          margin = carousel.data('margin'),
          stagePadding = carousel.data('stage-padding'),
          autoplay = carousel.data('autoplay'),
          autoplayTimeout = carousel.data('autoplay-timeout'),
          smartSpeed = carousel.data('smart-speed'),
          dots = carousel.data('dots'),
          nav = carousel.data('nav'),
          navSpeed = carousel.data('nav-speed'),
          rXsmall = carousel.data('r-x-small'),
          rXsmallNav = carousel.data('r-x-small-nav'),
          rXsmallDots = carousel.data('r-x-small-dots'),
          rXmedium = carousel.data('r-x-medium'),
          rXmediumNav = carousel.data('r-x-medium-nav'),
          rXmediumDots = carousel.data('r-x-medium-dots'),
          rSmall = carousel.data('r-small'),
          rSmallNav = carousel.data('r-small-nav'),
          rSmallDots = carousel.data('r-small-dots'),
          rMedium = carousel.data('r-medium'),
          rMediumNav = carousel.data('r-medium-nav'),
          rMediumDots = carousel.data('r-medium-dots'),
          rLarge = carousel.data('r-large'),
          rLargeNav = carousel.data('r-large-nav'),
          rLargeDots = carousel.data('r-large-dots'),
          center = carousel.data('center');

      carousel.owlCarousel({
          loop: (loop ? true : false),
          items: (items ? items : 4),
          lazyLoad: true,
          margin: (margin ? margin : 0),
          autoplay: (autoplay ? true : false),
          autoplayTimeout: (autoplayTimeout ? autoplayTimeout : 1000),
          smartSpeed: (smartSpeed ? smartSpeed : 250),
          dots: (dots ? true : false),
          nav: (nav ? true : false),
          navText: ["<i class='fa fa-angle-left' aria-hidden='true'></i>", "<i class='fa fa-angle-right' aria-hidden='true'></i>"],
          navSpeed: (navSpeed ? true : false),
          center: (center ? true : false),
          responsiveClass: true,
          responsive: {
              0: {
                  items: ( rXsmall ? rXsmall : 1),
                  nav: ( rXsmallNav ? true : false),
                  dots: ( rXsmallDots ? true : false)
              },
              480: {
                  items: ( rXmedium ? rXmedium : 2),
                  nav: ( rXmediumNav ? true : false),
                  dots: ( rXmediumDots ? true : false)
              },
              768: {
                  items: ( rSmall ? rSmall : 3),
                  nav: ( rSmallNav ? true : false),
                  dots: ( rSmallDots ? true : false)
              },
              992: {
                  items: ( rMedium ? rMedium : 5),
                  nav: ( rMediumNav ? true : false),
                  dots: ( rMediumDots ? true : false)
              },
              1199: {
                  items: ( rLarge ? rLarge : 6),
                  nav: ( rLargeNav ? true : false),
                  dots: ( rLargeDots ? true : false)
              }
          }
      });

  });

  /********************************************
  Define the maximum height for mobile menu 
  **********************************************/
  $(window).on("load resize", function(){

    var wHeight = $(window).height();
   $(".mean-nav > ul").css('max-height', wHeight + "px");

 });

})(jQuery);
