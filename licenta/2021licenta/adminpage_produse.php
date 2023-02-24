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
<h3>Produse</h3>
<table border="1">
  <tr>
    <td><b>ID Produs</b></td>
    <td><b>Nume Produs</b></td>
    <td><b>Descriere Produs</b></td>
    <td><b>Pret Produs</b></td>
    <td><b>Imagine Produs</b></td>
    <td><b>Editeaza</b></td>
    <td><b>Sterge</b></td>
  </tr>

  <?php
  $records=mysqli_query($conn,"SELECT * FROM products");
  while($data=mysqli_fetch_array($records))
  {
      ?>
      <tr>
        <td><?php echo $data['id_products']; ?></td>
        <td><?php echo $data['name_products']; ?></td>
        <td><?php echo $data['description_products']; ?></td>
        <td><?php echo $data['price_products']; ?> lei</td>
        <td><img src="<?php echo $data['image_products']; ?>" width="50"></td>
        <td><a href="editproduse.php?id=<?php echo $data['id_products']; ?>">Editeaza</a></td>
        <td><a href="delete_products.php?id=<?php echo $data['id_products']; ?>">Sterge</a></td>
     </tr>
     <?php
  }
  ?>
  </table>
  
</div>
</form>
</div>



    <?php
include("footer.php");
}
?>

</body>
</html>