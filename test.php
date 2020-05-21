<?php
    require "partials/meta.php";
    require "sql/connect.php";
    
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    
    if (!isset($_SESSION["username"])) {
        header("Location: index.php");
    }
    
    
    ?>
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
    
      echo "<img onclick='myBtn();currentSlide($printout3)' src='feedpics/$printout' alt='User's picture' id='feedpic'>";
     
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
<a class='prev' onclick='plusSlides(-1)'>&#10094;</a>
";
echo "Welcome: ".$printout2;
echo "Welcome: ".$printout3;
 echo "  
    <a class='next' onclick='plusSlides(1)'>&#10095;</a>
    ";
echo "</div>
<div class='modal-footer'>
  <h3>Modal Footer</h3>
</div>
</div>

</div>
";
     
?>
<script>
    var slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  var captionText = document.getElementById("caption");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  captionText.innerHTML = dots[slideIndex-1].alt;
}
    </script>
    </div> 
