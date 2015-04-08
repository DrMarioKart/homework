<?php

$servername = "localhost";
$username = "homestead";
$password = "secret";
$database = "usernames";

$conn = mysqli_connect($servername, $username, $password, $database);

if(!$conn)
{
	die("Fission Mailed: Could not connect to database");
}

$name = $_POST['username'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];

$sql = "SELECT users FROM accounts";
$result = mysqli_query($conn, $sql);
if(checkName($result)){
	echo "<script>alert('Username already exists, pick another name'); window.location.href='index.php'; </script>";
}
else {
	if (verify($name, $email, $phone, $address))
	{
		$sql = "INSERT INTO accounts (users, email, phone, address) VALUES ('$name','$email','$phone','$address');";
		mysqli_query($conn, $sql);
		echo "<script>alert('New User Created Successfully'); window.location.href='index.php'; </script>";
	}
	else {
		echo "<script>alert('There was an error in your info, check requirements and try again'); window.location.href='index.php'; </script>";
	}
	
}
function verify($name, $email, $phone, $address){
	$pattern = "/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/";
	if (preg_match($pattern, $email)) 
	{}
	else 
	{
		return false;
	}
	if (strlen($name) < 5){
		return false;
	}

	if (strlen($address) < 2){
		return false;
	}

	if (!is10($phone)) {
		return false;
	}
	
	return true;
}

function is10($phone)
{	
	$counter = 0;
	for($i = 0; $i < strlen($phone); $i++) {
		if (is_numeric($phone[$i])){
			$counter += 1;
		}
	}

	if ($counter == 10) {
		return true;
	}
	else {
		return false;
	}
}

function checkName($result){
	while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
		$tempName = ($row['users']);
		if ($tempName == $_POST['username'])
		{
			return(true);
		}
	}
	return(false);
}


?>
