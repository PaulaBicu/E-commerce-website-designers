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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">
    
    $(document).ready(function(){


        $(".addItemBtn").click(function(e){
            e.preventDefault();
            var $form = $(this).closest(".form-submit");
            var pid = $form.find(".pid").val();
            var pname = $form.find(".pname").val();
            var pprice = $form.find(".pprice").val();
            var pimage = $form.find(".pimage").val();

            $.ajax({
                url: 'action.php',
                method: 'post',
                data: {pid:pid,pname:pname,pprice:pprice,pimage:pimage},
                success:function(response){
                    $("#message").html(response);
                    window.scrollTo(0,0);
                    load_cart_item_number();
                }
            });
        });
        });
            load_cart_item_number();

            function load_cart_item_number(){
                $ajax({
                    url: 'action.php',
                    method: 'get',
                    data: {cartItem:"cart_item"},
                    success:function(response){
                        $("#cart-item").html(response);
                    }
                });
            }

        </script>

<div id='message'></div>
<div class='container'>
<div class='row text-center py-5'>


<?php
   $queryProd = "SELECT p.id_products, p.name_products, p.description_products, p.price_products, p.image_products, us.usersName FROM products AS p JOIN users AS us ON us.usersId = p.usersId;";
   $result=mysqli_query($conn, $queryProd);

   while($qu = mysqli_fetch_assoc($result)){
     $id_products = $qu["id_products"];
     $name_products = $qu["name_products"];
     $description_products = $qu["description_products"];
     $price_products = $qu["price_products"];
     $image_products = $qu["image_products"];
     $usersName = $qu["usersName"];
     

echo "<div class='col-md-3 col-sm-6 my-3 my-md-0'>
        <form action='produse.php' class='form-submit' method='post' action='shopping_cart.php?action=add&id=$id_products'>
            <div class='card shadow'>
                <div>
                <img src='$image_products' class='img-fluid card-img-top'>
                </div>
                <h9> $usersName </h9>
                <div class= 'card-body'>
                <h5 class='card-title'>$name_products</h5>
                <h6>
                    <i class='fas fa-star'></i>
                    <i class='fas fa-star'></i>
                    <i class='fas fa-star'></i>
                    <i class='fas fa-star'></i>
                    <i class='far fa-star'></i>
                </h6>
                <div class='a'>
                <p>$description_products</p>
                </div>
                <h5><span class='price'>$price_products lei</h5>
                
                <input type='hidden' class='pid' name='hidden_name' value='$id_products'>
                <input type='hidden' class='pname' name='hidden_name' value='$name_products'>
                <input type='hidden' class='pprice' name='hidden_price' value='$price_products'>
                <input type='hidden' class='pimage' name='hidden_price' value='$image_products'>
                <button type='submit' class='btn btn-warning my-3 addItemBtn' name='add'>Adaugă în coș <i class='fas fa-shopping-cart'></i></button>

                </div>
            </div>
        </form>
    </div>";

   }

?>

<style> 
div.a {
    height: 100px;
    overflow-y: scroll;
    font-size: 15px;
    }
/* width */
::-webkit-scrollbar {
  width: 5px;
}

/* Track */
::-webkit-scrollbar-track {
  background: #f1f1f1; 
}
 
/* Handle */
::-webkit-scrollbar-thumb {
  background: #888; 
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #555; 
}

</style>

</div>
</div>

    <?php
include("footer.php");
?>

</body>
</html>