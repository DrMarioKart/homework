<!DOCTYPE html>
<html>
<body>

<form action="upload.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>
<br>
<form action="index.php">
    <input type="submit" value="View uploaded pictures">
</form>
<br>

<?php
$servername = "localhost";
$username = "homestead";
$password = "secret";
$database = "images";
$sql = '';

$conn = mysqli_connect($servername, $username, $password, $database);

if(isset($_POST["submit"])) {
    $target_dir = "imgs/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    $temp = '';

    if($check !== false) 
    {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) 
        {
            echo "Only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
    } 
    else 
    {
        echo "File is not an image.";
        $uploadOk = 0;
    }
    if ($uploadOk == 0) 
    {
        echo "Sorry, your file was not uploaded.";
    } 
    else 
    {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) 
        {
            echo " The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
            $temp = "imgs/" . basename( $_FILES["fileToUpload"]["name"]);
            $sql = "INSERT INTO paths (filename) VALUES ('$temp')";
            mysqli_query($conn, $sql);
        } 
        else 
        {
            echo " Sorry, there was an error uploading your file.";
        }
    }
}
?>
</body>
</html>


