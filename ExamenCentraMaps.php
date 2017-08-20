<?php

include 'DatabaseActions/DbConnect.php';
include 'DatabaseActions/ExamencentraRepository.php';
include 'DatabaseActions/CentraLocationsCacheRepository.php';

$db = getDb();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ExamenCentraKaartVL</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="manifest" href="manifest.json"/>
    <!-- Bootstrap -->
    <link href="Bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="Bootstrap/js/bootstrap.min.js"></script>
    <style>
        /* Always set the myMap height explicitly to define the size of the div
         * element that contains the myMap. */
        #map {
            height: 75%;
            width: 75%;
        }

        /* Optional: Makes the sample page fill the window. */
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
    </style>
</head>
<body>
<!-- region navbar-->
<?php include 'navbar.html' ?>
<script>
    $(document).ready(function () {
        $("#Mapsli").addClass("active");
    });
</script>
<!-- endregion navbar-->
<div id="map"></div>
<table id="examencentrasTable" class="table table-stripped">
    <thead>
    <th>Distance</th>
    <th>Adres</th>
    <th>Postcode</th>
    <th>Plaats</th>
    <th>Tel</th>
    <th>Openingsuren</th>
    </thead>
    <tbody>

    </tbody>
</table>
<?php echo '<script>var examencentras = [' . implode(",", getExamenCentras($db)) . '];</script>'; ?>
<?php echo '<script>var examencentrasCached = [' . implode(",", getCachedExamenCentras($db)) . '];</script>'; ?>
<script>
    $(document).ready(function () {

    });

    var gelukt = 0;
    var myMap;
    var table;
    var userLocation;
    var distanceMatrix;

    function initMap() {
        table = document.getElementById("examencentrasTable");

        myMap = new google.maps.Map(document.getElementById('map'), {
            zoom: 8
        });

        var geocoder = new google.maps.Geocoder();
         distanceMatrix = new google.maps.DistanceMatrixService;

        if (examencentras.length > examencentrasCached.length) {
            geocodeNonCachedExamencentras(examencentras, geocoder, myMap);
        }

        getLocation(myMap, function () {
            fillTable(examencentrasCached);
        });
        setCachedLocationsMarkers(examencentrasCached, myMap);

    }

    function setCachedLocationsMarkers(examencentras, resultsMap) {
        for (var index = 0; index < examencentras.length; index++) {
            centra = examencentras[index];
            setMarker(centra);
        }
    }

    function geocodeNonCachedExamencentras(examencentras, geocoder, resultsMap) {
        for (var index = 0; index < examencentras.length; index++) { // foreach werkt niet, don't know why
            var examencentra = examencentras[index];
            geocodeAddress(examencentra, geocoder, resultsMap);
        }
    }

    function geocodeAddress(examencentra, geocoder, resultsMap) {
        var completeAddress = examencentra.adres + ", " + examencentra.postcode;
        geocoder.geocode({'address': completeAddress}, function (results, status) {
            if (status === 'OK') {
                gelukt++;
                examencentra["location"] = results[0].geometry.location;
                cacheNewLocation(examencentra, results[0].geometry.location);
                setMarker(examencentra);
            } else if (status === google.maps.GeocoderStatus.OVER_QUERY_LIMIT) {
                setTimeout(function () {
                    geocodeAddress(examencentra, geocoder, resultsMap);
                }, 500);
            } else {
                alert("Status: " + status);
            }
        });
    }

    function cacheNewLocation(examencentra, location) {
        var centraPos = [
            examencentra.id,
            location.lat(),
            location.lng()
        ];
        $.ajax({
            type: 'post',
            cache: false,
            url: './DatabaseActions/InsertCentraToCache.php',
            data: {centraPos: centraPos},
            success: function (response) {
                console.log("Location has been succesfully cached !");
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            }
        });
    }

    function setMarker(centra) {
        var iconBase = './Afbeeldingen/Logo/';
        var image = {
            url: iconBase + 'centra_logo.png',
            scaledSize: new google.maps.Size(20, 25)
        };

        var contentString = '<div id="content">' +
            '<div id="siteNotice">' +
            '</div>' +
            '<h1 id="firstHeading" class="firstHeading">Examen centrum ' + centra.plaats + '</h1>' +
            '<div id="bodyContent">' +
            '<p>' + centra.adres + ' - ' + centra.postcode + ' ' + centra.plaats + ' </p>' +
            '<p>Telefoon: ' + centra.tel + '</p>' +
            '<p>Site: <a href="' + centra.openingsuren + '">' + centra.openingsuren + '</a></p>' +
            '</div>' +
            '</div>';

        var infowindow = new google.maps.InfoWindow({
            content: contentString
        });

        var pos = centra.location;
        if (typeof pos === "undefined") {
            pos = {
                lat: parseFloat(centra.latitude),
                lng: parseFloat(centra.longitude)
            };
        }

        var marker = new google.maps.Marker({
            map: myMap,
            position: pos,
            icon: image
        });
        google.maps.event.addListener(marker, 'click', (function (marker, contentString, infowindow) {
            return function () {
                infowindow.setContent(contentString);
                infowindow.open(myMap, marker);
            };
        })(marker, contentString, infowindow));
    }

    function fillTable(centras) {
        calculateDistance(centras, function (response) {
            for(var i = 0; i < response.elements.length; i++){
                console.log(response.elements[i].distance.text);
                fillRow(centras[i], response.elements[i].distance.text);
            }
        });
    }

    function fillRow(centra, distance){
        var row = table.insertRow(-1);
        var distanceCell = row.insertCell(-1);
        distanceCell.innerHTML = distance;
        var adresCell = row.insertCell(-1);
        adresCell.innerHTML = centra.adres;
        var postcodeCell = row.insertCell(-1);
        postcodeCell.innerHTML = centra.postcode;
        var plaatsCell = row.insertCell(-1);
        plaatsCell.innerHTML = centra.plaats;
        var telCell = row.insertCell(-1);
        telCell.innerHTML = centra.tel;
        var openingCell = row.insertCell(-1);
        openingCell.innerHTML = '<a href="' + centra.openingsuren + '">' + centra.openingsuren + '</a>';
    }

    function calculateDistance(centras, callback) {
        var origin = new google.maps.LatLng(userLocation.lat,userLocation.lng);
        var myDestinations = [];
        for(var i = 0; i < centras.length; i++){
            myDestinations.push(new google.maps.LatLng(parseFloat(centras[i].latitude),parseFloat(centras[i].longitude)));
        }
        distanceMatrix.getDistanceMatrix({
                origins: [origin],
                destinations: myDestinations,
                travelMode: 'DRIVING',
                unitSystem: google.maps.UnitSystem.METRIC,
                avoidHighways: false,
                avoidTolls: false
            }, function (response, status) {
                if (status !== 'OK') {
                    console.log('Error with distance matrix: ' + status);
                } else {
                     callback(response.rows[0]);
                }
            }
        );
    }

    // region user's location

    function getLocation(map, callback) {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function (position) {
                var pos = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };
                userLocation = pos;
                var marker = new google.maps.Marker({
                    map: map,
                    position: pos
                });
                map.setCenter(pos);
                callback();
            }, function () {
                handleLocationError(true, infoWindow, map.getCenter());
            });
        } else {
            // Browser doesn't support Geolocation
            handleLocationError(false, infoWindow, map.getCenter());
        }
    }

    function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
            'Error: The Geolocation service failed.' :
            'Error: Your browser doesn\'t support geolocation.');
    }

    // endregion
</script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCTZea67jn4YSPIGu0dNTHRyB1jnvo1Q00&callback=initMap">
</script>
</body>