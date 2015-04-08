<!DOCTYPE html>
<html>

<head>
	<title>New User Signup Form</title>
	<script src="http://code.jquery.com/jquery-2.1.3.js"></script>
<style>
#error {
	color: red;
}
</style>
</head>
<body>
	<h2>New User Signup</h2>
<form action="entry.php" method="post" onsubmit="return validateForm()">
	<label>Username: </label>
	<input type="text" name="username" id="username" value="must be 5 characters" /><br>
	<label>Email: </label>
	<input type="text" name="email" id="email" value="bob@example.com"/><br>
	<label>Phone: </label>
	<input type="text" name="phone" id="phone" value="xxx-xxx-xxxx" /><br>
	<label>Address: </label>
	<input type="text" name="address" id="address" value="must be 2 characters" /><br>
	<input type="submit" value="Submit" id="enter"/>
</form>

<div id="error"></div>
<script>
$(document).ready(function(){
	$("#enter").click(function() {
		errors = new Array();
		email = $("#email").val();
		email = validateEmail(email);
		if (email == false) {
			errors.push("Email is not valid");
		}
		name = $("#username").val();
		if (name.length < 5) {
			errors.push("username must be 5 or more chars");
		}
		
		numbers = $("#phone").val();
		if (is10numbers(numbers) == false) {
		 	errors.push("phone number must contain exactly 10 numbers");
		}

		address = $("#address").val();
		if (address.length < 2) {
			errors.push("address must be at least 2 chars");
		}
		
	});
});

function validateEmail(mail){        
   var Pattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;  
   return Pattern.test(mail);  
}

function is10numbers(numbers){
	var counter = 0;
	for (i = 0; i<numbers.length; i++) {
		if (!isNaN(numbers.charAt(i))) {
			counter += 1;
		}
	}
	if (counter == 10) {
		return(true);
	}
	else{
		return(false);
	}
}

function validateForm() {
	errorMessage = '<br>';
	if (errors.length != 0){
		for (i = 0; i < errors.length; i++){
			errorMessage = errorMessage + errors[i] + "<br>"; 
		}
		$("#error").html(errorMessage);
		alert("there are errors in your info mofo");
		return(false);
	}
	else
	{
		return(true);
	}
}

</script>

</body>

</html>

