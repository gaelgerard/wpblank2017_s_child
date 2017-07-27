// DOM Ready
/*chemin vers le répertoire du thème maître templateDir et du thème enfant childThemeDir*/
	var templateDir = object_name.templateDir;
	var childThemeDir = object_name.childThemeDir;
jQuery(function ($){
			$('#primary-menu .menu-item:not(.sub-menu .menu-item)').addClass('inbl pas');
 $(window).load(function() {
		
            // When the page has loaded
			
            
			$('.search-header-toggle').click(function() {
				$(this).parent('.search-header').toggleClass('active');
				});
    });
// media query event handler
var detectViewPort = function(){
    var viewPortWidth = $(window).width();
 if (viewPortWidth > 750) {
			// window width is at least 767px
			$('.main .content_article h2').removeClass('vingt');
		}
		else {
			// window width is less than 768px
			$('.main .content_article h2').addClass('vingt');
			$('#header-connect .fa-sign-in').click(function() {
					$('#header-connect #login').stop(true,false).slideToggle();
				});
		
	
	}// END media query change
};

		$(function(){
		  detectViewPort();
		});
		
		$(window).resize(function () {
		   detectViewPort();
		});
	

});


			