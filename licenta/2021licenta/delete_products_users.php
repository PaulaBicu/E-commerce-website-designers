<?php

include "includes/dbh.inc.php"; // Using database connection file here

$id_products = $_GET['id']; // get id through query string

$delprod = mysqli_query($conn,"DELETE from products where id_products = '$id_products';"); // delete query
echo mysqli_error($conn);

if($delprod)
{
    mysqli_close($conn); // Close connection
    header("location:profile.php"); 
    exit;	
}
else
{
    echo "Error deleting record"; // display error message if not delete
}

?>