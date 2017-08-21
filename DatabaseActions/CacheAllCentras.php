<?php
require 'DbConnect.php';
require 'ExamencentraRepository.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ExamenCentraKaartVL</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="manifest" href="../manifest.json"/>
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
<button id="btnFinish">Send locations to cache</button>

<?php echo '<script>var examencentras = [' . implode(",", getExamenCentrasOrderById(getDb())) . '];</script>'; ?>
<script>
    var index = 0;
    var centraPos = [];
    var aantalGelukt;

    $(document).ready(function () {
        $("#btnFinish").on('click', postInsert);
    });

    function postInsert() {
        $.ajax({
            type: 'post',
            cache: false,
            url: './InsertCentraToCache.php',
            data: {centrasPos: centraPos},
            success: function (response) {
                alert("Succes !");
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            }
        });
    }

    function initMap() {
        var geocoder = new google.maps.Geocoder();
        aantalGelukt = 0;
        geocodeAllExamencentras(examencentras, geocoder);
    }

    function geocodeAllExamencentras(examencentras, geocoder) {
        for (index = 0; index < examencentras.length; index++) { // foreach werkt niet, don't know why
                var examencentra = examencentras[index];
                geocodeAddress(examencentra.adres, examencentra.id, geocoder);
        }
    }

    function geocodeAddress(address, centraId, geocoder) {
        geocoder.geocode({'address': address}, function (results, status) {
            if (status === 'OK') {
                var position = results[0].geometry.location;
                centraPos.push([centraId, position.lat(), position.lng()]);
                aantalGelukt++;
            } else {
                //alert('Address: ' + address +
                //  '\nGeocode was not successful for the following reason: ' + status);

            }
        });
    }
</script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB9n3H9tgUsEx7pKwLKTJYhzRirAkcBN6Y&callback=initMap">
</script>
</body>
