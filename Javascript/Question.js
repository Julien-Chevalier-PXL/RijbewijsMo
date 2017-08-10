/**
 * Created by mo-bo_000 on 3/04/2017.
 */
 
function loadQuestion(questionIndex) {
    var q = questions [questionIndex];
    document.getElementById('vraag').textContent = (questionIndex + 1) + '. ' + q.vraag;
    opt1.innerHTML = q.optie1;
    opt2.innerHTML = q.optie2;
	
	if (q.option3 !== "")
	{
    opt3.innerHTML = q.optie3;
	}
	chane_image(questionIndex)
};
 
 loadQuestion(3);

