function getImageSrc(imageName){
   return "../Afbeeldingen/" + imageName.toUpperCase();
}

function isRightAnswer(userAnswer, realAnswer){
    if(userAnswer === realAnswer)
        return true;
    return false;
}

function showUserAnswer(question, userAnswer){
    return getTextFromOptionNr(question, userAnswer);
}

function showQuestionAnswer(question, antwoord){
    return getTextFromOptionNr(question, antwoord);
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

function getUitleg(question) {
    return '<label class="alert alert-info">' + question.uitleg + '</label>';
}

function setRadioBtnValues(question){
}