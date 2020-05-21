<!-- back-end of the register form -->
<?php

    require "../SQL/connect.php";
//initialises the variables to what the results were from the form
    $firstname = $_POST['firstname'];
    $surname = $_POST["surname"];
    $username = trim($_POST["username"]);
    $email = strtolower(trim($_POST["email"]));
    $password = $_POST["password"];
    $password2 = $_POST["password2"];
//encrypts the password remove it to turn back to plain text
    $password = password_hash($password, PASSWORD_DEFAULT);
    
    try {
        $stmt = $conn->prepare("SELECT * FROM userdata WHERE email = :email"); 
        $stmt->execute([":email" => $email]);
        
        if ($stmt->rowcount() > 0) {
            echo "Error: Email Exists";
        }   
        //this section is to insert data into the database
        else if ($stmt->rowcount() == 0) {
            $stmt = $conn->prepare("INSERT INTO userdata (name, surname, password, email, username) VALUES (:name, :surname, :password, :email, :username)" );
            $stmt->execute([":name" => $firstname, ":surname" => $surname, ":password" => $password, ":email" => $email, ":username" => $username]);
            header("Location: ../index.php");
        }
    } catch(PDOException $e) {
        echo "Error: SQL didnt execute";
    }

?>