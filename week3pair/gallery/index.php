<!DOCTYPE html>
<html>
<head>
<title>Custom Gallery</title>
<script src="jquery-1.11.0.min.js"></script>
<script src="lightbox.min.js"></script>
<link href="lightbox.css" rel="stylesheet" />
<style>
.thumb {
    width: 200px;
    height: 150px;
    overflow: hidden;
}
.thumb img {
    min-width: 200px;
    min-height: 150px;
    width: 200px;
}
</style>
</head>
<body>
	<h2>My Gallery</h2>

	<form action="upload.php">
    	<input type="submit" value="Upload Pictures">
	</form>
	<br>
<?php
$servername = "localhost";
$username = "homestead";
$password = "secret";
$database = "images";

$conn = mysqli_connect($servername, $username, $password, $database);
$sql = "SELECT filename FROM paths";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
    	$temp = $row["filename"];
    	echo("<a href='$temp' data-lightbox='gallery'><img class='thumb' src='$temp'></a>"); 
    }
}
?>

</body>
</html>