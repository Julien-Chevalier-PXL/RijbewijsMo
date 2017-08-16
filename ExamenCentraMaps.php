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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <style>
        /* Always set the map height explicitly to define the size of the div
         * element that contains the map. */
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
<div id="map"></div>

<?php echo '<script>var examencentras = [' . implode(",", getExamenCentras($db)) . '];</script>'; ?>
<?php echo '<script>var examencentrasCached = [' . implode(",", getCachedExamenCentras($db)) . '];</script>'; ?>
<script>
    function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 8
        });

        var geocoder = new google.maps.Geocoder();
/*
        if (examencentras.length > examencentrasCached.length) {
            examencentras.forEach(function (t) {
                var contained = false;
                for(var ecIndex = 0; ecIndex < examencentrasCached.length; ecIndex++){
                    if(examencentrasCached[ecIndex][0]===t.id){
                        contained = true;
                        break;
                    }
                }
                if(contained===false){
                    geocodeAddress(t.address, geocoder, map);
                }
            });
        }*/
        setCachedLocationsMarkers(examencentrasCached, map);
        //getLocation(map);
    }

    function setCachedLocationsMarkers(examencentras, resultsMap){
        var iconBase = './Afbeeldingen/Logo/';
        var image = {
            url: iconBase + 'centra_logo.png',
            scaledSize: new google.maps.Size(20, 25)
        };

        for(var index = 0; index < examencentras.length; index++){
            centra = examencentras[index];
            //alert(centra.latitude + ", " + centra.longitude);
            var pos = {
                lat: parseFloat(centra.latitude),
                lng: parseFloat(centra.longitude)
            };
            var marker = new google.maps.Marker({
                map: resultsMap,
                position: pos,
                icon: image
            });
            resultsMap.setCenter(pos);
        }

    }

    function geocodeNonCachedExamencentras(examencentras, geocoder, resultsMap) {
        for (var index = 0; index < examencentras.length; index++) { // foreach werkt niet, don't know why
            var examencentra = examencentras[index];
            if (geocodeAddress(examencentra.adres, geocoder, resultsMap)) {
                setTimeout(function () {
                    index--;
                }, 1000);
            }
        }
    }

    function geocodeAddress(address, geocoder, resultsMap) {
        geocoder.geocode({'address': address}, function (results, status) {
            if (status === 'OK') {
                var marker = new google.maps.Marker({
                    map: resultsMap,
                    position: results[0].geometry.location
                });
            } else {
                alert('Address: ' + address +
                    '\nGeocode was not successful for the following reason: ' + status);
                setTimeout(geocodeAddress, 2000);
            }
        });
    }

    function getLocation(map) {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function (position) {
                var pos = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };
                var marker = new google.maps.Marker({
                    map: map,
                    position: pos
                });
                map.setCenter(pos);
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
</script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCTZea67jn4YSPIGu0dNTHRyB1jnvo1Q00&callback=initMap">
</script>
</body>