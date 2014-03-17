var geocoder = new google.maps.Geocoder();
var map;

function initialize() {
    var point = Drupal.settings.gmap.marker;
    var address = {};
    var center = null;
    var zoom = 1;

    if (point.lat == null || point.lng == null) {
        if (typeof point.country != 'undefined') {
            address.country = point.country;
            zoom = 6;
        }
        if (typeof point.iso2 != 'undefined') {
            address.iso2 = point.iso2;
            zoom = 6;
        }
        if (typeof point.city != 'undefined') {
            address.city = point.city;
            zoom = 12;
        }
    } else {
        center = new google.maps.LatLng(point.lng, point.lat);
        zoom = 15;
    }

    var mapOptions = {
        zoom: zoom
    };
    map = new google.maps.Map(document.getElementById("gmap"),
        mapOptions);

    if (!jQuery.isEmptyObject(address)) {
        codeAddress(address);
    } else {
        map.setCenter(center);
        var marker = new google.maps.Marker({
            map: map,
            position: center
        });
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