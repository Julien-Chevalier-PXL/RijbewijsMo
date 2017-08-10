<?php
/**
 * Created by PhpStorm.
 * User: mo-bo_000
 * Date: 05/06/2017
 * Time: 14:14
 */

session_start();

//connect to database
//$db=mysqli_connect("localhost","id993722_mohamedbouzouf","rijbewijs","id993722_mi4rijbewijs");
$db=mysqli_connect("localhost","root","","mi4rijbewijs");

if($db)
{
    //echo" We are connected ";
}
else
{
    die("Connection failed . Reason: " .mysqli_connect_error());
}

if(isset($_SESSION['message']))
{
    echo "<div id='error_msg'>".$_SESSION['message']."</div>";
    unset($_SESSION['message']);

}

mysqli_query($db,'SET CHARACTER SET utf8');
$sql = "SELECT id,vraag,afbeelding,optie1,optie2,optie3,uitleg FROM quizscript";
$result = mysqli_query($db, $sql);

$i = 0;
while($row = mysqli_fetch_assoc($result))
{
    // echo implode(",",$row);
    $js_array[$i] = json_encode($row, JSON_UNESCAPED_UNICODE);
    $i = $i + 1;
}

echo '<script>var questions = ['. implode(",",$js_array) .'];</script>';
//echo "<script src='Question.js'></script>";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Examen pagina</title>

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

    </style>
</head>
<body>

<nav class="w3-sidebar w3-black w3-animate-right w3-xxlarge" style="display:none;padding-top:150px;right:0;z-index:2" id="mySidebar">
    <a href="javascript:void(0)" onclick="closeNav()" class="w3-button w3-black w3-xxxlarge w3-display-topright" style="padding:0 12px;">
        <i class="fa fa-remove"></i>
    </a>
    <div class="w3-bar-block w3-center">
        <a href="WelkomPagina.html"><h4>Welkom</h4></a>
        <a href="ExamenCentraLijst.php">ExamenCentrum</a>
        <a href="ExamenCentraKaart.html" class="fa fa-map-marker fa-fw w3-xxlarge w3-margin-right">Maps</a>
        <br/>
        <div class="fb-share-button" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button_count" data-size="large" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse">Delen</a></div>

        <br/>
        <a href="LogOutPagina.php">Log out</a>
    </div>
</nav>

<div class="w3-main w3-padding-large" style="margin-left:40%">

    <!-- Menu icon to open sidebar -->
    <span class="w3-button w3-top w3-white w3-xxlarge w3-text-grey w3-hover-text-black" style="width:auto;right:0;" onclick="openNav()"><i class="fa fa-bars"></i></span>







    <div id="quizContainer" class="container">
        <div class="title">Rijbewijs Quiz</div>

<br/>
<br/>
        <div id='vraag' class='question'>test</div>
        <img style="width: 100%" src="Afbeeldingen/Vragen/1.JPG" id="slideShow" name="slideShow" alt="images" width="auto" height="auto"/>

        </br>
        <label class="option"> <input type="radio" name="option" value="1"/> <span id="opt1"></span> </label>
        </br>
        <label class="option"><input type="radio" name="option" value="2"/><span id="opt2"></span> </label>
        </br>
        <label class="option"><input type="radio" name="option" value="3"/><span id="opt3"></span> </label>
        <button id="loading"  class="next-btn" style="display: none;" >Loading</button>
        <br/>
        <button id="nextButton"  class="next-btn" onclick="onclick_q()">Volgende vraag</button>
        <br/>
        <button id="endButton"  class="next-btn" onclick="rapport()" style="display: none;">Toon Rapport</button>
        <br>
        <div style="font-weight: bold" id="quiz-time-left"></div>
    </div>


    <div id="result" class="container result" style="display:none;">
        <br/>

    </div>







    <script>
        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
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

    <script src="Javascript/Examen-script.js"></script>

</body>
</html>