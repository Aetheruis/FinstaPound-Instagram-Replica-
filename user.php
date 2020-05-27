<div class="followupbg">
<?php
    require "sql/connect.php";
  
    require "partials/meta.php";
    require "partials/header.php";
    
        
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    
    if (!isset($_SESSION["username"])) {
        header("Location: index.php");
    }
    
    $id = $_SESSION["id"];
    $sql1 = "SELECT pfpicture FROM userdata WHERE id=$id";
    $stmt1 = $conn->prepare($sql1);
    $stmt1->execute();
    $stmt1->setFetchMode(PDO::FETCH_ASSOC);

    while ($r = $stmt1->fetch()) {
        $printout = $r['pfpicture'];
        if ($printout==null) {
            echo "<img src='uploads/default.jpg' alt='Default pic'>";
        }else{
        echo "<img src='uploads/$printout' alt='User's picture'>"; 
        }
    }
   
    echo "<br/> <div class='box'>";
    echo "">
    $sql2 = "SELECT username, email, reg_date FROM userdata WHERE id=$id";
    $stmt2 = $conn->prepare($sql2);
    $stmt2->execute();
    $stmt2->setFetchMode(PDO::FETCH_ASSOC);

    while ($r = $stmt2->fetch()) {
        echo "Welcome ".$r['username'];
        echo "<br/>";
        echo "E-mail: ".$r['email'];
        echo "<br/>";
        echo "Date Joined: ".$r['reg_date'];
    }
    echo "<br/>";
 
    $sql3 = "SELECT bio FROM userdata WHERE id=$id";
    $stmt3 = $conn->prepare($sql3);
    $stmt3->execute();
    $stmt3->setFetchMode(PDO::FETCH_ASSOC);

    while ($r = $stmt3->fetch()) {
        echo  $r['bio'];
    }
    echo "</div><br/>";
    echo ""
?>
<button id='linkBtn' onclick="Settings()"> Click here to change your settings</button>

<form action="uploadfeed.php" method="post" enctype="multipart/form-data">
        <input type="file" name="file" id="file1" required>
        <input type="textbox" name="caption" id="caption1" placeholder="Caption" required>
        <input type="submit" value="Upload To Your Feed" name="submit1">
</form>

<button id="feedBtn" onclick="Feed()" >Click here to go to your feed</button>
<br/><br/>
<button id="signoutBtn" onclick="SignOut()" >Click here to sign out</button>
<H2>My Feed</H2>
<?php
    
    $username = $_SESSION["username"];
    $sql4 = "SELECT p_name,caption,post_date FROM feeddata WHERE username='$username'";
    $stmt4 = $conn->prepare($sql4);
    $stmt4->execute();
    $stmt4->setFetchMode(PDO::FETCH_ASSOC);

    while ($r = $stmt4->fetch()) {
        $printout = $r['p_name'];
        $printout2= $r['caption'];
        $printout3= $r['post_date'];
        if ($printout==null) {
            echo "<img src='feedpics/default.jpg' alt='Default pic'>";
        }else{
            echo "<img src='feedpics/$printout' alt='User's picture'>"; 
            echo "<br/>";
            echo $printout2;
            echo "<br/>";
            echo $printout3;
        }
    }
    ?>
</div>