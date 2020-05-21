<div class="followupbg">
    <?php
    require "sql/connect.php";
    require "partials/meta.php";
    require "partials/header.php";
    ?>
<div class="forms">
Change your username:
    <br/>
    <form action ="chU_name.php" method="POST">
        <input type="textbox" name="chu_name" id="chu_name">
        <input type = "submit" value="SUBMIT" name= "submit">
    </form>
</div>

<div class="forms">
Change your profile Picture:
    <br/>
    <form action="uploadpfp.php" method="post" enctype="multipart/form-data">
        <input type="file" name="file" id="file">
        <input type="submit" value="Upload Image" name="submit">
    </form>
</div>

<div class="forms">
Change your bio:
    <br/>
    <form action ="changeBio.php" method="POST">
        <input type="textbox" name="bio" id="chBio">
        <input type = "submit" value="SUBMIT" name= "submit">
    </form>
</div>

<button onclick="Back()">Back</button>
</div>