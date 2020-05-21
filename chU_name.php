<?php
require "sql/connect.php";
if (session_status() == PHP_SESSION_NONE) 
    {
    session_start();
    }
try{
    $chu_name = $_POST['chu_name'];
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $id = $_SESSION["id"];
    $sql = "UPDATE userdata SET username='$chu_name' WHERE id=$id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    header("Location: user.php");
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }
