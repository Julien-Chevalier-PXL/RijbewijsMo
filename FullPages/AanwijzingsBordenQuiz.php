<?php
/**
 * Created by PhpStorm.
 * User: mo-bo_000
 * Date: 12/04/2017
 * Time: 16:07
 */
?>
<!DOCTYPE html>
<html>
<head>
    <title>AaanwijzingBorden Quiz</title>
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

    <link href="../Style.css" rel="stylesheet">
    <!-- endregion -->

    <style>
        body, h1,h2,h3,h4,h5,h6 {font-family: "Montserrat", sans-serif}
        .w3-row-padding img {margin-bottom: 12px}
    </style>
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
<div id="quizContainer" class="container">


    <div class="title">Rijbijwijs Quiz</div>

    <div id='question' class='question'></div>
    <img style="width: 75%" src="../Afbeeldingen/Borden/Doorsteekvandemiddenberm.png" id="slideShow" name="slideShow" alt="images" width="auto" height="auto"/>
    </br>
    <label class="option"> <input type="radio" name="option" value="1"/> <span id="opt1"></span> </label>
    </br>
    <label class="option"><input type="radio" name="option" value="2"/><span id="opt2"></span> </label>
    </br>
    <label class="option"><input type="radio" name="option" value="3"/><span id="opt3"></span> </label>
    <br/>
    <br/>
    <button id="nextButton"  class="next-btn" onclick="loadNextQuestion()">Volgende vraag</button>


  
    <div id="result" class="container result" style="display:none;">
    </div>

</div>

<script src="../Javascript/QuestionAanwijzings.js"></script>
<script src="../Javascript/Quiz_script_Aanwijzings.js"></script>



</body>
</html>