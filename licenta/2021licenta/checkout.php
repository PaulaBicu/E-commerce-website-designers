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

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css" integrity="sha384-wESLQ85D6gbsF459vf1CiZ2+rr+CsxRY0RpiF1tLlQpDnAgg6rwdsUF1+Ics2bni" crossorigin="anonymous">
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<?php
include("header.php");
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">
    
    $(document).ready(function(){

        $("#placeOrder").submit(function(e){

            e.preventDefault();
            $.ajax({
                url: 'action.php',
                method: 'post',
                data: $('form').serialize()+"&action=order",
                success: function(response){
                    $("#order").html(response);
                }
            });
        });
    });
</script>

<?php
    require 'includes/dbh.inc.php';

    $grand_total = 0;
    $allItems = '';
    $items = array();

    $sql = "SELECT CONCAT(name_products, '(',qty,')') AS ItemQty, total_price FROM cart";
    $stmt = $conn -> prepare($sql);
    $stmt->execute();
    $result = $stmt -> get_result();
    while($qu = $result -> fetch_assoc()){
        $grand_total += $qu['total_price'];
        $items[] = $qu['ItemQty'];
    }
    $allItems = implode(", ", $items);

?>

<div class="container">
    <div class="row justify-content-center">
        <div class = "col-lg-6.px-4 pb-4" id="order">
        <h3 class="text-center"><b> Completează-ți comanda!</b></h3>
        <div class = "jumbotron p-3 mb-2 text-center">
            <h6 class="lead"><b> Produse: </b><?= $allItems; ?></h6>
           <!-- <h6 class="lead"><b>Delevery Charge : </b></h6> -->
           <h5><b>Total de plată : </b> <?= number_format($grand_total,2) ?> RON</h5>
            </div>
            <form action="" method="post" id="placeOrder">
                <input type="hidden" name="products" value="<?=$allItems; ?>">
                <input type="hidden" name="grand_total" value="<?=$grand_total; ?>">
                <div class="form-group">  
                    <input type="text" name="name" class="form-control" placeholder="Introduceți numele și prenumele..." required>
                </div>
                <div class="form-group">  
                    <input type="email" name="email" class="form-control" placeholder="Introduceți email-ul..." required>
                </div>
                <div class="form-group">  
                    <input type="tel" name="phone" class="form-control" placeholder="Introduceți numărul de telefon..." required>
                </div>
                <div class="form-group">  
                    <textarea name="city" class="form-control" placeholder="Introduceți orașul de livrare"></textarea>
                </div>
                <div class="form-group">  
                    <textarea name="address" class="form-control" rows="3" cols="10" placeholder="Introduceți adresa de livrare"></textarea>
                </div>
                    <h6 class="text-center lead">Selectează metoda de plată</h6>
                    <div class="form-group">
                        <select name="pmode" class="form-control">
                            <option value="" selected disabled>- Selectează metoda de plată -</option>
                            <option value="cod">Ramburs</option>
                            <option value="netbanking">Net Banking</option>
                            <option value="cards">Debit/Credit Card</option>
                        </select>
                    </div>
                    <div class="form-group">
                    <div class="text-center lead">
                        <input type="submit" name="submit" value="Plasează comanda">
                    </div>
                    </div>
            </form>
        </div>
    </div>
</div>

<?php
include("footer.php");
?>

</body>
</html>