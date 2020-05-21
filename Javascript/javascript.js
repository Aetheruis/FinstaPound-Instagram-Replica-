function checkPasswordMatch() {
    if (document.getElementById("psw1").value == document.getElementById("psw2").value) {
        document.getElementById("confirmation").innerHTML = "Passwords match";
    } else {
        document.getElementById("confirmation").innerHTML = "Passwords don't match";
    }
}

function Back(){
    window.location.href = "http://localhost/user.php";
    }
function SignOut(){
    if (confirm("Are you sure you want to Sign Out?")) {
 
        window.location.href="http://localhost/index.php";
        session_destroy();
          } 
          }
      var button = document.getElementById('linkBtn');
      
      button.onclick = Link;
      
      function Link() {
      var name = this.getAttribute('data-name');
      
      window.location.href= name;
      }
function Feed(){
    window.location.href= "http://localhost/feed.php";
}
function Settings(){
    window.location.href= "http://localhost/settings.php";
}

function Profile(){
    window.location.href = "http://localhost/user.php";
    }

    function myBtn() {
      document.getElementById("Modal").style.display= "block";
  }
  function clmyBtn(){
      document.getElementById("Modal").style.display= "none";
  }