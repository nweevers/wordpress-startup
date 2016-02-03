var FW = FW || {};

FW.googlemaps = ( function( window, undefined ) {
	var $maps,
		$markers,
		map,
		marker = [],
		infoWindow;

	function initialize() {
		var mapOptions = {
			zoom: 8,
			center: new google.maps.LatLng(52.132633, 5.2912659999999505),
			mapTypeId: google.maps.MapTypeId.ROADMAP,
			scrollwheel: false
		};
		map = new google.maps.Map($maps, mapOptions);

		//setStyles();
		setMarkers();
	}

	/**
	 * Set Map Styles
	 */
	function setStyles() {
		var style_map = [{"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"color":"#444444"}]},{"featureType":"landscape","elementType":"all","stylers":[{"color":"#f2f2f2"}]},{"featureType":"landscape","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"hue":"#ff0000"}]},{"featureType":"landscape.man_made","elementType":"geometry","stylers":[{"lightness":"100"}]},{"featureType":"landscape.man_made","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"landscape.natural","elementType":"geometry.fill","stylers":[{"lightness":"100"}]},{"featureType":"landscape.natural","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"landscape.natural.landcover","elementType":"geometry.fill","stylers":[{"visibility":"on"}]},{"featureType":"landscape.natural.terrain","elementType":"geometry","stylers":[{"lightness":"100"}]},{"featureType":"landscape.natural.terrain","elementType":"geometry.fill","stylers":[{"visibility":"off"},{"lightness":"23"}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"all","stylers":[{"saturation":-100},{"lightness":45}]},{"featureType":"road.highway","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffd900"}]},{"featureType":"road.arterial","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"all","stylers":[{"color":"#ffd900"},{"visibility":"on"}]},{"featureType":"water","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#cccccc"}]},{"featureType":"water","elementType":"labels","stylers":[{"visibility":"off"}]}],
			//Then we use this data to create the styles.
			styled_map = new google.maps.StyledMapType(style_map, {name: "Map style"});
		map.mapTypes.set('map_styles', styled_map);
		map.setMapTypeId('map_styles');
	}

	/**
	 * Set Markers
	 */
	function setMarkers() {
		$markers.each(function(i,el) {
			var $el = $(el),
				latlng = $el.data('latlng').split(',');

			marker[i] = new google.maps.Marker({
				position: new google.maps.LatLng(parseFloat( latlng[0] ), parseFloat( latlng[1] ) ),
				/* icon: {
					url: FW.Config.submap + 'resources/img/marker.png',
					size: new google.maps.Size( 33, 40 ),
					origin: new google.maps.Point( 0, 0 ),
					anchor: new google.maps.Point( 16, 40 )
				}, */
				map: map
			});

			setInfoWindow( $el.html(), marker[i] );
		});

		fitMarkers();
	}

	/**
	 * Set Info Window
	 */
	function setInfoWindow( content, marker ) {
		google.maps.event.addListener(marker, 'click', function() {
			if( infoWindow ) { infoWindow.close(); }

			infoWindow = new google.maps.InfoWindow({
				content: content
			});

			infoWindow.open(map,marker);
		});
	}


	/**
	 * Fit map to markers
	 */
	function fitMarkers() {
		var bounds = new google.maps.LatLngBounds();

		for( var m in marker ) {
			// in IE7 & IE8 is the last index of the array a function (for some kind of reason). Skip this
			if( typeof marker[m] == 'object' ) {
				if( marker[m].visible !== false ) {
					bounds.extend( marker[m].position );
				}
			}
		}

		map.fitBounds( bounds );

		if( marker.length === 1 ) {
			setTimeout( function() {
				map.setCenter( marker[0].position );
				map.setZoom( 10 );
			}, 1000);
		}
	}


	function init( maps, markers ) {
		$maps = maps;
		$markers = markers;

		initialize();
	}

	return {
		init: init
	};
})( window );
