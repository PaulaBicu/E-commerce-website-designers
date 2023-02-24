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
<div class="signup-div">
    <section class="signup-form">
    <div class="container">
    <h2>Înregistare</h2>
    <form action="includes/signup.inc.php" method="post">
        <input type="text" name="name" placeholder="Numele complet...">
        <input type="text" name="email" placeholder="Email...">
        <input type="text" name="uid" placeholder="Numele de utilizator...">
        <input type="password" name="pwd" placeholder="Parola...">
        <input type="password" name="pwdrepeat" placeholder="Repeta parola...">
        <button type="submit" name="submit">Înregistare</button>
        <h5> Ești deja membru? <a href="login.php"> Autentifică-te aici! </a> </h5>

    </form>

    <?php
        if(isset($_GET["error"])){
            if($_GET["error"] == "emptyinput"){
                echo "<p>Fill in all fields!</p>";
            }
            else if ($_GET["error"] == "invaliduid"){
                echo "<p>Choose a proper username!</p>";
            }
            else if ($_GET["error"] == "invalidemail"){
                echo "<p>Choose a proper email!</p>";
            }
            else if ($_GET["error"] == "passworddontmatch"){
                echo "<p>Password doesn't match!!</p>";
            }
            else if ($_GET["error"] == "stmtfailed"){
                echo "<p>Something went wrong. Try again!</p>";
            }
            else if ($_GET["error"] == "usernametaken"){
                echo "<p>Username already taken!</p>";
            }
            else if ($_GET["error"] == "none"){
                echo "<p>You have signed up!</p>";
            }
        }
    ?>

    <section>
    </div>

<?php
include("footer.php");
?>

</body>
</html>