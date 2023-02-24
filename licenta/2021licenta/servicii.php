<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bezal.el | skill, ability and knowledge in all kinds of crafts</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
<?php
include("header.php");
include("includes/dbh.inc.php");
?>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css" integrity="sha384-wESLQ85D6gbsF459vf1CiZ2+rr+CsxRY0RpiF1tLlQpDnAgg6rwdsUF1+Ics2bni" crossorigin="anonymous">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<div class='container'>
<div class='row text-center py-5'>
    
    <?php
   $queryServ = "SELECT s.name_services, s.description_services, s.price_services, s.image_services, us.usersName FROM services AS s JOIN users AS us ON us.usersId = s.usersId;";
   $result=mysqli_query($conn, $queryServ);

   while($qu = mysqli_fetch_assoc($result)){
     $name_services = $qu["name_services"];
     $description_services = $qu["description_services"];
     $price_services = $qu["price_services"];
     $image_services = $qu["image_services"];
     $usersName = $qu["usersName"];

echo "<div class='col-md-3 col-sm-6 my-3 my-md-0'>
        <form action='servicii.php' method='post'>
            <div class='card shadow'>
                <div>
                <img src='$image_services' class='img-fluid card-img-top'>
                </div>
                <h8> $usersName </h8>
                <div class= 'card-body'>
                <h5 class='card-title'>$name_services</h5>
                <h6>
                    <i class='fas fa-star'></i>
                    <i class='fas fa-star'></i>
                    <i class='fas fa-star'></i>
                    <i class='fas fa-star'></i>
                    <i class='far fa-star'></i>
                </h6>
                <p>$description_services</p>
                <h5><span class='price'>$price_services lei</h5>

                <button type='submit' class='btn btn-warning my-3' name='add'>Adaugă în coș <i class='fas fa-shopping-cart'></i></button>

                </div>
            </div>
        </form>
    </div>";

   }

?>

</div>
</div>

    <?php
include("footer.php");
?>

</body>
</html>