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
$userId = $_SESSION["userid"];
?>

<button class="btn btn-default" style=" 
    width:50px;     
    position: absolute;
    top: 207px;
    left: 415px;" onclick="location.href='edit_profile.php?id=<?php echo $userId; ?>'">Edit</button>
<div><form>
<div class="profile-div">
    <section class="profile-form">
    <div class="container">
   <?php echo "<h2>Bun venit, " .$_SESSION['useruid']."</h2>"; ?>

    <form action="" method="post">

    </form>
    <div class="wrapper">
    <?php

        $q=mysqli_query($conn, "SELECT usersName, usersEmail, usersUid , usersDate FROM users where usersid= '$_SESSION[userid]';");
        $row=mysqli_fetch_assoc($q);
        echo "<table>";
            echo "<tr>";
                echo "<td>";
                    echo "<b> Nume: </b>";
                echo "</td>";

                echo "<td>";
                    echo $row['usersName'];
                echo "</td>";
            echo "</tr>";

            echo "<tr>";
                echo "<td>";
                    echo "<b> Email: </b>";
                echo "</td>";

                echo "<td>";
                    echo $row['usersEmail'];
                echo "</td>";
            echo "</tr>";

            echo "<tr>";
                echo "<td>";
                    echo "<b> UID: </b>";
                echo "</td>";

                echo "<td>";
                    echo $row['usersUid'];
                echo "</td>";
            echo "</tr>";

            echo "<tr>";
            echo "<td>";
                echo "<b> Data contului: </b>";
            echo "</td>";

            echo "<td>";
                echo $row['usersDate'];
            echo "</td>";
        echo "</tr>";
        echo "</table>"; 


    ?>
    <h2></h2>
    </div>

   <h3><i>Adaugă un produs</i></h3>
    <form action="#" name="productform" method="post">
        <input type="text" name="productname" placeholder="Numele produsului...">
        <input type="text" name="productdescription" placeholder="Descrierea produsului...">
        <input type="number" name="productprice" placeholder="Prețul produsului...">
        <input type="text" name="productimage" placeholder="Adauga URL-ul imaginii...">

        <button type="submit" name="productsubmit">Adaugă produs</button>
        


    </form>

     <?php

    if(isset($_POST['productsubmit']))
    {
    $productname=$_POST['productname'];
    $productdescription=$_POST['productdescription'];
    $productprice=$_POST['productprice'];
    $productimage=$_POST['productimage'];
    $ql="INSERT INTO products (id_products, name_products, description_products, price_products, image_products, usersId) VALUES (NULL,'$productname','$productdescription','$productprice', '$productimage', '$userId');";
    $result = mysqli_query($conn, $ql);
  
    if($result){
        echo "Produsul a fost introdus ";

    } 
    else{
        echo "Produsul nu a fost introdus ";
        echo mysqli_error($conn);
    }


    }
   ?>
<!--
    <br>
    <br>
    <h3><i>Adaugă un serviciu</i></h3>
    <form action="#" name="servicesform" method="post">
        <input type="text" name="servicesname" placeholder="Numele serviciului...">
        <input type="text" name="servicesdescription" placeholder="Descrierea serviciului...">
        <input type="number" name="servicesprice" placeholder="Prețul serviciului...">
        <input type="text" name="servicesimage" placeholder="Adauga URL-ul imaginii...">

        <button type="submit" name="servicesubmit">Adaugă serviciu</button>


    </form>
    
//    <?php
//   if(isset($_POST['servicesubmit']))
//    {
//    $servicename=$_POST['servicesname'];
//    $servicedescription=$_POST['servicesdescription'];
//    $serviceprice=$_POST['servicesprice'];
//    $serviceimage=$_POST['servicesimage'];
//    $ql="INSERT INTO services (id_services, name_services, description_services, price_services, image_services, usersId) VALUES (NULL,'$servicename','$servicedescription','$serviceprice', '$serviceimage', '$userId');";
//    $result = mysqli_query($conn, $ql);
  
//    if($result){
//        echo "Serviciul a fost introdus ";

//    } 
//    else{
//        echo "Serviciul nu a fost introdus ";
//        echo mysqli_error($conn);
//    }


//    }
   ?>
   -->
   <table class="table" style="margin-top: 50px;">
  <tr>
    <td><b>ID Produse</b></td>
    <td><b>Nume Produse</b></td>
    <td><b>Descriere Produse</b></td>
    <td><b>Pret Produse</b></td>
    <td><b>Imagine Produse</b></td>
    <td><b>Editeaza</b></td>
    <td><b>Sterge</b></td>
  </tr>
<?php
        $qprod=mysqli_query($conn, "SELECT id_products, name_products, description_products, price_products, image_products FROM products WHERE usersId= '$_SESSION[userid]';");
        echo mysqli_error($conn);
       while($rowprod=mysqli_fetch_assoc($qprod))
        {
            ?>
            <tr>
              <td><?php echo $rowprod['id_products']; ?></td>
              <td><?php echo $rowprod['name_products']; ?></td>
              <td><?php echo $rowprod['description_products']; ?></td>
              <td><?php echo $rowprod['price_products']; ?> lei</td>
              <td><img src ="<?php echo $rowprod['image_products']; ?>" width="100" height="100"></td>
              <td><a href="edit_produse_users.php?id=<?php echo $rowprod['id_products']; ?>">Editeaza</a></td>
              <td><a href="delete_products_users.php?id=<?php echo $rowprod['id_products']; ?>">Sterge</a></td>
           </tr>
           <?php
        }
        ?>
        </table>

<table class="table" style="margin-top: 50px;">
  <tr>
    <td><b>ID Comenzi</b></td>
    <td><b>Nume Client</b></td>
    <td><b>Email Client</b></td>
    <td><b>Telefon Client</b></td>
    <td><b>Oras Client</b></td>
    <td><b>Adresa Client</b></td>
    <td><b>Metoda de plata</b></td>
    <td><b>Produse</b></td>
    <td><b>Total de plata</b></td>
    <td><b>Data</b></td>

  </tr>
<?php
        $qorder=mysqli_query($conn, "SELECT id, name, email, phone, city, address, pmode, products, amount_paid, date FROM orders WHERE usersId= '$_SESSION[userid]';");
        echo mysqli_error($conn);
       while($roworder=mysqli_fetch_assoc($qorder))
        {
            ?>
            <tr>
              <td><?php echo $roworder['id']; ?></td>
              <td><?php echo $roworder['name']; ?></td>
              <td><?php echo $roworder['email']; ?></td>
              <td><?php echo $roworder['phone']; ?></td>
              <td><?php echo $roworder['city']; ?></td>
              <td><?php echo $roworder['address']; ?></td>
              <td><?php echo $roworder['pmode']; ?></td>
              <td><?php echo $roworder['products']; ?></td>
              <td><?php echo $roworder['amount_paid']; ?> lei</td>
              <td><?php echo $roworder['date']; ?></td>
           </tr>
           <?php
        }
        ?>
        </table>

</form>
</div>

    <?php
include("footer.php");
?>

</body>
</html>