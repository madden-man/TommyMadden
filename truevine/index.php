<?php
/**
 * Created by PhpStorm.
 * User: Tommy
 * Date: 9/11/2017
 * Time: 1:21 PM
 */

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
    <title>True Vine: Connect to the Vine Near You!</title>
    <?php include("default_links.php") ?>
</head>
<body>

<?php include("top_bar.php"); ?>


<div id="map">

</div>
<button id="refresh_churches" onclick="refreshMap()">Refresh!</button>


<script>
    var map;
    var service;
    function initMap() {

        var mydojo = {
   //         lat: 38.6522,
   //         lng: -104.8922
            lat: 33.796605,
            lng: -117.854659
        };

        map = new google.maps.Map(document.getElementById('map'), {
            center: mydojo,
            zoom: 13,
            mapTypeId: 'roadmap'
        });

        infowindow = new google.maps.InfoWindow();
        service = new google.maps.places.PlacesService(map);
        service.nearbySearch({
            location: mydojo,
            radius: 2500,
            type: ['church']
        }, callback);
    }

    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        }
    }
    function showPosition(position) {
        var loc = new google.maps.LatLng(
            position.coords.latitude,
            position.coords.longitude
        );

        map.setCenter(loc);

        service.nearbySearch({
            location: loc,
            radius: 2500,
            type: ['church']
        }, callback);
    }

    getLocation();


  //Doesn't work without HTML5 Geolocation
  //No Geolocation Without HTTPS Service


    function refreshMap() {
        var currentLoc = map.center;

        service.nearbySearch({
            location: currentLoc,
            radius: 2500,
            type: ['church']
        }, callback)
    }

    function callback(results, status) {
        if (status === google.maps.places.PlacesServiceStatus.OK) {
            for (var i = 0; i < results.length; i++) {
                createMarker(results[i]);
            }
        }
    }

    function createMarker(place) {
        var placeLoc = place.geometry.location;
        var marker = new google.maps.Marker({
            map: map,
            position: placeLoc,
            icon: 'https://tommymadden.com/truevine/img/ico_church.png'
        });

        google.maps.event.addListener(marker, 'click', function() {
            infowindow.setContent(place.name    11);
            infowindow.open(map, this);
        });
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB3DAgxYzNmMiv2MQftQaHofVIi2TYZG6o&callback=initMap&libraries=places"
        async defer>
</script>

</body>
</html>
