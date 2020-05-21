<?php
require "sql/connect.php";
if (session_status() == PHP_SESSION_NONE) 
    {
    session_start();
    }

try{
    $bio = $_POST['bio'];
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $id = $_SESSION["id"];
    $sql = "UPDATE userdata SET bio='$bio' WHERE id=$id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    header("Location: user.php");
    }

catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

