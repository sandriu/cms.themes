var geocoder = new google.maps.Geocoder();
var map;
var components = {};

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
        center = new google.maps.LatLng(point.lat, point.lng);
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

    if (typeof location.city != 'undefined' && location.city != null) {
        components.locality = location.city;
    }
    if (typeof location.iso2 != 'undefined' && location.iso2 != null) {
        components.country = location.iso2;

        //there is a bug in Google Geocoder for iso2 AO
        //https://code.google.com/p/gmaps-api-issues/issues/detail?can=2&start=0&num=100&q=&colspec=ID%20Type%20Status%20Introduced%20Fixed%20Summary%20Stars%20ApiType%20Internal&groupby=&sort=&id=5388
        if (location.iso2 == 'ao') {
            delete components.country;
        }
    }
    if (typeof components.country == 'undefined' && typeof location.country != 'undefined' && location.country != null) {
        components.country = location.country;
    }
    geocode_try(components);
}

function geocode_try(components) {
    geocoder.geocode( { 'componentRestrictions': components }, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
            map.setCenter(results[0].geometry.location);
            var marker = new google.maps.Marker({
                map: map,
                position: results[0].geometry.location
            });
        } else {
            //if cannot find the city
            if (typeof  components.locality != 'undefined') {
                delete components.locality;
                map.setZoom(6);
                geocode_try(components);
                //if cannot find the country
            } else {
                delete components.country;
                map.setZoom(1);
            }
        }
    });
}

if (typeof WURFL != 'undefined') {
    if (WURFL.is_mobile && jQuery(window).width() <= 800) {
        var google_maps_no_map_text = "Sorry, the map is not available on mobile devices.";
        if (typeof Drupal.settings.cms_front_end.google_maps_no_map_text != 'undefined') {
            google_maps_no_map_text = Drupal.settings.cms_front_end.google_maps_no_map_text;
        }
        jQuery('#gmap').html('asdasd').addClass('google_maps_no_map');
        jQuery('.gmap-help-text').hide();
    } else {
        google.maps.event.addDomListener(window, 'load', initialize);
    }
} else {
        google.maps.event.addDomListener(window, 'load', initialize);
}
