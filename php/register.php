<?php

    require "../SQL/connect.php";

    $firstname = $_POST['firstname'];
    $surname = $_POST["surname"];
    $username = trim($_POST["username"]);
    $email = strtolower(trim($_POST["email"]));
    $password = $_POST["password"];
    $password2 = $_POST["password2"];

    $password = password_hash($password, PASSWORD_DEFAULT);
    
    try {
        $stmt = $conn->prepare("SELECT * FROM userdata WHERE email = :email"); 
        $stmt->execute([":email" => $email]);
        
        if ($stmt->rowcount() > 0) {
            echo "Error: Email Exists";
        }   
        else if ($stmt->rowcount() == 0) {
            $stmt = $conn->prepare("INSERT INTO userdata (name, surname, password, email, username) VALUES (:name, :surname, :password, :email, :username)" );
            $stmt->execute([":name" => $firstname, ":surname" => $surname, ":password" => $password, ":email" => $email, ":username" => $username]);
            header("Location: ../index.php");
        }
    } catch(PDOException $e) {
        echo "Error: SQL didnt execute";
    }

?>