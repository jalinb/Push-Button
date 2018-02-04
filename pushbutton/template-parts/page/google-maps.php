<?php
/**
 * Template part for displaying Google Maps
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>

<!-- Google Maps API -->
<script>
  function initMap() {
    var pb = {lat: 28.541894, lng: -81.378767};
    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 15,
      center: pb,
      zoomControl: true,
      mapTypeControl: false,
      streetViewControl: false,
      scrollwheel: false,
      styles: [{"featureType": "administrative", "elementType": "labels.text.fill", "stylers": [{"color": "#444444"} ] }, {"featureType": "administrative.locality", "elementType": "labels.text.fill", "stylers": [{"color": "#b52103"} ] }, {"featureType": "administrative.neighborhood", "elementType": "labels.text.fill", "stylers": [{"color": "#b52103"} ] }, {"featureType": "landscape", "elementType": "all", "stylers": [{"color": "#f2f2f2"} ] }, {"featureType": "poi", "elementType": "all", "stylers": [{"visibility": "off"} ] }, {"featureType": "road", "elementType": "all", "stylers": [{"saturation": -100 }, {"lightness": 45 } ] }, {"featureType": "road", "elementType": "geometry.fill", "stylers": [{"color": "#d2d3d5"} ] }, {"featureType": "road", "elementType": "labels.text.fill", "stylers": [{"color": "#231f20"} ] }, {"featureType": "road.highway", "elementType": "all", "stylers": [{"visibility": "simplified"} ] }, {"featureType": "road.highway", "elementType": "geometry.fill", "stylers": [{"color": "#b3b3b3"} ] }, {"featureType": "road.arterial", "elementType": "labels.icon", "stylers": [{"visibility": "off"} ] }, {"featureType": "transit", "elementType": "all", "stylers": [{"visibility": "off"} ] }, {"featureType": "water", "elementType": "all", "stylers": [{"color": "#5dbed9"}, {"visibility": "on"} ] } ] });

    var contentString = '<div id="map-content">'+
        '<div id="siteNotice">'+
        '</div>'+
        '<h1 class="map-title">Push Button Productions</h1>'+
        '<div id="bodyContent">'+
        '<div class="row">'+
        '<div class="col-xs-12 col-lg-8">'+
        '<address>'+
        '<i aria-hidden="true" class="fa fa-map-marker fa-2"></i>&nbsp;&nbsp;&nbsp;1 South Orange Ave<br />'+
        '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Suite 306<br />'+
        '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Orlando, FL 32801'+
        '</address>'+
        '<p><i aria-hidden="true" class="fa fa-phone fa-2"></i>&nbsp;&nbsp;&nbsp;&nbsp;888-494-PUSH (7874)<br />'+
        '<i aria-hidden="true" class="fa fa-fax fa-2"></i>&nbsp;&nbsp;&nbsp;407-803-5395<br />'+
        '<i class="fa fa-envelope fa-2" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;<a href="mailto:info@pushbuttonproductions.com">info@pushbuttonproductions.com</a></p>'+
        '</div>'+
        '<div class="col-xs-4">'+
        '<img src="http://pushbuttonproductions.com/wp-content/themes/pushbutton/assets/images/bobble-heads-sm.jpg" alt="Push Button" />'+
        '</div>'+
        '</div>'+
        '</div>'+
        '</div>';

    var infowindow = new google.maps.InfoWindow({
      content: contentString,
      maxWidth: 1000
    });

    var marker = new google.maps.Marker({
      position: pb,
      map: map,
      title: 'Push Button Productions',
    });
    if ( window.innerWidth >= 767 ) {
        google.maps.event.addListenerOnce(map, 'idle', function() {
          infowindow.open(map, marker);
        });
    }
    marker.addListener('click', function() {
      infowindow.open(map, marker);
    });
  }
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB7--574xRXKipV_V5cGt6b_-slE1EWyqI&callback=initMap"></script>