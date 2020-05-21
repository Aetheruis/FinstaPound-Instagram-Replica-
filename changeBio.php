<?php
//file is to change the Bio
require "sql/connect.php";
if (session_status() == PHP_SESSION_NONE) 
    {
    session_start();
    }

try{
    //initialise the variable bio to the input from the form
    $bio = $_POST['bio'];
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $id = $_SESSION["id"];
    //aquery fetches that coloumn by matching it to the current ID session variable
    $sql = "UPDATE userdata SET bio='$bio' WHERE id=$id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    header("Location: user.php");
    }

catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

