function getImageSrc(imageName){
    return "../Afbeeldingen" + imageName;
}

function setRadioBtnValues(question){
    $("#answer1").val(question.optie1);
    $("#answer2").val(question.optie2);
    $("#answer3").val(question.optie3);
}

function isRightAnswer(userAnswer, realAnswer){
    console.log(userAnswer + " - " + realAnswer);
    return userAnswer===realAnswer;
}

function showUserAnswer(question, userAnswer){
    if(userAnswer!==0)
        return userAnswer;
    return "Geen antwoord";
}

function showQuestionAnswer(question, antwoord){
    return antwoord;
}

function getUitleg(question) {
    return '';
}