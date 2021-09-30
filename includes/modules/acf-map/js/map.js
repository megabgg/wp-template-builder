function initMap($el) {

    var $markers = $el.querySelectorAll('.marker');
    var mapArgs = {
        zoom: $el.zoom || 16,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        styles: [{"featureType":"administrative","elementType":"all","stylers":[{"hue":"#000000"},{"lightness":-100},{"visibility":"off"}]},{"featureType":"administrative.locality","elementType":"all","stylers":[{"visibility":"on"},{"saturation":"-3"},{"gamma":"1.81"},{"weight":"0.01"},{"hue":"#ff0000"},{"lightness":"17"}]},{"featureType":"administrative.land_parcel","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"hue":"#dddddd"},{"saturation":-100},{"lightness":-3},{"visibility":"on"}]},{"featureType":"landscape","elementType":"labels","stylers":[{"hue":"#000000"},{"saturation":-100},{"lightness":-100},{"visibility":"off"}]},{"featureType":"poi","elementType":"all","stylers":[{"hue":"#000000"},{"saturation":-100},{"lightness":-100},{"visibility":"off"}]},{"featureType":"road","elementType":"geometry","stylers":[{"hue":"#bbbbbb"},{"saturation":-100},{"lightness":26},{"visibility":"on"}]},{"featureType":"road","elementType":"labels","stylers":[{"hue":"#ffffff"},{"saturation":-100},{"lightness":100},{"visibility":"off"}]},{"featureType":"road.arterial","elementType":"labels.text","stylers":[{"visibility":"on"},{"color":"#797979"}]},{"featureType":"road.arterial","elementType":"labels.text.fill","stylers":[{"color":"#868686"}]},{"featureType":"road.arterial","elementType":"labels.text.stroke","stylers":[{"color":"#ffffff"}]},{"featureType":"road.local","elementType":"all","stylers":[{"hue":"#ff0000"},{"saturation":-100},{"lightness":100},{"visibility":"on"}]},{"featureType":"road.local","elementType":"labels.text","stylers":[{"visibility":"on"}]},{"featureType":"road.local","elementType":"labels.text.fill","stylers":[{"color":"#b6b2b2"}]},{"featureType":"transit","elementType":"labels","stylers":[{"hue":"#ff0000"},{"lightness":-100},{"visibility":"off"}]},{"featureType":"water","elementType":"geometry","stylers":[{"hue":"#ff0000"},{"saturation":-100},{"lightness":100},{"visibility":"on"}]},{"featureType":"water","elementType":"labels","stylers":[{"hue":"#000000"},{"saturation":-100},{"lightness":-100},{"visibility":"off"}]}]
    };
    var map = new google.maps.Map($el, mapArgs);
    map.markers = [];
    $markers.forEach(function (x) {
        initMarker(x, map);
    });
    centerMap(map);

    return map;
}


function initMarker($marker, map) {

    var lat = $marker.getAttribute('data-lat');
    var lng = $marker.getAttribute('data-lng');
    var latLng = {
        lat: parseFloat(lat),
        lng: parseFloat(lng)
    };

    var marker = new google.maps.Marker({
        position: latLng,
        map: map
    });

    map.markers.push(marker);

    if ($marker.innerHTML) {
        var infowindow = new google.maps.InfoWindow({
            content: $marker.html()
        });

        google.maps.event.addListener(marker, 'click', function () {
            infowindow.open(map, marker);
        });
    }
}


function centerMap(map) {

    var bounds = new google.maps.LatLngBounds();
    map.markers.forEach(function (marker) {
        bounds.extend({
            lat: marker.position.lat(),
            lng: marker.position.lng()
        });
    });

    if (map.markers.length == 1) {
        map.setCenter(bounds.getCenter());

    } else {
        map.fitBounds(bounds);
    }
}

document.addEventListener("DOMContentLoaded", function (event) {
    document.querySelectorAll('.acf-map').forEach(function (x) {
        var map = initMap(x);
    });
});