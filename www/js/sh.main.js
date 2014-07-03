$(function(){
	$("body").delegate("#join", "click", function(){
		$.ajax({
			"url": "http://api.syshooks.com/",
			"type": "post",
			"data": {
				"action": "Create",
				"target": "Account",
				"fname": "Unknown",
				"lname": "",
				"password": $("#email").val(),
				"email": $("#email").val(),
				"username": $("#email").val()
			}
		}).done(function(){
			$("#emailInputContainer").children().fadeOut();
			$("#emailInputContainer").text("Thanks! We'll keep in touch");
		}).fail(function(){
			$("#emailInputContainer").children().fadeOut();
			$("#emailInputContainer").text("There was an error! Try again later.");
		});
	});
});