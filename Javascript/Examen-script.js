var currentQuestion = 0;
var score = 0;
var totQuestions = questions.length; //totaal aantal vragen
var totexamen = 49; //50 vragen in het totaal per examen
var total_seconds = 15; //totaal aantal seconden per vraag
var container = document.getElementById('quizContainer');
var questionEl = document.getElementById('vraag');
var opt1 = document.getElementById('opt1');
var opt2 = document.getElementById('opt2');
var opt3 = document.getElementById('opt3');
var afb = document.getElementById('slideShow');
var nextButton = document.getElementById('nextButton');
var resultCont = document.getElementById('result');
var tijd = document.getElementById('quiz-time-left');
var image_number = 0;
var vragen = new Array(new Array(0,0));
var rand = new Array();
var loop = true;
var seconds = 5;
var d = new Date();
var r = 0;
var antwoord;

function random_vraag() {
    
     r =  Math.floor((Math.random() * totQuestions));

    while(rand.indexOf(r) !== -1)
    {
        document.getElementById("loading").style.display = "block";
        r = Math.floor((Math.random() * totQuestions));
    }
    document.getElementById("loading").style.display = "None";
    rand[currentQuestion] = r;

    return r;
}


function chane_image(questionIndex) {
    document.getElementById('slideShow').src = (questions[questionIndex].afbeelding).toUpperCase();

}

function loadQuestion(questionIndex) {
    
    var qr = random_vraag();
    var q = questions [qr];

    questionEl.innerHTML = String(questionIndex + 1) + '. ' + q.vraag;
    opt1.innerHTML = q.optie1;
    opt2.innerHTML = q.optie2;
	
    
	if (q.optie3 !== "")
	{
        opt3.innerHTML = q.optie3;
	}

	chane_image(qr);
    currentQuestion++;
};

function loadNextQuestion() {
    
    var selectedOption = document.querySelector('input[type=radio]:checked');

    if (selectedOption !== null)
    {
        antwoord = [questions[rand[currentQuestion - 1]].id,selectedOption.value];
        selectedOption.checked = false;
    }
    else
    {
        antwoord = [questions[rand[currentQuestion - 1]].id,0];
    }
    if (currentQuestion <= totexamen)
    {
      loadQuestion(currentQuestion);
    }
    d = new Date();
    var t = d.getTime();
    seconds = t +  (total_seconds * 1000);

	return antwoord;
}

function onclick_q()
{

    vragen[currentQuestion - 1] = loadNextQuestion();
    if ((currentQuestion - 1) === totexamen)
    {
        loop = false;
        document.getElementById("endButton").style.display = "block";
    }
}


async function CheckTime() {

        while (loop)
        {
            d = new Date();
            tijd.innerHTML = 'Time left: ' + Math.ceil((seconds - d.getTime()) / 1000) + ' seconds';
           

            if (seconds <= d.getTime())
            {
                
                vragen[currentQuestion - 1] = loadNextQuestion();

                tijd.innerHTML = 'Time left: ' + Math.ceil((seconds - d.getTime()) / 1000) + ' seconds';
                if ((currentQuestion - 1) === totexamen)
                {
                    loop = false;
                    document.getElementById("endButton").style.display = "block";
                }

            }


            tijd.innerHTML = 'Tijd: ' + Math.ceil((seconds - d.getTime()) / 1000) + ' seconden';
            await sleep(1000);
            setTimeout(CheckTime, 1000);
        }
        // setTimeout("CheckTime()",1000);
	}



 function Timer() {
    //alert(questionEl.innerHTML);

    var t = d.getTime();

    seconds = t + (total_seconds * 1000);
    CheckTime();
}

function sleep(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));

}


loadQuestion(currentQuestion);
Timer();
//einde_examen();


function rapport()
{
    $.ajax( {
        type: 'POST',
        url: "resultaat.php",
        //dataType: 'text',
        success: function(result) {
            //console.log(result);
            //str = jQuery.parseJSON(result);
            //str[0];
            try{
                eval(result);
            }
            catch(error){
                console.log(error);
            };
            //alert(ans);
            var juist = 0;
            container.style.display ='none';
            resultCont.style.display ='';

            for (var index = 0; index < totexamen; index++) {
                if (vragen[index][1] === ans[rand[index]].antwoord)
                {
                    juist++;
                }
            }
            resultCont.innerHTML = "je hebt " + juist + " van de " + " 50 "+ " vragen juist!";

        },
        error: function(xml, error) {
            console.log(error);
        }
    } );

}


//shareButtonFB
function post() {
    FB.api('/me','GET', {field: 'first_name,last_name,name,id'}, function (response) {
        document.getElementById('status').innerHTML = response.id;

    });

}
function shareLink()
{
    FB.api('/me/feed','post',{message:'my first status...'}, function(response){
        document.getElementById('status').innerHTML = response.id;
    });
}