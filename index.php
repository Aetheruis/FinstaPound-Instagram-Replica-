<!DOCTYPE html>
<html>
    <head>
    <div class="firstpage">
        <?php
            require "partials/header.php";
            require "partials/meta.php";
            if (session_status() == PHP_SESSION_NONE) {
             session_start();
             session_destroy();
            }
        ?>
    </head>
    <body>
        
        
        <br>
        
        <?php
            require "partials/login_form.php";
            require "partials/register_form.php";
        ?>
        
        </div>
    </body>
</html>