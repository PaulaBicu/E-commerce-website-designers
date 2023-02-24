<?php

include "includes/dbh.inc.php"; // Using database connection file here

$id = $_GET['id']; // get id through query string

$delorders = mysqli_query($conn,"DELETE from orders where id = '$id';"); // delete query
echo mysqli_error($conn);

if($delorders)
{
    mysqli_close($conn); // Close connection
    header("location:adminpage.php"); 
    exit;	
}
else
{
    echo "Error deleting record"; // display error message if not delete
}

?>