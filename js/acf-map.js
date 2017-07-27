var templateDir = object_name.templateDir;
(function($) {
 
/*
*  render_map
*
*  This function will render a Google Map onto the selected jQuery element
*
*  @type	function
*  @date	8/11/2013
*  @since	4.3.0
*
*  @param	$el (jQuery element)
*  @return	n/a
*/
 
function render_map( $el ) {
 
	// var
	var $markers = $el.find('.marker');
 
	// vars
	var args = {
		zoom		: 7,
		center		: new google.maps.LatLng(0, 0),
		mapTypeControlOptions: {
		  mapTypeIds: [google.maps.MapTypeId.ROADMAP, google.maps.MapTypeId.HYBRID]
		}, // here´s the array of controls
		disableDefaultUI: true, // a way to quickly hide all controls
		mapTypeControl: false,
		scaleControl: false,
		zoomControl: false,
		zoomControlOptions: {
		  style: google.maps.ZoomControlStyle.LARGE 
		},
		mapTypeId	: google.maps.MapTypeId.ROADMAP
	};
	var styles = [
            {elementType: 'geometry', stylers: [{color: '#404d5c'}]},
            {elementType: 'labels.text.stroke', stylers: [{color: '#404d5c'}]},
            {elementType: 'labels.text.fill', stylers: [{color: '#ffffff'}]},
            {
              featureType: 'administrative.locality',
              elementType: 'labels.text.fill',
              stylers: [{color: '#ffffff'}]
            },
            {
              featureType: 'poi',
              elementType: 'labels.text.fill',
              stylers: [{color: '#ffffff'}]
            },
            {
              featureType: 'poi.park',
              elementType: 'geometry',
              stylers: [{color: '#263c3f'}]
            },
            {
              featureType: 'poi.park',
              elementType: 'labels.text.fill',
              stylers: [{color: '#6b9a76'}]
            },
            {
              featureType: 'road',
              elementType: 'geometry',
              stylers: [{color: '#38414e'}]
            },
            {
              featureType: 'road',
              elementType: 'geometry.stroke',
              stylers: [{color: '#212a37'}]
            },
            {
              featureType: 'road',
              elementType: 'labels.text.fill',
              stylers: [{color: '#9ca5b3'}]
            },
            {
              featureType: 'road.highway',
              elementType: 'geometry',
              stylers: [{color: '#138c96'}]
            },
            {
              featureType: 'road.highway',
              elementType: 'geometry.stroke',
              stylers: [{color: '#138c96'}]
            },
            {
              featureType: 'road.highway',
              elementType: 'labels.text.fill',
              stylers: [{color: '#f3d19c'}]
            },
            {
              featureType: 'transit',
              elementType: 'geometry',
              stylers: [{color: '#2f3948'}]
            },
            {
              featureType: 'transit.station',
              elementType: 'labels.text.fill',
              stylers: [{color: '#d59563'}]
            },
            {
              featureType: 'water',
              elementType: 'geometry',
              stylers: [{color: '#afdef9'}]
            },
            {
              featureType: 'water',
              elementType: 'labels.text.fill',
              stylers: [{color: '#515c6d'}]
            },
            {
              featureType: 'water',
              elementType: 'labels.text.stroke',
              stylers: [{color: '#afdef9'}]
            }

				]
	// create map	        	
	var map = new google.maps.Map( $el[0], args);
	map.setOptions({styles: styles});
 
	// add a markers reference
	map.markers = [];
 
	// add markers
	$markers.each(function(){
 
    	add_marker( $(this), map );
 
	});
 
	// center map
	center_map( map );
 
}
 
/*
*  add_marker
*
*  This function will add a marker to the selected Google Map
*
*  @type	function
*  @date	8/11/2013
*  @since	4.3.0
*
*  @param	$marker (jQuery element)
*  @param	map (Google Map object)
*  @return	n/a
*/

        var infowindow = new google.maps.InfoWindow({
            content: ''
        });
function add_marker( $marker, map ) {
 
	// var
	var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );
 
	// create marker
  var image_png =''+childThemeDir+'/img/marker.png';
  var image_svg =''+childThemeDir+'/img/marker.svg';
    var image = image_png;
    if (Modernizr.svg) {
        image = image_svg;
    }
	var marker = new google.maps.Marker({
		position	: latlng,
		map			: map,
      icon: image
	});
 
	// add to array
	map.markers.push( marker );
 
	// if marker contains HTML, add it to an infoWindow
	if( $marker.html() )
	{
		// create info window
		
		//var infowindow = new google.maps.InfoWindow({
		//	content		: $marker.html()
		//});
 
		// show info window when marker is clicked
		google.maps.event.addListener(marker, 'click', function() {
			//infowindow.open( map, marker );
			                infowindow.close();
                infowindow.setContent($marker.html());
                infowindow.open(map,marker);
 
		});
	}
}
 
/*
*  center_map
*
*  This function will center the map, showing all markers attached to this map
*
*  @type	function
*  @date	8/11/2013
*  @since	4.3.0
*
*  @param	map (Google Map object)
*  @return	n/a
*/
 
function center_map( map ) {
 
	// vars
	var bounds = new google.maps.LatLngBounds();
 
	// loop through all markers and create bounds
	$.each( map.markers, function( i, marker ){
 
		var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );
 
		bounds.extend( latlng );
 
	});
 
	// only 1 marker?
	if( map.markers.length == 1 )
	{
		// set center of map
	    map.setCenter( bounds.getCenter() );
	    map.setZoom( 12 );
	}
	else
	{
		// fit to bounds
		map.fitBounds( bounds );
		
zoomChangeBoundsListener = 
    google.maps.event.addListenerOnce(map, 'bounds_changed', function(event) {
        if (this.getZoom()){
            this.setZoom(6);
        }
});
setTimeout(function(){google.maps.event.removeListener(zoomChangeBoundsListener)}, 2000);
	}
 
}
 
/*
*  document ready
*
*  This function will render each map when the document is ready (page has loaded)
*
*  @type	function
*  @date	8/11/2013
*  @since	5.0.0
*
*  @param	n/a
*  @return	n/a
*/
 
$(document).ready(function(){
 
	$('.acf-map').each(function(){
 
		render_map( $(this) );
 
	});
 
});
 
})(jQuery);