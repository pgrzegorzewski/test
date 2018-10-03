var scrolled = 0;
var result = 0;
var answears = 0;
var startTime = 0;
var endTIme = 0;
var FAST_AWARD = 150;

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
	this.startTime = new Date().getTime();
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

function checkTestQuestionAnswer(button, idValue, size, isQuestionImage, username)
{
	var id = 'answear' + (idValue - 1);
	var img_id = 'answear_img' + (idValue - 1);
	var image = document.createElement("img");
	var is_true;
	
	image.setAttribute("height", "50px");
	image.setAttribute("width", "50px");
	
	$.ajax({
		type: "POST",
		url: "../php/test_question_answer_check.php",
		data:{
			question_answer_id: button.id,
			user: username
		},
		success: function(data){
			this.is_true = data;
			
			if(this.is_true == 1){
				image.setAttribute("src", "../resources/img/correct.png");
				result = result+1;
			}
			else{
				image.setAttribute("src", "../resources/img/error.png");
			}
			blockTestButtons(idValue);
			document.getElementById(id).innerText = drawAnswearAlert(this.is_true);
			document.getElementById(img_id).appendChild(image);
		}
	})
	
	
	blockTestButtons(idValue);
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
	   }, 900);
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

function sleep(ms)
{
    return(new Promise(function(resolve, reject) {        
        setTimeout(function() { resolve(); }, ms);        
    }));    
}

function closeModal()
{
	setTimeout(function(){
		  $('#award_FAST').hide('slow')
		}, 4000);
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
	this.endTime = new Date().getTime();
	document.getElementById('result_text').hidden = false;
	document.getElementById('result_award').hidden = false;
	document.getElementById('result_text').innerText = 'Twój wynik ' + result + '/' + answears + ' ' +  resultComment + '\nZrobiłeś to w ' + ((this.endTime - this.startTime) / 1000) + 'seconds';
	
	if(result == answears && ((this.endTime - this.startTime) / 1000) < this.FAST_AWARD)
	{
		$('#award_FAST').show('slow');
		closeModal();
		
	}
	
}