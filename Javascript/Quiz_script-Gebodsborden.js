/**
 * Created by mo-bo_000 on 11/04/2017.
 */


var currentQuestion = 0;
var score = 0;
var totQuestions = questions.length;


var container = document.getElementById('quizContainer');
var questionEl = document.getElementById('question');
var opt1 = document.getElementById('opt1');
var opt2 = document.getElementById('opt2');
var opt3 = document.getElementById('opt3');
var nextButton = document.getElementById('nextButton');
var resultCont = document.getElementById('result');

var image = new Array("Borden/Rechtdoorrijden.png", "Borden/Verplichtfietspad.png",
    "Borden/Verplichtlinksafteslaan.png",
    "Borden/Verplichtrechtdoorrijdenofrechtsafslaan.png","Borden/Verplichtrondgaandverkeer.png",
    "Borden/Verplichtewegvoorvoetgangers.png",
    "Borden/Wegvoordevoetgangersenfietsers.png",
    "Borden/Wegvoorbehoudenvoorvoetgangersfietsersenbromfietsen.png");

var image_number = 0;


function chane_image() {

    document.getElementById('slideShow').src = image[image_number];
    image_number = image_number + 1;
    return false;
};

function loadQuestion(questionIndex) {
    var q = questions [questionIndex];
    questionEl.textContent = (questionIndex +1) + '. ' + q.question;
    opt1.textContent = q.option1;
    opt2.textContent = q.option2;
    opt3.textContent = q.option3;
};

function loadNextQuestion() {

    var selectedOption = document.querySelector('input[type=radio]:checked');
    if(!selectedOption)
    {
        alert('Selecteer een antwoord!');
        return;
    }
    var answer = selectedOption.value;
    if(questions[currentQuestion].answer === answer){
        score += 10;
    }
    selectedOption.checked = false;
    currentQuestion++;
    if(currentQuestion === totQuestions - 1){
        nextButton.textContent = 'Finish';
    }
    if(currentQuestion === totQuestions){
        container.style.display ='none';
        resultCont.style.display ='';
        resultCont.textContent="Jouw score: "+ score;
        return;
    }
    loadQuestion(currentQuestion);
    chane_image();
}
$(document).ready(function () {
    loadQuestion(currentQuestion);
    chane_image();
});
