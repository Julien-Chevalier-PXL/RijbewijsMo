<?php
/**
 * Created by PhpStorm.
 * User: mo-bo_000
 * Date: 11/06/2017
 * Time: 15:07
 */
?>
<!DOCTYPE html>
<html>
<head>
    <title>Gebodsborden pagina</title>
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

    <script src="../Javascript/HardCodedQuizQuestions/QuestionGebodsborden.js"></script>
    <script src="../Javascript/CommonQuestionsScript.js"></script>
    <script src="../Javascript/QuizScript.js"></script>
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
<div class="container">
    <div id="startContainer" class="alert alert-info">
        <h2>Borden quiz</h2>
        <h3>Stilstaan parkeren</h3>
        <p>
            Iedere vraag moet binnen de 15 seconden moeten beaantwoord worden.
        </p>
        <p>
            Indien de 15 seconden om zijn is de vraag als fout beantwoord beschoud en wordt u automatisch de volgen vraag getoond.
        </p>
        <h3>Succes !</h3>
        <button class="btn btn-success btn-lg" onclick="startQuiz()">Click here om de examen te starten</button>
    </div>

    <div id="quizContainer" class="hidden">
        <div class="title">Stilstaan parkeren Quiz</div>
        <div class="progress">
            <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;">
                <span id="qIndexProgBard"></span>
            </div>
        </div>
        <div class="well">
            <div id='vraag' class='question'></div>
            <img class="media-object" src="../Afbeeldingen/Borden/" id="imageQuestion" name="imageQuestion" alt="images" width="250"
                 height="250"/>
            <br/>
            <label class="option"><input type="radio" name="option" id="answer1" value="1"/><span id="opt1"></span></label>
            <br/>
            <label class="option"><input type="radio" name="option" id="answer2" value="2"/><span id="opt2"></span></label>
            <br/>
            <label class="option"><input type="radio" name="option" id="answer3" value="3"/><span id="opt3"></span></label>
            <br/>
            <button type="button" class="btn btn-info" id="quiz-time-left" style="pointer-events: none;">
                Tijd: <span class="badge" id="time"></span> seconden
            </button>
            <button id="nextButton" class="btn btn-success" onclick="submitAnswer(false)">Volgende vraag</button>
        </div>
    </div>

    <div id="resultContainer" class="container hidden">
        <label id="cijfer" class="alert"></label>
        <div class="panel-group" id="accordion">
        </div>
    </div>
</div>
</body>
</html>
