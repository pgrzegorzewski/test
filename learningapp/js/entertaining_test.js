var scrolled = 0;
var result = 0;
var answears = 0;

$(document).ready(function(){
    $(".category").on("click" ,function(){
    	scrolled = scrolled + 520;
    	$('html, body').animate({
        scrollTop:  scrolled
	});
    
});
    
});

window.onload = function()
{
	
	var x = document.getElementsByClassName("category");
	var idButton = 0;
	for(i = 0; i < x.length; i++)
	{
		x[i].onclick = function(){
			this.className = ("clicked");
			this.value = this.id;
			this.name = 'clicked';
			blockTestCategoryButtons();
			blockCategoryButtons(x);
			this.style.backgroundColor = "#6ac65b"
			this.style.color = "white"
			document.getElementById('test_title').innerText = document.getElementById('test_title').innerText + ' ' + this.innerText.toLowerCase() + ' test';
			document.getElementById('test_title').hidden = false;
			//document.getElementById("test_body").hidden = false;
			//document.getElementById("test_body_answear").hidden = false;
		
			categoryIdPass(this.id);
		}
	}
}

function categoryIdPass(id)
{
	//console.log(id);
	$.post('http://localhost:90/app/learningapp/php/category_choose.php', {categoryId : id}, function(data){
		$("#test_questions").html(data);
	})
}

function blockCategoryButtons(buttons)
{
	for(i = 0; i < buttons.length; i++)
	{
		this.className = ("clicked");	
		buttons[i].style.backgroundColor = "#9a9a9a"
		buttons[i].style.color = "white"
	}
}

function categoryIdGet()
{
	var button = document.getElementsByClassName("clicked");
	return button[0].id;
}

function checkTestQuestionAnswear(button, idValue, size, isQuestionImage)
{
	var id = 'answear' + (idValue - 1);
	var img_id = 'answear_img' + (idValue - 1);
	var image = document.createElement("img");
	
	image.setAttribute("height", "50px");
	image.setAttribute("width", "50px");
	
	if(button.id == 1){
		image.setAttribute("src", "../resources/img/correct.png");
		result = result+1;
	}
	else{
		image.setAttribute("src", "../resources/img/error.png");
	}
	blockTestButtons(idValue);
	document.getElementById(id).innerText = drawAnswearAlert(button.id);
	document.getElementById(img_id).appendChild(image);
	changeClassButton(button, button.id);
	answears = answears + 1;
	scrollDownToNextQuestion(isQuestionImage);
	if(answears == size)
		printResult();
}

function scrollDownToNextQuestion(isImage)
{
	var scrollLenght = 0;
	if(isImage == 0){
		scrollLenght = 280;
	}
	else{
		scrollLenght = 887;
	}
	scrolled = scrolled + scrollLenght;
	$('html, body').animate({
	        scrollTop:  scrolled
	   });
}


function showVal(val)
{
	alert(val);
}

function blockTestButtons(id)
{
	var idName = "question"+id;
	$('#' + idName).find(".btn").attr("disabled", "disabled");
}

function blockTestCategoryButtons()
{
	$('#tile').find(".btn").attr("disabled", "disabled");
}

function printResult()
{
	
	var resultComment;
	if(answears == result){
		resultComment = 'Kujon 100/100';
	}else if(result/answears < 1 && result/answears >= 0.8){
		resultComment = 'Rządzisz! super;)';
	}else if(result/answears < 0.8 && result/answears >= 0.6){
		resultComment = 'Zdane:)';
	}else if(result/answears < 0.6 && result/answears >= 0.5){
		resultComment = 'Zdane ale mogłoby być lepiej!';
	}else if(result/answears < 0.5){
		resultComment = 'Lepiej jakbys jeszcze sobie powtórzył materiał;/';
	}
	document.getElementById('result_text').hidden = false;
	document.getElementById('result_award').hidden = false;
	document.getElementById('result_text').innerText = 'Twój wynik ' + result + '/' + answears + ' ' +  resultComment;
}