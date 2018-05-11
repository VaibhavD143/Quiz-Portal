// Contains all the required javascript
$(document).ready(function(){
    $('.sidenav').sidenav();
	$('.tooltipped').tooltip();
	console.log($('[id^="button-"]').length);
	if($('[id^="button-"]').length){
		console.log("found");
		$('#button-Questions').click(function(){
			$('#Questions').css('display','block');
			$('#Profile').css('display','none');
			$('#Rules').css('display','none');
		});

		$('#button-Profile').click(function(){
			$('#Questions').css('display','none');
			$('#Profile').css('display','block');
			$('#Rules').css('display','none');
		});

		$('#button-Rules').click(function(){
			$('#Questions').css('display','none');
			$('#Profile').css('display','none');
			$('#Rules').css('display','block');
		});
	}
});
