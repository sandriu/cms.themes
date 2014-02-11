var geocoder = new google.maps.Geocoder();
var map;

function initialize() {
    var marker = Drupal.settings.gmap.marker;
    var address = null;
    var center = new google.maps.LatLng(-34.397, 150.644);
    var zoom = 5;
    if (marker.lat == null) {
        if (marker.city == null) {
            address = marker.country;
        } else {
            address = marker.city;
            zoom = 12
        }
    } else {
        center.d = marker.lat;
        center.e = marker.lng;
        zoom = 15;
    }
    var mapOptions = {
        center: center,
        zoom: zoom
    };
    map = new google.maps.Map(document.getElementById("gmap"),
        mapOptions);
    if (address != null) {
        codeAddress(address);
    }
}

function codeAddress(address) {
    geocoder.geocode( { 'address': address}, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
            map.setCenter(results[0].geometry.location);
            var marker = new google.maps.Marker({
                map: map,
                position: results[0].geometry.location
            });
        } else {
            alert('Geocode was not successful for the following reason: ' + status);
        }
    });
}
google.maps.event.addDomListener(window, 'load', initialize);