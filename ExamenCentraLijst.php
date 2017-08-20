<?php

include 'DatabaseActions/DbConnect.php';
include 'DatabaseActions/ExamencentraRepository.php';

$db = getDb();

$examencentras = getExamenCentras($db);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ExamenCentra lijst</title>
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
    </style>
</head>

<body>
<!-- region navbar-->
<?php include 'navbar.html' ?>
<script>
    $(document).ready(function () {
        $("#Lijstli").addClass("active");
    });
</script>
<!-- endregion navbar-->
<br/>
<br/>
<?php echo '<script>var examencentras = ['.implode(",", getExamenCentras($db)).'];</script>'; ?>
<script>
    $(document).ready(function () {
        var table = document.getElementById("examencentrasTable");
        for(var index = 0; index < examencentras.length; index++){ // foreach werkt niet, don't know why
            var examencentra = examencentras[index];
            var row = table.insertRow(-1);
            var adresCell = row.insertCell(-1);
            adresCell.innerHTML = examencentra.adres;
            var postcodeCell = row.insertCell(-1);
            postcodeCell.innerHTML = examencentra.postcode;
            var plaatsCell = row.insertCell(-1);
            plaatsCell.innerHTML = examencentra.plaats;
            var telCell = row.insertCell(-1);
            telCell.innerHTML = examencentra.tel;
            var openingCell = row.insertCell(-1);
            openingCell.innerHTML = '<a href="' + examencentra.openingsuren + '">' + examencentra.openingsuren + '</a>';
        }
    });
</script>
<table id="examencentrasTable" width="600" border="1" cellpadding="1" cellspacing="1">
    <tr>
        <th>Adres</th>
        <th>Postcode</th>
        <th>Plaats</th>
        <th>Tel</th>
        <th>Openingsuren</th>
    </tr>
</table>


</body>

</html>