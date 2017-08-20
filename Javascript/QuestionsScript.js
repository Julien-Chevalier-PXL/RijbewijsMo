var questionIndex;
var questionElement;
var opt1;
var opt2;
var opt3;
var imageElement;
var answers;
var timeLeftElement;
var intervalId;
var AANTAL_VRAGEN;
var resultElement;

function startQuiz() {
    AANTAL_VRAGEN = questions.length;
    AANTAL_VRAGEN = 10;
    questionIndex = 0;
    questionElement = $("#vraag");
    opt1 = $("#opt1");
    opt2 = $("#opt2");
    opt3 = $("#opt3");
    imageElement = $("#imageQuestion");
    answers = new Array();
    timeLeftElement = $("#quiz-time-left");

    $("#quizContainer").removeClass('hidden');
    $("#startContainer").addClass('hidden');
    randomizeOrderQuestions();
    loadNextQuestion();
}

function loadNextQuestion() {
    updateProgressbar();
    var currentQuestion = questions[questionIndex];
    questionElement.html(String(questionIndex + 1) + '. ' + currentQuestion.vraag);
    opt1.html(currentQuestion.optie1);
    opt2.html(currentQuestion.optie2);
    if (currentQuestion.optie3 !== "") {
        opt3.html(currentQuestion.optie3);
    }
    imageElement.attr("src", "Afbeeldingen/" + (currentQuestion.afbeelding).toUpperCase());
    $('#nextButton').removeClass('disabled');
    startTimer();
}

function submitAnswer(overtime) {
    endTimer();
    var selectedOption;
    if (overtime !== true) {
        selectedOption = $("input:checked").val();
        document.querySelector('input[type=radio]:checked').checked = false;
    } else {
        selectedOption = 0;
    }
    answers[questionIndex] = selectedOption;
    if (questionIndex < AANTAL_VRAGEN - 1) {
        if (questionIndex === AANTAL_VRAGEN - 1) $("#nextButton").html("End exam");
        questionIndex++;
        loadNextQuestion();
    } else {
        generateRapport();
    }

}

function generateRapport() {
    var juisteAntwoorden = 0;
    var timeOut = false;

    for (var i = 0; i < AANTAL_VRAGEN; i++) {
        var q = questions[i];
        var userAnswer = answers[i];
        var realAnswer = q.antwoord;
        timeOut = false;

        if (userAnswer === realAnswer) {
            juisteAntwoorden++;
        } else {
            showGoodAnswer(q, userAnswer, i);
        }
    }
    $("#quizContainer").addClass('hidden');
    $('#resultContainer').removeClass('hidden');
    if (juisteAntwoorden < 2) {
        $("#cijfer").addClass('alert-danger');
    } else if (juisteAntwoorden < 3) {
        $("#cijfer").addClass('alert-warning');
    } else {
        $("#cijfer").addClass('alert-success');
    }
    $("#cijfer").html("Je hebt " + juisteAntwoorden + " van de " + AANTAL_VRAGEN + " vragen juist!");
}

function updateProgressbar() {
    var percentageQuestion = (questionIndex + 1) * 100 / AANTAL_VRAGEN;
    $('.progress-bar').css('width', percentageQuestion + '%').attr('aria-valuenow', percentageQuestion);
    $('#qIndexProgBard').html(questionIndex + 1 + "/" + AANTAL_VRAGEN);
}

function showGoodAnswer(question, userAnswer, qId) {
    var panelHeading;
    panelHeading = '<div class="panel-heading" id="heading' + qId + '">' +
        '<h4 class="panel-title">' +
        '<a role="button" data-toggle="collapse" data-parent="#accordion"' +
        ' href="#collapse' + qId + '">' + question.vraag + '</a>' + '</h4></div>';
    var panelBody;
    panelBody = '<div id="collapse' + qId + '" class="panel-collapse collapse">' +
        '<div class="panel-body">' +
        '<label class="question">' + question.vraag + '</label><br />' +
        '<img class="media-object" src="Afbeeldingen/' + question.afbeelding + '" name="imageQuestion" alt="images" width="250" height="250"/><br />' +
        '<label class="alert alert-danger">Uw antwoord: ' + getTextFromOptionNr(question, userAnswer) + '</label><br />' +
        '<label class="alert alert-success">De juiste antwoord: ' + getTextFromOptionNr(question, question.antwoord) + '</label><br />' +
        '<label class="alert alert-info">' + question.uitleg + '</label>' +
        '</div></div>';
    accordionElement = $("#accordion");
    accordionElement.append('<div class="panel panel-default">' + panelHeading + panelBody + '</div>');
}

function getTextFromOptionNr(question, optionNr) {
    var optionText = "";
    switch (optionNr) {
        case "1":
            optionText = question.optie1;
            break;
        case "2":
            optionText = question.optie2;
            break;
        case "3":
            optionText = question.optie3;
            break;
        default:
            optionText = "Geen antwoord";
    }
    return optionText;
}

function randomizeOrderQuestions() {
    for (var randomizerCount = 0; randomizerCount < AANTAL_VRAGEN / 2; randomizerCount++) {
        var oldQnr = Math.floor(Math.random() * AANTAL_VRAGEN);
        var oldQuestion = questions[oldQnr];
        var newQnr = Math.floor(Math.random() * AANTAL_VRAGEN);
        questions[oldQnr] = questions[newQnr];
        questions[newQnr] = oldQuestion;
    }
}

// region timer
{
    const MAX_TIME_COUNTER = 15;
    const MIN_TIME_COUNTER = 0;
    var counter;

    function startTimer() {
        counter = MAX_TIME_COUNTER;
        timeLeftElement.html('Tijd: <span class="badge" id="time"></span> seconden');
        $("#time").html(counter.toString());
        timeLeftElement.removeClass('btn-warning');
        timeLeftElement.removeClass('btn-danger');
        timeLeftElement.addClass('btn-info');
        intervalId = setInterval(actionTimer, 1000);
    }

    function actionTimer() {
        counter--;
        if (counter > MIN_TIME_COUNTER) {
            $("#time").html(counter.toString());
            if (counter <= ((MAX_TIME_COUNTER / 2) - 1)) {
                timeLeftElement.addClass('btn-warning');
            }
        } else if (counter === MIN_TIME_COUNTER) {
            timeLeftElement.html('Tijd is over.');
            timeLeftElement.addClass('btn-danger');
            $('#nextButton').addClass('disabled');
        } else {
            // what happened when timer is ended ?!
            submitAnswer(true);
        }
    }

    function endTimer() {
        clearInterval(intervalId);
    }
}
// endregion