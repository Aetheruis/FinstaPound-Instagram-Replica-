<!-- front end of the registration form -->
<form action="PHP/register.php" method="POST">
    <p>Register</p>
    <input name="firstname" type ="text" placeholder="Name" required/>
    <br>
    <input name ="surname" type = "text" placeholder= "Surname" required/>
    <br>
    <input name="username" type="text" placeholder="username" required />
    <br>
    <input name="email" type="email" placeholder="email" required />
    <br>
    <!-- an input mask to determine the input format of the password -->
    <input name="password" id="psw1" title="Uppercase, Lowercase, number, more than 8"
            pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" type="password" placeholder="password" required />
        <br>
        <input 
        name="password2" id="psw2" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
        oninput="checkPasswordMatch()"
        type="password" placeholder="Re-type password" required
        />
        <p id="confirmation"></p>
        <input type="submit">
        
</form>