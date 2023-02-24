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

    $id_products = $_GET['id']; // get id through query string

    $qry = mysqli_query($conn,"SELECT * FROM products WHERE id_products='$id_products'"); // select query
    
    $data = mysqli_fetch_array($qry); // fetch data
    
    if(isset($_POST['update'])) // when click on Update button
{
    $name_products = $_POST['nameProducts'];
    $description_products = $_POST['descriptionProducts'];
    $price_products = $_POST['priceProducts'];
    $image_products = $_POST['imageProducts'];
	
    $edit = mysqli_query($conn,"UPDATE products set name_products='$name_products', description_products='$description_products', price_products='$price_products', image_products='$image_products' where id_products='$id_products'");
	
    if($edit)
    {
        mysqli_close($conn); // Close connection
        header("location:profile.php");
        exit;
    }
    else
    {
        echo mysqli_error();
    }    	
}
?>
<div class="container">
<h3>Update Data - Produse Utilizator</h3>

<form method="POST">
  <input type="text" name="nameProducts" value="<?php echo $data['name_products'] ?>" placeholder="nameProducts" Required>
  <input type="text" name="descriptionProducts" value="<?php echo $data['description_products'] ?>" placeholder="descriptionProducts" Required>
  <input type="text" name="priceProducts" value="<?php echo $data['price_products'] ?>" placeholder="priceProducts" Required>
  <input type="text" name="imageProducts" value="<?php echo $data['image_products'] ?>" placeholder="imageProducts" Required>
  <input type="submit" name="update" value="Update">
</form>
</div>
</body>
</html>

