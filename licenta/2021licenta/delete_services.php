<?php

include "includes/dbh.inc.php"; // Using database connection file here

$id_services = $_GET['id']; // get id through query string

$delserv = mysqli_query($conn,"DELETE from services where id_services = '$id_services';"); // delete query
echo mysqli_error($conn);

if($delserv)
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