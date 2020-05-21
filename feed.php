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
?>
<button id="profileBtn" onclick="Profile()" >User Profile</button>
<button id="signoutBtn" onclick="SignOut()" >Click here to sign out</button>

<div id="gallery">
    <?php
    
    $sql4 = "SELECT * FROM feeddata";
    $stmt4 = $conn->prepare($sql4);
    $stmt4->execute();
    $stmt4->setFetchMode(PDO::FETCH_ASSOC);

    while ($r = $stmt4->fetch()) {
      
    $printout = $r['p_name'];
    $printout2= $r['username'];
    $printout3= $r['id'];
    
    if ($printout==null) {
        echo "Error getting the pictures";
    }else{
    
      echo "<img onclick='myBtn()' src='feedpics/$printout' alt='User's picture' id='feedpic'>";
     
  }
    }
    
    ?>
    <?php 
    
        echo "<div id='Modal' class='modal'>
    <div class='modal-content'>
<div class='modal-header'>
  <span class='close' onclick = 'clmyBtn()'>&times;</span>
  <h2>Modal Header</h2>
</div>
<div class='modal-body'>
<img onclick='clmyBtn()'  style='width:350px;height:350px;' src='feedpics/$printout'>";
echo "Welcome: ".$printout2;
echo "Welcome: ".$printout3;
echo "</div>
<div class='modal-footer'>
  <h3>Modal Footer</h3>
</div>
</div>

</div>
</div>
</div>";
     
    

    
?>
    </div> 
</div>
