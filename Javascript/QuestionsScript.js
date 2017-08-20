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
    AANTAL_VRAGEN  = questions.length;
    questionIndex = 0;
    questionElement = $("#vraag");
    opt1 = $("#opt1");
    opt2 = $("#opt2");
    opt3 = $("#opt3");
    imageElement = $("#imageQuestion");
    answers = new Array();
    timeLeftElement = $("#quiz-time-left");
    randomizeOrderQuestions();
    loadNextQuestion();
}

function loadNextQuestion() {
    var currentQuestion = questions[questionIndex];
    questionElement.html(String(questionIndex + 1) + '. ' + currentQuestion.vraag);
    opt1.html(currentQuestion.optie1);
    opt2.html(currentQuestion.optie2);
    if (currentQuestion.optie3 !== "")
    {
        opt3.html(currentQuestion.optie3);
    }
    imageElement.attr("src", "Afbeeldingen/" + (currentQuestion.afbeelding).toUpperCase());
    startTimer();
}

function submitAnswer(overtime) {
    endTimer();
    var selectedOption;
    if(overtime!==true){
        selectedOption = $("input:checked").val();
        document.querySelector('input[type=radio]:checked').checked = false;
        //$("input:checked").prop('checked', false);
    }else{
        selectedOption = 0;
    }
    answers[questionIndex] = selectedOption;
    if(questionIndex < AANTAL_VRAGEN - 1){
        if(questionIndex === AANTAL_VRAGEN - 1) $("#nextButton").html("End exam");

        questionIndex++;
        loadNextQuestion();
    }else{
        generateRapport();
    }

}

function generateRapport() {
    var juisteAntwoorden = 0;
    var timeOut = false;

    for(var i = 0; i < AANTAL_VRAGEN; i++){
        var q = questions[i];
        var userAnswer = answers[i];
        var realAnswer = q.antwoord;
        timeOut = false;

        if(userAnswer===realAnswer){
            juisteAntwoorden++;
        }else{
            showGoodAnswer(q, userAnswer);
        }
    }
    $("#cijfer").html("Je hebt " + juisteAntwoorden + " van de " + AANTAL_VRAGEN + " vragen juist!");
}

function showGoodAnswer(question, userAnswer) {
    $("#quizContainer").css("display", "none");
    resultElement = $("#result");
    resultElement.css("display", "block");
    resultElement.append('<div class="bad-answer-div">');
    resultElement.append('<label class="question">' + question.vraag + '</label><br />');
    resultElement.append('<img src="Afbeeldingen/' + question.afbeelding +'" name="imageQuestion" alt="images" width="250" height="250"/><br />');
    resultElement.append('<label class="bad-answer-option">Uw antwoord: '+ getTextFromOptionNr(question, userAnswer) +'</label><br />');
    resultElement.append('<label class="good-answer-option">De juiste antwoord: '+ getTextFromOptionNr(question, question.antwoord) +'</label><br />');
    resultElement.append('<label class="explanation">' + question.uitleg +'</label><br />');
    resultElement.append('</div><br />');
}

function getTextFromOptionNr(question, optionNr){
    var optionText = "";
    switch(optionNr){
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
        timeLeftElement.html('Tijd: ' + counter.toString() + ' seconden');
        intervalId = setInterval(actionTimer, 1000);
    }

    function actionTimer() {
        counter--;
        if (counter > MIN_TIME_COUNTER) {
            timeLeftElement.html('Tijd: ' + counter.toString() + ' seconden');
        } else {
            // what happened when timer is ended ?!
            timeLeftElement.html('Tijd is over.');
            submitAnswer(true);
        }
    }

    function endTimer() {
        clearInterval(intervalId);
    }
}
// endregion