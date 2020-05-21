<?php
//this file is to connect to the database
//initialises the variables
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "maindata";
//try and connect to the database
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "<script>
                console.log('Database connected successfully');
              </script>";
    }
    //else notify in the console log that something went wrong
    catch(PDOException $e) {
        echo "<script>
                console.log('Database not connected');
              </script>";
    }

?>