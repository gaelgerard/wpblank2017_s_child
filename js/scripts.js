// DOM Ready
/*chemin vers le répertoire du thème maître templateDir et du thème enfant childThemeDir*/
	var templateDir = object_name.templateDir;
	var childThemeDir = object_name.childThemeDir;
    jQuery(function ($){
 
       
// infinitescroll() is called on the element that surrounds 
// the items you will be loading more of
		$('.listepv, .liste.search, .actus').infinitescroll({
		 
			navSelector  : "div.pagination",            
										 // selector for the paged navigation (it will be hidden)
		 
			nextSelector : "div.pagination .next.page-numbers",    
										 // selector for the NEXT link (to page 2)
		 
			itemSelector : ".listepv article.doc, .liste.search article, .actus article",          
										 // selector for all items you'll retrieve
			 loading: {							 
            finishedMsg: "<em>Bas de liste atteint</em>",
            img: childThemeDir+'/img/loading_anim.gif',
			 },
		 
		 },function(arrayOfNewElems){
		 
				 // optional callback when new content is successfully loaded in.
		 
				 // keyword `this` will refer to the new DOM content that was just added.
				 // as of 1.5, `this` matches the element you called the plugin on (e.g. #content)
				 //                   all the new elements that were found are passed in as an array
		
		 
			jQuery('.the_excerpt').succinct({
			    size: 100
			});
			
				$('a.btn_dl_doc:not(.readmore)').hover(function() {
							$(this).animate({backgroundColor: '#1e90ff'}, 'slow');
					 }, function() {
						 $(this).animate({backgroundColor: '#ffffff'},'slow');
				 });	
				$('a.btn_dl_doc.readmore').hover(function() {
						 $(this).children().animate({color: '#ffffff'},'slow');
					 }, function() {
							$(this).children().animate({color: '#1e90ff'}, 'slow');
				 });	
				$('a.readmore:not(.archives), .actus.liens article a').hover(function() {
							$(this).parents('article').animate({backgroundColor: '#1e90ff'}, 'slow');
							$(this).siblings('p.the_category').animate({color: '#ffffff'}, 'slow');
							$(this).siblings('p.the_category').children('a').animate({color: '#ffffff'}, 'slow');
							$(this).siblings('h3, a').animate({color: '#ffffff'}, 'slow');
							$(this).animate({color: '#ffffff'}, 'slow');
					 }, function() {
						 $(this).parents('article').animate({backgroundColor: '#ffffff'},'slow');
							$(this).siblings('p.the_category').animate({color: '#1e90ff'}, 'slow');
							$(this).siblings('p.the_category').children('a').animate({color: '#1e90ff'}, 'slow');
							$(this).siblings('h3, a').animate({color: '#1e90ff'}, 'slow');
							$(this).animate({color: '#1e90ff'}, 'slow');
				 });		
		});			

			
			//$('.home-content .main article.expanded').click(function(){
			//	$('body, html').animate({scrollTop:$(this).scrollHeight}, 1000);
			//});
				$('.home-content .main article .fa-times').click(function(){
				$(this).parent('.texte').slideUp();
			});
				$('a.btn_dl_doc:not(.readmore)').hover(function() {
							$(this).animate({backgroundColor: '#1e90ff'}, 'slow');
					 }, function() {
						 $(this).animate({backgroundColor: '#ffffff'},'slow');
				 });	
				$('a.btn_dl_doc.readmore').hover(function() {
						 $(this).children().animate({color: '#ffffff'},'slow');
					 }, function() {
							$(this).children().animate({color: '#1e90ff'}, 'slow');
				 });	
				$('a.readmore:not(.archives), .actus.liens article a').hover(function() {
							$(this).parents('article').animate({backgroundColor: '#1e90ff'}, 'slow');
							$(this).siblings('p.the_category').animate({color: '#ffffff'}, 'slow');
							$(this).siblings('p.the_category').children('a').animate({color: '#ffffff'}, 'slow');
							$(this).siblings('h3, a').animate({color: '#ffffff'}, 'slow');
							$(this).animate({color: '#ffffff'}, 'slow');
					 }, function() {
						 $(this).parents('article').animate({backgroundColor: '#ffffff'},'slow');
							$(this).siblings('p.the_category').animate({color: '#1e90ff'}, 'slow');
							$(this).siblings('p.the_category').children('a').animate({color: '#1e90ff'}, 'slow');
							$(this).siblings('h3, a').animate({color: '#1e90ff'}, 'slow');
							$(this).animate({color: '#1e90ff'}, 'slow');
				 });		
//$(".home-content .main article.expanded").scrollTop($(".home-content .main article.expanded")[0].scrollHeight);
			$(window).load(function() {
		
            // When the page has loaded
            
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


			