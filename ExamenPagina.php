<?php
/**
 * Created by PhpStorm.
 * User: mo-bo_000
 * Date: 05/06/2017
 * Time: 14:14
 */

session_start();

include 'DatabaseActions/DbConnect.php';
include 'DatabaseActions/VragenRepository.php';
//require 'DatabaseActions/DbConnect.php';
//require 'DatabaseActions/VragenRepository.php';

$db = getDb();

if (isset($_SESSION['message'])) {
    echo "<div id='error_msg'>" . $_SESSION['message'] . "</div>";
    unset($_SESSION['message']);
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Examen pagina</title>

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="manifest" href="manifest.json"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="Javascript/QuestionsScript.js"></script>

    <style>
        body, h1, h2, h3, h4, h5, h6 {
            font-family: "Montserrat", sans-serif
        }

        .w3-row-padding img {
            margin-bottom: 12px
        }

    </style>
</head>
<body>
<nav about="navbar" class="w3-sidebar w3-black w3-animate-right w3-xxlarge"
     style="display:none;padding-top:150px;right:0;z-index:2"
     id="mySidebar">
    <a href="javascript:void(0)" onclick="closeNav()" class="w3-button w3-black w3-xxxlarge w3-display-topright"
       style="padding:0 12px;">
        <i class="fa fa-remove"></i>
    </a>
    <div class="w3-bar-block w3-center">
        <a href="WelkomPagina.html"><h4>Welkom</h4></a>
        <a href="ExamenCentraLijst.php">ExamenCentrum</a>
        <a href="ExamenCentraKaart.html" class="fa fa-map-marker fa-fw w3-xxlarge w3-margin-right">Maps</a>
        <br/>
        <div class="fb-share-button" data-href="https://developers.facebook.com/docs/plugins/"
             data-layout="button_count" data-size="large" data-mobile-iframe="true">
            <a class="fb-xfbml-parse-ignore" target="_blank"
               href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse">Delen</a>
        </div>

        <br/>
        <a href="LogOutPagina.php">Log out</a>
    </div>
</nav>

<div class="w3-main w3-padding-large" style="margin-left:40%">
    <!-- Menu icon to open sidebar -->
    <span class="w3-button w3-top w3-white w3-xxlarge w3-text-grey w3-hover-text-black" style="width:auto;right:0;"
          onclick="openNav()"><i class="fa fa-bars"></i></span>

    <div id="quizContainer" class="container">
        <div class="title">Rijbewijs Quiz</div>

        <br/>
        <br/>
        <div id='vraag' class='question'></div>
        <img src="Afbeeldingen/Vragen/1.JPG" id="imageQuestion" name="imageQuestion" alt="images" width="250" height="250"/>
        <br/>
        <label class="option"><input type="radio" name="option" value="1"/><span id="opt1"></span></label>
        <br/>
        <label class="option"><input type="radio" name="option" value="2"/><span id="opt2"></span></label>
        <br/>
        <label class="option"><input type="radio" name="option" value="3"/><span id="opt3"></span></label>
        <button id="loading" class="next-btn" style="display: none;">Loading</button>
        <br/>
        <button id="nextButton" class="next-btn" onclick="submitAnswer(false)">Volgende vraag</button>
        <br/>
        <div style="font-weight: bold" id="quiz-time-left"></div>
    </div>

    <div id="result" class="container result" style="display:none;">

    </div>
    <?php echo '<script>var questions = ['. implode(",", getVragen($db)) .'];</script>'; ?>
    <script>
        $(document).ready(function () {
            startQuiz();
        });
    </script>

    <script>
        (function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = "//connect.facebook.net/nl_NL/sdk.js#xfbml=1&version=v2.9&appId=1741589282521605";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>

    <script about="sidebar">
        // Open and close sidebar
        function openNav() {
            document.getElementById("mySidebar").style.width = "60%";
            document.getElementById("mySidebar").style.display = "block";
        }

        function closeNav() {
            document.getElementById("mySidebar").style.display = "none";
        }
    </script>

    <!--    <script src="Javascript/Examen-script.js"></script>-->

</body>
</html>