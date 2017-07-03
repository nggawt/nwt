/*
var apiKey = 'AIzaSyA2-cEmBLlnqRotetv6VSrGn8vbT-OWm5Q';
var maps = function(pos){
	var lat = pos.coords.latitude,
		long = pos.coords.longitude,
		coords = lat + ',' + long;

		//var api = ''
		document.getElementById('google_maps').setAttribute('src', 'https://maps.google.co.uk?q =' + coords + '&z=60&output=embed');
		console.log(coords);
}
var geo = document.getElementById('getLocation').onclick = function(){
	// navigator.geolocation.getCorrentPosition(maps);
	navigator.geolocation.getCurrentPosition(maps);
	return false;
}*/

function maxMin(arrElem,maxMin) {
	if(maxMin === 'min'){

		var min = arrElem.reduce(function(a, b) {
			    return Math.min(a,b);
		});
		return min;
	}
	if(maxMin === 'max'){

		var max = arrElem.reduce(function(a, b) {
			    return Math.max(a,b);
		});
		return max;
	}
}
function errores(pos){
	console.log(pos.message);
	elem = document.getElementById('map');
	elem.innerHTML = "<h1>" + pos.message + "</h1>";
}

function geoMap(){

	var elem = document.getElementById('map');
	
	if(navigator.geolocation){
		var geocoder = new google.maps.Geocoder(),
			infowindow = new google.maps.InfoWindow;

		navigator.geolocation.getCurrentPosition(function(pos){
			var lati = pos.coords.latitude,
				long = pos.coords.longitude;

			var center = {lat: lati, lng: long};
			var map = new google.maps.Map(elem, {
				center: center,
				scrollwheel: true,
		  		zoom: 14
			});
			// console.log(lati + " ," + long);
			// var marker = new google.maps.Marker({
		 //      position: center,
		 //      map: map
		 //    });
		 	
		 	//var drawer = drawer();
		 	var drawer = new google.maps.drawing.DrawingManager({
		 		drawingMode: google.maps.drawing.OverlayType.MARKER,
		 		drawingControl: true,
		 		drawingControlOptions: {
		 		position: google.maps.ControlPosition.TOP_CENTER,
		 		drawingModes: ['marker', 'circle', 'polygon', 'polyline', 'rectangle']
		 		},
		 		markerOptions: {icon: 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png'},
		 		circleOptions: {
		 		fillColor: '#ffff00',
		 		fillOpacity: 1,
		 		strokeWeight: 5,
		 		clickable: false,
		 		editable: true,
		 		zIndex: 1
		 		}
		 	});
		 	drawer.setMap(map);
		 	
		 	google.maps.event.addListener(drawer, 'overlaycomplete', function(event) {
		 	  	
		 	    //var radius = event.overlay.getRadius();
		 	    //showNewRect(event,drawer,map);
		 	    //console.log(ne);
		 	    //var max;
		 	    if(event.type === 'polygon' || event.type === 'polyline'){
		 	    	var lenArray = [],bigLen = [],lngArray = [],bigLng;
		 	    	var obj = event.overlay.getPath().getArray();
			 	    for(var ii = 0;ii < obj.length -1;ii++){

		 	    		lenArray.push(obj[ii].lat());
		 	    		lngArray.push(obj[ii].lng());
			 		}
			 		var maxLen = maxMin(lenArray,'max');
			 		var minLen = maxMin(lenArray,'min');
			 		var maxLng = maxMin(lngArray,'max');
			 		var minLng = maxMin(lngArray,'min');
			 		console.log("len: " + lenArray);
			 		console.log("lng: " +lngArray);
			 		console.log('max len : ' + maxLen + " min len: " + minLen);
			 		console.log('max lng : ' + maxLng + " min lng: " + minLng);
			 		var uluru = {lat: (maxLen + minLen) /2, lng: (maxLng + minLng) /2};
			 		geocodeLatLng(geocoder,map,infowindow,uluru);
			 		// var marker = new google.maps.Marker({
	 		  //         position: uluru,
	 		  //         map: map
	 		  //       });
		 		}
		 		if(event.type === 'rectangle'){
		 			var bounds = event.overlay.getBounds();
		 			var start = bounds.getNorthEast();
		 			var end = bounds.getSouthWest();
		 			var center = bounds.getCenter();
		 			// console.log('start pos: ' + start.lat() + " " + start.lng());
		 			// console.log('center pos: ' + center.lat() + " " + center.lng());
		 			// console.log('end pos: ' + end.lat() + " " + end.lng());
		 		}
		 		if(event.type === 'circle'){
		 			
		 		}
		 	  
		 	});

		 	function showNewRect(event,drawer,map) {
		 		//var coord = drawer.getPath();
		 		//var path = overlay.getPath();
		 		
	 	        // var ne = drawer.getBounds().getNorthEast();
	 	        // var sw = drawer.getBounds().getSouthWest();

	 	        // var contentString = '<b>Rectangle moved.</b><br>' +
	 	        //     'New north-east corner: ' + ne.lat() + ', ' + ne.lng() + '<br>' +
	 	        //     'New south-west corner: ' + sw.lat() + ', ' + sw.lng();

	 	        // // Set the info window's content and position.
	 	        // infoWindow.setContent(contentString);
	 	        // infoWindow.setPosition(ne);

	 	        // infoWindow.open(map);
 	      }
		},errores);

	}else{
		elem.innerHTML = "<h1> your brawser dosnt support geolocation</h1>";
	}
}
function geocodeLatLng(geocoder, map, infowindow,center) {
	// var input = document.getElementById('latlng').value;
	// var latlngStr = input.split(',', 2);
	// var latlng = {lat: parseFloat(latlngStr[0]), lng: parseFloat(latlngStr[1])};
	
	geocoder.geocode({'location': center}, function(results, status) {
	  if (status === 'OK') {
	    if (results[1]) {
	      map.setZoom(14);
	      
	      var marker = new google.maps.Marker({
	        position: center,
	        map: map
	      });
	      infowindow.setContent(results[1].formatted_address);
	      infowindow.open(map, marker);
	      var service = new google.maps.places.PlacesService(map);
	        service.nearbySearch({
	          location: center,
	          keyword: ['פיצה'],
	          type: ['פיצה'],
	          rankBy: google.maps.places.RankBy.DISTANCE
	        }, callback);
	        function callback(place, status) {
	        	if (status === google.maps.places.PlacesServiceStatus.OK) {
	        	  for (var i = 0; i < place.length; i++) {
	        	  	// d= distance(center,place[i].latlng)
	        	   //  console.log(d);
	        	    // if(d<rd){
                		createMarker(place[i]);
	                	// listResults(places[i]);
	                // }
	        	  }
	        	}
	        }
	        function distance(p1, p2) {
	         if (!p1 || !p2) 
	          return 0;
	         var R = 6371000; // Radius of the Earth in m
	         var dLat = (p2.lat() - p1.lat()) * Math.PI / 180;
	         var dLon = (p2.lng() - p1.lng()) * Math.PI / 180;
	         var a = Math.sin(dLat / 2) * Math.sin(dLat / 2) +
	         Math.cos(p1.lat() * Math.PI / 180) * Math.cos(p2.lat() * Math.PI / 180) *
	         Math.sin(dLon / 2) * Math.sin(dLon / 2);
	         var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
	         var d = R * c;
	         return d;
	         }
	        function createMarker(place) {
	            var placeLoc = place.geometry.location;
	        	var marker = new google.maps.Marker({
	          		map: map,
	          		position: place.geometry.location
	        	});
	        }
	    } else {
	      window.alert('No results found');
	    }
	  } else {
	    window.alert('Geocoder failed due to: ' + status);
	  }
	});
}
function drawer() {
	
}

        
// $.getJSON('//freegeoip.net/json/?80.246.138.88', function(data) {
//   //console.log(JSON.stringify(data, null, 2));
// });