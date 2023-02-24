<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bezal.el | skill, ability and knowledge in all kinds of crafts</title>
    <link rel="stylesheet" href="css/main.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<?php
include("header.php");
include("includes/dbh.inc.php");
$usersId = $_SESSION["userid"];
$level = $_SESSION['level'];
if($level < 1){
  echo "Nu detineti admin!";
}
else{

?>


<div><form>
<div class= "container">
<h2>Pagina de Admin</h2>

<input type="button" onclick="location.href='adminpage_utilizatori.php';" value="Utilizatori" >
<input type="button" onclick="location.href='adminpage_produse.php';" value="Produse" >
<input type="button" onclick="location.href='adminpage_comenzi.php';" value="Comenzi" >
<input type="button" onclick="location.href='adminpage_pmode.php';" value="Cea mai folosită metodă de plată" >
<input type="button" onclick="location.href='adminpage_city.php';" value="Orașele cu cea mai mare putere de cumpărare" >
<input type="button" onclick="location.href='adminpage_date.php';" value="Utilizatorii inscrisi pe o perioada de timp" >


    <?php
include("footer.php");
}
?>

</body>
</html>