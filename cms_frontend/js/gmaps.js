var geocoder = new google.maps.Geocoder();
var map;

function initialize() {
    var marker = Drupal.settings.gmap.marker;
    var address = {};
    var center = new google.maps.LatLng(-34.397, 150.644);
    var zoom = 2;
    if (marker.lat == null) {
        if (typeof marker.country != 'undefined') {
            address.country = marker.country;
            zoom = 6;
        }
        if (typeof marker.iso2 != 'undefined') {
            address.iso2 = marker.iso2;
            zoom = 6;
        }
        if (typeof marker.city != 'undefined') {
            address.city = marker.city;
            zoom = 12;
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

function codeAddress(location) {
    if (location.length == 0) {
        map.setZoom(1);
    }
    components = {};
    if (typeof location.city != 'undefined') {
        components.locality = location.city;
    }
    if (typeof location.iso2 != 'undefined') {
        components.country = location.iso2;
    } else if (typeof location.country != 'undefined') {
        components.country = location.country;
    }

    geocoder.geocode( { 'componentRestrictions': components }, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
            map.setCenter(results[0].geometry.location);
            var marker = new google.maps.Marker({
                map: map,
                position: results[0].geometry.location
            });
        } else {
            map.setZoom(1);
        }
    });
}
google.maps.event.addDomListener(window, 'load', initialize);