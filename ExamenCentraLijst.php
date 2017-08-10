<?php
/**
 * Created by PhpStorm.
 * User: mo-bo_000
 * Date: 28/03/2017
 * Time: 17:29
 */
//connect to database
//$db=mysqli_connect("localhost","id993722_mohamedbouzouf","rijbewijs","id993722_mi4rijbewijs");
$db=mysqli_connect("localhost","root","","mi4rijbewijs");

$query="SELECT * FROM centravlaanderen";
if($db)
{
   // echo"We are connected ";
}
else
{
    die("Connection failed . Reason: " .mysqli_connect_error());
}

$sql ="SELECT * FROM centravlaanderen";
$mydata = mysqli_query($db,$sql);
$sql="SELECT Adres, Postcode, Plaats, Tel, Openingsuren * FROM centravlaanderen";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ExamenCentra lijst</title>
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
        <a href="keuzeverkeersborden.html"><h2>Keuze verkeersborden</h2></a>
        <a href="ExamenCentraKaart.html" class="fa fa-map-marker fa-fw w3-xxlarge w3-margin-right">Maps</a>
        <br/>
        <div class="fb-share-button" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button_count" data-size="large" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse">Delen</a></div>

    </div>
</nav>

<div class="w3-main w3-padding-large" style="margin-left:40%">

    <!-- Menu icon to open sidebar -->
    <span class="w3-button w3-top w3-white w3-xxlarge w3-text-grey w3-hover-text-black" style="width:auto;right:0;" onclick="openNav()"><i class="fa fa-bars"></i></span>
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

</div>
<br/>
<br/>
    <table width="600" border="1" cellpadding="1" cellspacing="1">

        <tr>
            <th>ID</th>
        <th>Adres</th>
        <th>Postcode</th>
        <th>Plaats</th>
        <th>Tel</th>
        <th>Openingsuren</th>

        </tr>
        <tr>
            <?php

            while($row = mysqli_fetch_array($mydata))
            {
                echo"<tr>";
                echo '<td>'.$row['id']. '</td>';
                echo '<td>'.$row['Adres'].'</td>';
                echo '<td>'.$row['Postcode'].'</td>';
                echo '<td>'.$row['Plaats'].'</td>';
                echo '<td>'.$row['Tel'].'</td>';
                echo '<td>'.$row['Openingsuren'].'</td>';

            }
            ?>

        </tr>

    </table>


</body>

</html>