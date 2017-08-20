<?php
/**
 * Created by PhpStorm.
 * User: mo-bo_000
 * Date: 12/04/2017
 * Time: 12:08
 */

?>

<!DOCTYPE html>
<html>
<head>
    <title>RijbewijsL</title>


    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="manifest"href="manifest.json"/>
    <script type="text/javascript" src="Javascript/jquery.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        body, h1,h2,h3,h4,h5,h6 {font-family: "Montserrat", sans-serif}
        .w3-row-padding img {margin-bottom: 12px}
        .bgimg {
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            min-height: 100%;
        }
    </style>
    </head>
<body>
<nav class="w3-sidebar w3-black w3-animate-right w3-xxlarge" style="display:none;padding-top:150px;right:0;z-index:2" id="mySidebar">
    <a href="javascript:void(0)" onclick="closeNav()" class="w3-button w3-black w3-xxxlarge w3-display-topright" style="padding:0 12px;">
        <i class="fa fa-remove"></i>
    </a>
    <div class="w3-bar-block w3-center">
        <a href="FullPages/WelkomPagina.php"><h4>Welkom</h4></a>
        <a href="FullPages/KeuzeVerkeersborden.php"><h2>Keuze verkeersborden</h2></a>
        <a href="FullPages/ExamenCentraLijst.php">ExamenCentrum</a>
        <a href="ExamenCentraKaart.php" class="fa fa-map-marker fa-fw w3-xxlarge w3-margin-right">Maps</a>
        <br/>
        <div class="fb-share-button" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button_count" data-size="large" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse">Delen</a></div>

    </div>

</nav>



<div class="w3-main w3-padding-large" style="margin-left:40%">

    <!-- Menu icon to open sidebar -->
    <span class="w3-button w3-top w3-white w3-xxlarge w3-text-grey w3-hover-text-black" style="width:auto;right:0;" onclick="openNav()"><i class="fa fa-bars"></i></span>





<script src="Javascript/QuestionStilstaan&Parkeren.js"></script>
<script src="Javascript/Quiz_script_StilstaanParkeren.js"></script>




<div id="quizContainer" class="container">

    <div class="title">Rijbijwijs Quiz</div>

    <div id='question' class='question'></div>
    <img src="Afbeeldingen/Borden/Verkeersborden/Stilstaan&Parkeren/Parkeerverbod van de 16e tot het einde van de maand.png" id="slideShow" name="slideShow" alt="images" width="auto" height="auto"/>
    </br>
    <label class="option"> <input type="radio" name="option" value="1"/> <span id="opt1"></span> </label>
    </br>
    <label class="option"><input type="radio" name="option" value="2"/><span id="opt2"></span> </label>
    </br>
    <label class="option"><input type="radio" name="option" value="3"/><span id="opt3"></span> </label>
    <br/>
    <button id="nextButton"  class="next-btn" onclick="loadNextQuestion()"> Volgende vraag</button>

</div>
    <br/>

<div id="result" class="container result" style="display:none;">

</div>
<script src="Javascript/QuestionStilstaan&Parkeren.js"></script>
<script src="Javascript/Quiz_script_StilstaanParkeren.js"></script>


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