<?php

include '../DatabaseActions/DbConnect.php';
include '../DatabaseActions/ExamencentraRepository.php';

$db = getDb();

$examencentras = getExamenCentras($db);
?>

<!DOCTYPE html>
<html lang="en">
<head>
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

    <title>ExamenCentra lijst</title>
    <script src="../Javascript/sortTable.js"></script>
</head>

<body>
<!-- region navbar-->
<?php require '../PartialViews/navbar.html'; ?>
<script>
    $(document).ready(function () {
        $("#Lijstli").addClass("active");
    });
</script>
<!-- endregion navbar-->
<?php echo '<script>var examencentras = [' . implode(",", getExamenCentras($db)) . '];</script>'; ?>
<script>
    $(document).ready(function () {
        var tbody = document.getElementById("examencentraTblTb");
        for (var index = 0; index < examencentras.length; index++) { // foreach werkt niet, don't know why
            var examencentra = examencentras[index];
            var row = tbody.insertRow(-1);
            var adresCell = row.insertCell(-1);
            adresCell.innerHTML = examencentra.adres.trim();
            var postcodeCell = row.insertCell(-1);
            postcodeCell.innerHTML = examencentra.postcode.trim();
            var plaatsCell = row.insertCell(-1);
            plaatsCell.innerHTML = examencentra.plaats.trim();
            var telCell = row.insertCell(-1);
            telCell.innerHTML = examencentra.tel.trim();
            var openingCell = row.insertCell(-1);
            openingCell.innerHTML = '<a href="' + examencentra.openingsuren + '">' + examencentra.openingsuren + '</a>';
        }
        $("#postcodeBtn").on('click', function () {
            sortTable(tbody, 2, true);
        });
        $("#plaatsBtn").on('click', function () {
            sortTable(tbody, 3, false)
        });
    });
</script>
<div class="container">
    <h1>Examencentra in vlanderen</h1>
    <table id="examencentraTable" class="table table-responsive table-striped">
        <thead>
        <tr>
            <th>Adres</th>
            <th>
                <button class="btn btn-info" id="postcodeBtn">Postcode</button>
            </th>
            <th>
                <button class="btn btn-info" id="plaatsBtn">Plaats</button>
            </th>
            <th>Tel</th>
            <th>Openingsuren</th>
        </tr>
        </thead>
        <tbody id="examencentraTblTb">

        </tbody>
    </table>
</div>
</body>

</html>