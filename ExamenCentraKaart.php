<?php

include 'DatabaseActions/DbConnect.php';
include 'DatabaseActions/ExamencentraRepository.php';

$db=getDb();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ExamenCentraKaartVL</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="manifest"href="manifest.json"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCTZea67jn4YSPIGu0dNTHRyB1jnvo1Q00&callback=getLocation"></script>

    <style>
        #floating-panel {
            position: relative;
            top: 10px;

            z-index: 5;
            background-color: #fff;
            padding: 5px;
            border: 1px solid #999;
            text-align: center;
            font-family: 'Roboto','sans-serif';
            line-height: 30px;

        }
    </style>
</head>
<body>
<nav class="w3-sidebar w3-black w3-animate-right w3-xxlarge" style="display:none;padding-top:150px;right:0;z-index:2" id="mySidebar">
    <a href="javascript:void(0)" onclick="closeNav()" class="w3-button w3-black w3-xxxlarge w3-display-topright" style="padding:0 12px;">
        <i class="fa fa-remove"></i>
    </a>
    <div class="w3-bar-block w3-center">
        <a href="#"><h4>Welkom</h4></a>
        <a href="DBConfig.php">ExamenCentrum</a>
        <a href="stackOverFlow.html" class="fa fa-map-marker fa-fw w3-xxlarge w3-margin-right">Maps</a>
        <br/>
        <div class="fb-share-button" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button_count" data-size="large" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse">Delen</a></div>

    </div>
</nav>

<div class="w3-main w3-padding-large" style="width: 100%"></div>

    <!-- Menu icon to open sidebar -->
    <span class="w3-button w3-top w3-white w3-xxlarge w3-text-grey w3-hover-text-black" style="width:auto;right:0;" onclick="openNav()"><i class="fa fa-bars"></i></span>
<div id="floating-panel">
    <b>Manier van reizen: </b>
    <select id="mode">
        <option value="DRIVING">Auto</option>
        <option value="WALKING">Lopen</option>
        <option value="BICYCLING">Fietsen</option>
        <option value="TRANSIT">Openbaar vervoer</option>
    </select>
</div>
<div id="googleMap" style="width:100%;height:800px;"></div>

<?php echo '<script>var examencentras = ['. implode(",", json_encode(getExamenCentras($db))) .'];</script>'; ?>
<script>
    var myLatLng;

    function geoSuccess(position) {
        var latitude = position.coords.latitude;
        var longitude = position.coords.longitude;
        var directionsService = new google.maps.DirectionsService;
        var directionsDisplay = new google.maps.DirectionsRenderer;
        myLatLng = {
            lat: latitude,
            lng: longitude
        };
        var mapProp = {
            zoom: 15,
            mapTypeId: 'roadmap'
        };
        var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);

        var directionsService = new google.maps.DirectionsService;
        var directionsDisplay = new google.maps.DirectionsRenderer;

        //call renderer to display directions
        directionsDisplay.setMap(map);

        var bounds = new google.maps.LatLngBounds();



        // Mzzeszez Markers
        var marker = new google.maps.Marker({
            position: myLatLng,
            map: map,
            title: 'My location'
        });
        var markers = [
            ['Examencentum Alken', 50.88838, 5.301410000000033],
            ['Examencentrum Roeselare', 50.9683971, 3.1201062000000093],

            ['Examencentrum Wevelgem', 50.845074, 3.181874999999991],
            ['Examencentrum Eeklo', 51.1818133, 3.536640900000066],

            ['Examencentrum Brakel', 50.7946699, 3.7587244000000055],
            ['Examencentrum Erembodegem', 50.9093854, 4.048784800000021],

            ['Examencentrum Asse', 50.914329, 4.209832600000027],
            ['Examencentrum Kontich', 51.1236601, 4.455394299999966],
            ['Examencentrum Oostende', 51.20850220000001, 2.9675234000000046],
            ['Examencentrum Sint-Denijs-Westrem', 51.0325072, 3.6894585000000006],
            ['Examencentrum Deurne', 51.2372524, 4.468929399999979],
            ['Huidige locatie', latitude, longitude]
        ];

        // Display
        var infoWindow = new google.maps.InfoWindow(),
            marker, i;


        for (i = 0; i < markers.length; i++) {
            var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
            bounds.extend(position);
            marker = new google.maps.Marker({
                position: position,
                map: map,
                title: markers[i][0]
            });

            // Elke markeerpunt heeft zijn eigen infoWindow
            google.maps.event.addListener(marker, 'click', (function(marker, i) {
                return function() {
                    infoWindow.setContent(infoWindowContent[i][0]);
                    infoWindow.open(map, marker);
                }
            })(marker, i));

            marker.addListener('click', function() {
                directionsService.route({
                    // origin: document.getElementById('start').value,
                    origin:myLatLng,
                    destination: {
                        lat: latit,
                        lng: longit
                    },
                    travelMode: 'DRIVING'
                }, function(response, status) {
                    if (status === 'OK') {
                        directionsDisplay.setDirections(response);
                    } else {
                        window.alert('Directions request failed due to ' + status);
                    }
                });
            });
            map.fitBounds(bounds);
        }
    }

    function calculateAndDisplayRoute(directionsService, directionsDisplay) {
       directionsService.route({
            origin: document.getElementById('start').value,
           origin: myLatLng,
          destination: marker.getPosition(),
           travelMode: google.maps.TravelMode[selectedMode]
       }, function(response, status) {
        if (status === 'OK') {
              console.log('helemaal ok');
              directionsDisplay.setDirections(response);
          } else {
              window.alert('Locatie werkt niet mee omdat ' + status);
           }
        });
     }

    function geoError() {
        alert("Geocoder failed.");
    }

    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(geoSuccess, geoError);
            // alert("Geolocation is supported by this browser.");
        } else {
            alert("Geolocatie werkt niet met deze browser.");
        }
    }
</script>

<script>
    // Open and close sidebar
    function openNav() {
        document.getElementById("mySidebar").style.width = "60%";
        document.getElementById("mySidebar").style.display = "block";
    }

    function closeNav() {
        document.getElementById("mySidebar").style.display = "none";
    }
</script>

</body>
</html>