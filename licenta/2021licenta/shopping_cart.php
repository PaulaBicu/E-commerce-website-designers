<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bezal.el | skill, ability and knowledge in all kinds of crafts</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css" integrity="sha384-wESLQ85D6gbsF459vf1CiZ2+rr+CsxRY0RpiF1tLlQpDnAgg6rwdsUF1+Ics2bni" crossorigin="anonymous">
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<?php
include("header.php");
include("includes/dbh.inc.php");
$userId = $_SESSION["userid"];
?>
    
    <div id="message"></div>

    <div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10">
        <div style="display:<?php if (isset($_SESSION['showAlert'])) {
  echo $_SESSION['showAlert'];
} else {
  echo 'none';
} unset($_SESSION['showAlert']); ?>" class="alert alert-success alert-dismissible mt-3">
          <button type="button" class="close" data-dismiss="alert" onclick="Close()">&times;</button>
          <strong><?php if (isset($_SESSION['message'])) {
  echo $_SESSION['message'];
} unset($_SESSION['showAlert']); ?></strong>
        </div>
            <div class="table-responsive mt-2"></div>
                <table class="table table-bordered table-striped text-center">
                    <thead>
                    <tr>
                        <td colspan="7">
                            <h2 class="text-center"><b>Produsele din coșul tău!</b></h2>
                    </td>
                    </tr>
                    <tr>
                        <th>ID</th>
                        <th>Imagine</th>
                        <th>Produse/Servicii</th>
                        <th>Preț</th>
                        <th>Cantitate</th>
                        <th>Prețul total</th>
                        <th><a href="action.php?clear=all" class="btn btn-danger p-1" onclick="return confirm('Ești sigur că vrei să ștergi conținutul din coș?');"><i><i class="fas fa-trash"></i>&nbsp;&nbsp;Șterge coș</i></a></th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                            require 'includes/dbh.inc.php';
                            $stmt = $conn -> prepare("SELECT * FROM cart WHERE usersId =?");
                            $stmt -> bind_param("i",$userId);
                            $stmt -> execute();
                            $result = $stmt -> get_result();
                            $grand_total = 0;
                            while($qu = $result -> fetch_assoc()):

                        ?>
                        <tr>
                            <td><?= $qu['id_products'] ?></td>
                            <input type="hidden" class="pid" value="<?= $qu['id_products'] ?>">
                            <td><img src="<?=$qu['image_products'] ?>" width="50"></td>
                            <td><?=$qu['name_products'] ?></td>
                            <td><?= number_format($qu['price_products'],2); ?> RON</td>
                            <input type="hidden" class="pprice" value="<?= $qu['price_products'] ?>">
                            <td><input type="number" class="form-control itemQty" value="<?= $qu['qty'] ?>" style ="width:75px;"></td>
                            <td><?= number_format($qu['total_price'],2); ?> RON</td>
                            <td>
                                <a href="action.php?remove=<?=$qu['id'] ?>" class="text-danger lead" onclick="return confirm('Ești sigur că vrei să ștergi acest produs?');"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                                <?php $grand_total += $qu['total_price'] ?>
                            <?php endwhile; ?>
                            <tr>
                                <td colspan="3">
                                    <a href="produse.php" class="btn btn-success"><i class="fas fa-cart-plus"></i> Continuă cumpărăturile</a>
                                </td>
                                <td colspan="2"><b>Total</b></td>
                                <td><b><?= number_format($grand_total,2); ?> RON</b></td>
                                <td><a href="checkout.php" class="btn btn-info <?=($grand_total>1)?"":"disabled"; ?>"><i class="far fa-credit-card"></i> Plătește</a></td>
                            </tr>
                    </tbody>
                </table>
        </div>
    </div>
    </div>

    
<?php
include("footer.php");
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">
    
    $(document).ready(function(){

        $(".itemQty").on('change', function(){
            var $el = $(this).closest('tr');

            var pid = $el.find(".pid").val();
            var pprice = $el.find(".pprice").val();
            var qty = $el.find(".itemQty").val();
            console.log(qty,pprice,pid);
            location.reload(true);
            $.ajax({
                url: 'action_qty.php',
                method: 'post',
                cache: false,
                data: {qty:qty, pid:pid, pprice:pprice},
                success: function(response){

                    $("#message").html(response);
                }
            });
        });
    });
    </script>

<script>
function Close(){
    document.getElementById('message').style.display='none';
}
</script>

</body>
</html>