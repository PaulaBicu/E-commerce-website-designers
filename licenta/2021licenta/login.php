<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bezal.el | skill, ability and knowledge in all kinds of crafts</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
    
<?php
include("header.php");
?>
<div class="login-div">
    <section class="signup-form">
    <div class="container">
    <h2>Autentificare</h2>
    <form action="includes/login.inc.php" method="post">
        <input type="text" name="uid" placeholder="Nume de utilizator/Email...">
        <input type="password" name="pwd" placeholder="Parola...">
        <button type="submit" name="submit">Autentificare</button>
        <h5> Nu ești încă membru? <a href="signup.php">Alătură-te acum! </a></h5>
    </form>

    <?php
        if(isset($_GET["error"])){
            if($_GET["error"] == "emptyinput"){
                echo "<p>Fill in all fields!</p>";
            }
            else if ($_GET["error"] == "wronglogin"){
                echo "<p>Incorrect login information!</p>";
            }
        }
    ?>

    <section>
    </div>

</div>
<?php
include("footer.php");
?>

</body>
</html>