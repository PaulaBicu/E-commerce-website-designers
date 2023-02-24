<?php
    session_start();
    require 'includes/dbh.inc.php';
    $usersId = $_SESSION["userid"];

    if(isset($_POST['pid'])){
        $pid = $_POST['pid'];
        $pname = $_POST['pname'];
        $pprice = $_POST['pprice'];
        $pimage = $_POST['pimage'];
        $pqty = 1;

        $stmt = $conn -> prepare("SELECT id_products FROM cart WHERE id_products=?");
        $stmt -> bind_param("s",$pid);
        $stmt -> execute();
        $res = $stmt->get_result();
        $r = $res -> fetch_assoc();
        $code = $r['id_products'];

        if(!$code){
            $query = $conn ->prepare("INSERT INTO cart (name_products,price_products,image_products,qty,total_price,id_products,usersId) VALUES (?,?,?,?,?,?,?)");
            $query ->bind_param("sssissi",$pname,$pprice,$pimage,$pqty,$pprice,$pid,$usersId);
            $query ->execute();

            echo '<div class="alert alert-success alert-dismissible mt-2">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Produs adăugat în coș!</strong>
                 </div>';
        }
        else{
            echo '<div class="alert alert-danger alert-dismissible mt-2">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Produs deja adăugat în coș!</strong>
         </div>';
        }
    }

    if(isset($_GET['cartItem'])&&isset($_GET['cartItem']) == 'cart-item'){
        $stmt = $conn -> prepare("SELECT * FROM cart WHERE usersId=?");
        $stmt -> bind_param("i",$usersId);
        $stmt -> execute();
        $stmt -> store_result();
        $rows = $stmt -> num_rows;

        echo $rows;
    }

	// Remove single items from cart
	if (isset($_GET['remove'])) {
        $id = $_GET['remove'];
  
        $stmt = $conn->prepare('DELETE FROM cart WHERE id=?');
        $stmt->bind_param('i',$id);
        $stmt->execute();
  
        $_SESSION['showAlert'] = 'block';
        $_SESSION['message'] = 'Item removed from the cart!';
        header('location:shopping_cart.php');
      }

      if(isset($_GET['clear'])){
          $stmt = $conn->prepare("DELETE FROM cart");
          $stmt -> execute();
            
        $_SESSION['showAlert'] = 'block';
        $_SESSION['message'] = 'All item removed from the cart!';
          header('location:shopping_cart.php');
      }

      if(isset($_POST['action']) && isset($_POST['action']) == 'order'){
          $name = $_POST['name'];
          $email = $_POST['email'];
          $phone = $_POST['phone'];
          $city = $_POST['city'];
          $products = $_POST['products'];
          $grand_total= $_POST['grand_total'];
          $address = $_POST['address'];
          $pmode = $_POST['pmode'];

          $data = '';

          $stmt = $conn ->prepare("INSERT INTO orders (name,email,phone, city, address,pmode,products,amount_paid, usersId) VALUES (?,?,?,?,?,?,?,?,?);");
          $stmt -> bind_param("ssssssssi", $name, $email, $phone, $city, $address, $pmode, $products, $grand_total,$usersId);
          $stmt -> execute();
          $data .= '<div class = "text-center"> 
                    <h1 class="display-4 mt-2 text-danger"> Vă mulțumim!</h1> 
                    <h2 class="text-success"> Comanda a fost plasată cu success!</h2> 
                    <h4 class="bg-danger text-light rounded p-2">Produsele achiziționate: '.$products.'</h4>
                    <h4> Numele tău: '.$name.'</h4>
                    <h4> Adresa ta de email: '.$email.'</h4>
                    <h4> Numărul tău de telefon: '.$phone.'</h4>
                    <h4> Orasul tau: '.$city.'</h4>
                    <h4> Adresa ta: '.$address.'</h4>
                    <h4> Total de plată: '.number_format($grand_total,2).'</h4>
                    <h4> Metoda de plată: '.$pmode.'</h4>

                    </div>';
         echo $data;

         $stmtdelete = $conn ->prepare("DELETE FROM cart WHERE usersId=?");
         $stmtdelete -> bind_param("i", $usersId);
         $stmtdelete -> execute();
      }


?>
