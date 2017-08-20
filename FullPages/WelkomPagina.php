<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>WelkomPagina</title>
    <!-- region standard head-->
    <meta charset="UTF-8">
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
    <!-- endregion -->
</head>

<body>
<!-- region navbar-->
<?php require '../PartialViews/navbar.html'; ?>
<script>
    $(document).ready(function () {
        $("#Homeli").addClass("active");
    });
</script>
<!-- endregion navbar-->

<div class="container">
    <div class="col-md-12 jumbotron alert-success">
        <h1>Altijd geslaagd!</h1>
        <p>Behaal je L rijbewijs van de 1ste keer !</p>
    </div>
    <div class="col-md-12 jumbotron alert-info">
        <h2>Welkom</h2>
        <p>Mijn naam is Mohamed en ik ga je helpen slagen voor je theoretisch rijexamen. Dit
            is het juiste (web)adres om te slagen voor jou theoretisch rijexamen</p>
        <p>
            Je kan kiezen om meteen te beginnen met het examen of te beginnen met verschillende borden te leren
            kennen.

            Ik wens je alvast veel succes!
        </p>
    </div>
    <div class="col-md-12 jumbotron alert-info">
        <h1>Start nu</h1>
        <button class="btn btn-primary"
                onclick="window.location='ExamenPagina.php'">Theoretisch examen
        </button>
        <button class="btn btn-primary"
                onclick="window.location= 'KeuzeVerkeersborden.php'">Verkeersborden
        </button>
    </div>
</div>
</body>
</html>