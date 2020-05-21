//A simple function to check to see if the passwords match, ie if password 1(psw1) ==password2(psw2)
function checkPasswordMatch() {
    if (document.getElementById("psw1").value == document.getElementById("psw2").value) {
        //if the passwords match then it will send text to the placeholder confirmation
        document.getElementById("confirmation").innerHTML = "Passwords match";
    } else {
        document.getElementById("confirmation").innerHTML = "Passwords don't match";
    }
}
//Function to just send the user back to a certain page
function Back(){
    window.location.href = "http://localhost/user.php";
    }
//function to bring a popup window asking if you want to sign out and then destroys your session. If you click Yes.
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
//Takes the user to the Feed page
function Feed(){
    window.location.href= "http://localhost/feed.php";
}
//Takes the user to the Settings page
function Settings(){
    window.location.href= "http://localhost/settings.php";
}
//Takes the user to the Profile page
function Profile(){
    window.location.href = "http://localhost/user.php";
    }
//Following functions are for the opening and closing of the modals:
function myBtn() {
    document.getElementById("Modal").style.display= "block";
  }
function clmyBtn(){
    document.getElementById("Modal").style.display= "none";
  }