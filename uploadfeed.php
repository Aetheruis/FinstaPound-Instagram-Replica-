<?php
    
    require "SQL/connect.php";

if (session_status() == PHP_SESSION_NONE) 
    {
    session_start();
    }
if ($_FILES["file"]["error"] > 0)
{
echo "Error: " . $_FILES["file"]["error"] . "<br />";
}

try{
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $fpicture= $_FILES["file"]["name"];
    $username= $_SESSION['username'];
    
    $sql = "INSERT INTO feeddata(p_name, username) VALUES($fpicture, $username)";
    $stmt = $conn->prepare($sql);
    $conn->exec($sql);
    }
    catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$target_dir = "feedpics/";
$target_file = $target_dir . basename($_FILES["file"]["name"]);
move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);

$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if(isset($_POST["submit1"])) {
    $check = getimagesize($_FILES["file"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
if ($_FILES["file"]["size"] > 5000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";

    } else {
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["file"]["name"]). " has been uploaded.";
        
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

try{
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $fpicture= $_FILES["file"]["name"];
    $username= $_SESSION['username'];
    
    $sql = "INSERT INTO feeddata(p_name, username) VALUES('$fpicture', '$username')";
    $stmt = $conn->prepare($sql);
    $conn->exec($sql);
    }
    catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }
header("Location: feed.php");
?>