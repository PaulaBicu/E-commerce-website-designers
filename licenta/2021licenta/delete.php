<?php

include "includes/dbh.inc.php"; // Using database connection file here

$usersId = $_GET['id']; // get id through query string

$del = mysqli_query($conn,"DELETE from users where usersId = '$usersId'"); // delete query

if($del)
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

