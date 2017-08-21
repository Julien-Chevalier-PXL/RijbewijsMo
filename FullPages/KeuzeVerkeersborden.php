<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Keuze verkeersborden</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="manifest" href="../manifest.json"/>
    <!-- Bootstrap -->
    <link href="../Bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../Bootstrap/js/bootstrap.min.js"></script>

    <link href="../Stylesheet/Style.css" rel="stylesheet">
</head>
<body>
<!-- region navbar-->
<?php include '../PartialViews/navbar.html' ?>
<script>
    $(document).ready(function () {
        $("#Bordenli").addClass("active");
    });
</script>
<!-- endregion navbar-->
<div class="container container well">
    <h1>Verkeersborden oefenexamen</h1>
    <h3>Kies je soort vragen hier </h3>
    <div id="keuze" class="text-center">
        <a type="button" class="btn col-md-3 col-sm-12 col-xs-12" href="StilstaanParkeren.php" >
            <span class="text-center">Stilstaan parkeren</span>
            <img src="../Afbeeldingen/Borden/Parkerentoegelaten.png" alt="Parkeren" class="img-rounded img-responsive img-borden"></a>
        <a type="button" class="btn col-md-3 col-sm-12 col-xs-12" href="VoorangsBordenQuiz.php" >
            <span class="text-center">Voorangsborden</span>
            <img src="../Afbeeldingen/Borden/Voorrangverlenen.png" alt="Voorangsborden" class="img-rounded img-responsive img-borden"></a>
        <a type="button" class="btn col-md-3 col-sm-12 col-xs-12" href="AanwijzingsBordenQuiz.php" >
            <span class="text-center">Aanwijzingsborden</span>
            <img src="../Afbeeldingen/Borden/Rechtsoflinksvoorbijrijdentoegelaten.png" alt="Aanwijzingsborden" class="img-rounded img-responsive img-borden"></a>
        <a type="button" class="btn col-md-3 col-sm-12 col-xs-12" href="Gebodsborden.php" >
            <span class="text-center">Gebodsborden</span>
            <img src="../Afbeeldingen/Borden/Verplichtrondgaandverkeer.png" alt="Gebodsborden" class="img-rounded img-responsive img-borden"></a>
    </div>
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
</body>
</html>