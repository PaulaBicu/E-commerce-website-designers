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

    $id = $_GET['id']; // get id through query string

    $qryorders = mysqli_query($conn,"SELECT * FROM orders WHERE id='$id'"); // select query
    
    $data = mysqli_fetch_array($qryorders); // fetch data
    
    if(isset($_POST['update'])) // when click on Update button
{
    $name = $_POST['nameOrder'];
    $email = $_POST['emailOrder'];
    $phone = $_POST['phoneOrder'];
    $city = $_POST['city'];
    $address = $_POST['adressOrder'];
    $pmode = $_POST['pmodeOrder'];
    $products = $_POST['productsOrder'];
    $amount_paid = $_POST['amountPaid'];
    $date = $_POST['dateOrder'];
	
    $edit = mysqli_query($conn,"UPDATE orders set name='$name', email='$email', phone='$phone', city='$city', address='$address', pmode='$pmode', products='$products', amount_paid='$amount_paid', date='$date' where id='$id'");
	
    if($edit)
    {
        mysqli_close($conn); // Close connection
        header("location:adminpage.php");
        exit;
    }
    else
    {
        echo mysqli_error();
    }    	
}
?>
<div class="container">
<h3>Update Data - Comenzi</h3>

<form method="POST">
  <input type="text" name="nameOrder" value="<?php echo $data['name'] ?>" placeholder="nameOrder" Required>
  <input type="text" name="emailOrder" value="<?php echo $data['email'] ?>" placeholder="emailOrder" Required>
  <input type="text" name="phoneOrder" value="<?php echo $data['phone'] ?>" placeholder="phoneOrder" Required>
  <input type="text" name="city" value="<?php echo $data['city'] ?>" placeholder="city" Required>
  <input type="text" name="adressOrder" value="<?php echo $data['address'] ?>" placeholder="adressOrder" Required>
  <input type="text" name="pmodeOrder" value="<?php echo $data['pmode'] ?>" placeholder="pmodeOrder" Required>
  <input type="text" name="productsOrder" value="<?php echo $data['products'] ?>" placeholder="productsOrder" Required>
  <input type="text" name="amountPaid" value="<?php echo $data['amount_paid'] ?>" placeholder="amountPaid" Required>
  <input type="text" name="dateOrder" value="<?php echo $data['date'] ?>" placeholder="dateOrder" Required>
  <input type="submit" name="update" value="Update">
</form>
</div>
</body>
</html>
