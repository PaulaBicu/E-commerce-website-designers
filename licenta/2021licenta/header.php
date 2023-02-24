<?php
    error_reporting(0);
    session_start();
    include("includes/dbh.inc.php");
    $usersId = $_SESSION["userid"];
    $stmtadmin = $conn ->prepare("SELECT level FROM users WHERE usersId = ?");
    $stmtadmin -> bind_param("i",$usersId);
    $stmtadmin -> execute();
    $resultadmin = $stmtadmin -> get_result();
    $quadmin = $resultadmin -> fetch_assoc();
    $_SESSION['level'] = $quadmin['level'];
?>

<div class="navbar">
        <div class="container">
            <a class="logo" href="index.php">Bezal<span>.</span>el</a>

            <img id="mobile-cta" class="mobile-menu" src="images/menu.svg" alt="Open Navigation">

            <nav>
                <img id="mobile-exit" class="mobile-menu-exit" src="images/exit.svg" alt="Close Navigation">
                
                <ul class="primary-nav">
                    <li class="current"><a href="index.php">Acasa</a></li>
                    <li><a href="produse.php">Produse</a></li>
                   <!--- <li><a href="servicii.php">Servicii</a></li> -->
                </ul>

                <ul class="secondary-nav">
                    <li><a href="contact.php">Contact</a></li>

                    <?php
                        if(isset($_SESSION["useruid"])){
                            echo '<li><a href="profile.php">Profil</a></li>';
                            echo '<li><a href="includes/logout.inc.php">Deconectare</a></li>';
                            echo '<li class="shopping-cart-icon"><a href="shopping_cart.php"><img src="images/shopping_cart_icon.png" width="25" height="25"><span id="cart-item"></span></a></li>';
                        }
                        else{
                            echo '<li><a href="login.php">Autentificare</a></li>';
                            echo '<li class="go-premium-cta"><a href="signup.php">Înregistrare</a></li>';
                        }
                        if($_SESSION['level'] > 0 )
                        {
                        echo '<li><a href="adminpage.php">Admin</a></li>';
                        }
                        
                    ?>
                </ul>
            </nav>
        </div>
    </div>
