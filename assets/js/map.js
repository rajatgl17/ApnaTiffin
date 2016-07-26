$(function() {

	// GOOGLE MAP
	$("#map-block").height($("#map-wrapper").height());	// Set Map Height
	function initialize($) {
		var mapOptions = {	
			zoom: 17,
			center: new google.maps.LatLng(26.8235808,75.8630365),
			disableDefaultUI: true
		};
		var map = new google.maps.Map(document.getElementById('map-block'), mapOptions);
	}
	google.maps.event.addDomListener(window, 'load', initialize);

});	