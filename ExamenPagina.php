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

    <script src="Javascript/QuestionsScript.js"></script>
</head>
<body>
<?php include 'navbar.html' ?>
    <div id="quizContainer" class="container">
        <div class="title">Rijbewijs Quiz</div>

        <br/>
        <br/>
        <div id='vraag' class='question'></div>
        <img src="Afbeeldingen/Vragen/1.JPG" id="imageQuestion" name="imageQuestion" alt="images" width="250"
             height="250"/>
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
        <label id="cijfer"></label>
    </div>
    <?php echo '<script>var questions = [' . implode(",", getVragen($db)) . '];</script>'; ?>
    <script>
        $(document).ready(function () {
            $("#Examenli").addClass("active");
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
</body>
</html>