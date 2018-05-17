var started = false;
var save_delay = 30;

$(document).ready(function(){

	var elems = document.querySelectorAll('.modal');
	var instances = M.Modal.init(elems, {dismissible: false});

	if(getCookie("time_started")){
		started = true;
	}

	if($('[id^="button-"]').length){

		$('#button-Questions').click(function(){
			if(started){
				showQuestions();
			}
		});

		$('#button-Profile').click(function(){
			showProfile();
		});

		$('#button-Rules').click(function(){
			showRules();
		});
	}

	$('.profile').click(function(){
		showProfile();
	});

	if(started){
		showQuestions();
		startCountdown();
		$('#start-button').attr("disabled","");
		$("#start-timer").html("Quiz Started");
	}
	else{
		$('#start-button').attr("disabled","");
		var count = 10;
		var x = setInterval(function(){
			$("#start-timer").html("00:"+count);
			if(count<=0){
				$('#start-button').removeAttr("disabled","");
				$("#start-timer").html("");
				clearInterval(x);
			}
			count--;
		}, 1000);
	}

	$('#start-button').click(function(){
		startQuiz();
		showQuestions();
		$('#start-button').attr("disabled","");
		$("#start-timer").html("Quiz Started");
	});

	$('#stop-quiz-button').click(function(){
		$('#forced-finish-modal').modal('open');
	});
	$('#auto-finish').click(function(){
		stopQuiz();
	});
	$('#forced-finish').click(function(){
		stopQuiz();
	});


});

function startQuiz(){
	started = true;
	var d = new Date();
	var time_started = d.getTime();
	sendStartTime(time_started);
	setCookie("time_started", time_started, 1);
	startCountdown();
}

function startCountdown(){
	var x = setInterval(function(){
		var quiz_duration = parseInt(getCookie("quiz_duration"));
		var time_elapsed = 0;

		if(getCookie("time_elapsed")!=''){
			time_elapsed = parseInt(getCookie("time_elapsed"));
		}

		var time_show = quiz_duration - time_elapsed;

		$("#quiz-countdown").html(Math.floor(time_show/3600) + ' : ' + Math.floor((time_show%3600)/60) + ' : ' + Math.floor((time_show%3600)%60));
		$("#profile-quiz-countdown").html(Math.floor(time_show/3600) + ' : ' + Math.floor((time_show%3600)/60) + ' : ' + Math.floor((time_show%3600)%60));
		time_elapsed += 1;
		setCookie("time_elapsed", time_elapsed, 1);

		if(time_elapsed%save_delay == 0){
			console.log("hii");
			persistData();
		}

		if(time_show <= 0){
			$('#auto-finish-modal').modal('open');
			clearInterval(x);
		}
	}, 1000);
}

function persistData(){
	var time_elapsed = parseInt(getCookie("time_elapsed"));

	$.post( "ajax_handler.php", $( "#question-form" ).serialize() ).done(function( data ) {
    	console.log( "Data Loaded: " + data );
	});;
}

function stopQuiz(){
	persistData();
	var d = new Date();
	var time_completed = d.getTime();
	setCookie('time_completed', time_completed, 1);
	window.location = "finish.php";
}

function sendStartTime(time){
	$.post("ajax_handler.php",
    {
        action: "quiz_start",
        time_started: time
    },
    function(data, status){
        console.log("Data: " + data + "\nStatus: " + status);
    });
}

function showQuestions(){
	$('#Questions').css('display','block');
	$('#Profile').css('display','none');
	$('#Rules').css('display','none');
}

function showRules(){
	$('#Questions').css('display','none');
	$('#Profile').css('display','none');
	$('#Rules').css('display','block');
}

function showProfile(){
	$('#Questions').css('display','none');
	$('#Profile').css('display','block');
	$('#Rules').css('display','none');
}
