<?php
$servername = "localhost";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$servername", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "CREATE DATABASE maindata";
    $conn->exec($sql);
    echo "Database created successfully<br>";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;
?>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "maindata";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "CREATE TABLE userdata (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    pfpicture	VARCHAR(256) NOT NULL,
    name VARCHAR(250) NOT NULL,
    surname VARCHAR(250) NOT NULL,
    email VARCHAR(250),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    username	varchar(256),
    password	varchar(255),
	bio	varchar(256)	
    )";

    $conn->exec($sql);
    echo "Table userdata created successfully";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;
?>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "maindata";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "CREATE TABLE feeddata (
        id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        p_name VARCHAR(250) NOT NULL,
        post_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        username VARCHAR(256),
        caption VARCHAR(256)
        )";
    
        $conn->exec($sql);
        echo "Table userdata created successfully";
        }
    catch(PDOException $e)
        {
        echo $sql . "<br>" . $e->getMessage();
        }

        ?>