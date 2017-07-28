// Can also be used with $(document).ready()
jQuery(function ($){
  $(window).load(function() {
    $('.flexslider').flexslider({
      animation: "slide",
      controlNav: false,
      slideshowSpeed: 5000, 
      pauseOnAction: true,
  
          
    });
    //$('.flexslider .slide.flex-active-slide .slide_bloc_txt').slideUp( 300 ).delay(800).fadeOut( 400 );
  });
});