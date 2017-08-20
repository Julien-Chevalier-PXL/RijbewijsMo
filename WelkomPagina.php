<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>WelkomPagina</title>
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
</head>

<body>
<?php include 'navbar.html' ?>
<script>
    $(document).ready(function () {
        $("#Homeli").addClass("active");
    });
</script>
<div class="row">
    <div class="col-12">
        <h1>Altijd geslaagd!</h1>
        <p>Behaal je L rijbewijs van de 1ste X</p>
    </div>
</div>


<header class="w3-container w3-red w3-center" style="padding:128px 16px">
    <h1 class="w3-margin w3-jumbo">Altijd geslaagd!</h1>
    <p class="w3-xMedium">Behaal je L rijbewijs van de 1ste X</p>
</header>

<!-- First Grid -->
<div class="w3-row-padding w3-padding-64 w3-container">
    <div class="w3-content">
        <div class="w3-twothird">
            <br/>
            <h1>Welkom</h1>
            <h5 class="w3-padding-32">Mijn naam is Mohamed en ik ga je helpen slagen voor je theoretisch rijexamen. Dit is het juiste (web)adres om te slagen voor jou theoretisch rijexamen</p>
                Je kan kiezen om meteen te beginnen met het examen of te beginnen met verschillende borden te leren kennen.

                Ik wens je alvast veel succes!
            </h5>
        </div>
        </div>

        <div class="w3-third w3-center">
            <i class="fa fa-anchor w3-padding-64 w3-text-red"></i>
        </div>
    </div>
</div>

<button class="w3-button w3-black w3-padding-large w3-large w3-margin-top" onclick="window.location='ExamenPagina.php'">Examen starten</button>
<button class="w3-button w3-black w3-padding-large w3-large w3-margin-top" onclick="window.location= 'KeuzeVerkeersborden.php'">Verkeersborden</button>

</div>

</body>
</html>