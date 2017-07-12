// Can also be used with $(document).ready()
$(window).load(function() {
  $('.flexslider').flexslider({
    animation: "slide",
    controlNav: "thumbnails",
    slideshowSpeed: 5000, 
    pauseOnAction: false,
        start: function(){
        $('.flexslider .slide.flex-active-slide .slide_bloc_txt').removeAttr('style');
        $('.flexslider .slide.flex-active-slide .slide_bloc_txt').delay(4000).animate({
          left: '200%',
          opacity: 0
      }, 1000);

        },
        after: function(){
        $('.flexslider .slide.flex-active-slide .slide_bloc_txt').removeAttr('style');
        $('.flexslider .slide.flex-active-slide .slide_bloc_txt').delay(4000).animate({
          left: '200%',
          opacity: 0
      }, 1000);

        }
  });
  //$('.flexslider .slide.flex-active-slide .slide_bloc_txt').slideUp( 300 ).delay(800).fadeOut( 400 );
});