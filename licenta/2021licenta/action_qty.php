<?php

session_start();
require 'includes/dbh.inc.php';

// Set total price of the product in the cart table
	if (isset($_POST['qty'])) {
        $qty = $_POST['qty'];
        $pid = $_POST['pid'];
        $pprice = $_POST['pprice'];
  
        $tprice = $qty * $pprice;
  
        $stmt = $conn->prepare('UPDATE cart SET qty=?, total_price=? WHERE id_products=?');
        $stmt->bind_param('isi',$qty,$tprice,$pid);
        $stmt->execute();

      }

?>