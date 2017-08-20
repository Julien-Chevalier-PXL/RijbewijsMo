<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Keuze verkeersborden</title>
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
        body, h1, h2, h3, h4, h5, h6 {
            font-family: "Montserrat", sans-serif
        }

        .w3-row-padding img {
            margin-bottom: 12px
        }

        #keuze {
            text-align: center;
        }

        input {
            height: 120px;
            width: 200px;

        }

        button {
            font-size: 18pt;
            font-weight: bold;
            font-family: "Arial Black"
        }

        #stiltstaanparken {
            background-image: url("Afbeeldingen/Borden/Parkerentoegelaten.png");
        }

        #voorangsborden {
            background-image: url("Afbeeldingen/Borden/Voorrangverlenen.png");
        }

        #aanwijzingsbotfen {
            background-image: url("Afbeeldingen/Borden/Rechtsoflinksvoorbijrijdentoegelaten.png");
        }

        #gebodborden {
            background-image: url("Afbeeldingen/Borden/Verplichtrondgaandverkeer.png");
        }

    </style>
</head>
<body>
<!-- region navbar-->
<?php include 'navbar.html' ?>
<script>
    $(document).ready(function () {
        $("#Bordenli").addClass("active");
    });
</script>
<!-- endregion navbar-->

<h1>Verkeersborden oefenexamen</h1>
<h3>Kies je soort vragen hier </h3>
<div id="keuze">
    <input type="button" id="stiltstaanparken" value="stiltstaanparken"
           onclick="window.location='StilstaanParkeren.php'"/>
    <br/>
    <input type="button" id="voorangsborden" value="voorangsborden" onclick="window.location='VoorangsBordenQuiz.php'"/>
    <br/>
    <input type="button" id="aanwijzingsbotfen" value="aanwijzingsborden"
           onclick="window.location='AanwijzingsBordenQuiz.php'"/>
    <br/>
    <input type="button" id="gebodborden" value="gebodsborden" onclick="window.location='Gebodsborden.php'"/>
    <br/>
</div>

<script>
    (function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/nl_NL/sdk.js#xfbml=1&version=v2.9&appId=1741589282521605";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

<script type="text/javascript" src="Javascript/jquery.js"></script>
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