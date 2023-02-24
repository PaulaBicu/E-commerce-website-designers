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



<div><form>
<div class= "container">
<h3>Cea mai folosită metodă de plată</h3>
<table>
<tr>
<td><b>Metoda de plată</b></td>
<td><b>Numarul de comenzi in care se regaseste metoda de plata</b></td>
<td><b>Procentaj</b></td>
</tr>
<?php
$totalorders = mysqli_query($conn,"SELECT COUNT(id) AS countid FROM orders");
$datatotal=mysqli_fetch_array($totalorders);
$records=mysqli_query($conn,"SELECT COUNT(pmode) AS countp, pmode FROM orders GROUP BY pmode ORDER BY countp DESC LIMIT 1");
$data=mysqli_fetch_array($records);
$totalorders= $datatotal['countid'];
$pmode = $data['pmode'];
$procent = ($data['countp']/$totalorders)*100;
$round_procent = number_format((float)$procent, 2, '.', '');

if( $pmode == 'cod'){
  $pmode = 'Ramburs';
}else if( $pmode == 'netbanking'){
  $pmode = 'Transfer bancar';
}else {
  $pmode = 'Plată cu cardul';
}
      ?>
      <tr>
        <td><?php echo $pmode; ?></td>
        <td><?php echo $data['countp']; ?></td>
        <td><?php echo $round_procent; ?> %</td>
      <tr>

</table>
</div></form>

    <?php
include("footer.php");
}
?>

</body>
</html>