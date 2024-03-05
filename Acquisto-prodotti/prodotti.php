<?php session_start(); ?>

<?php
    function backtoform() { // funzione che riporta alla pagina del form
        header('refresh:1.5;url='.$_SERVER['HTTP_REFERER']); // prende l'url del sito
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href = "style.css">
    <title>Checkout</title>
</head>
    <body>
        <?php
            $prices = array(5,3.2,2.5,15,12,45);

            if (isset($_GET['cart_reset'])) {
                session_destroy();
                header('refresh:0; url='.$_SERVER['HTTP_REFERER']);
                exit();
            }

            if(empty($_GET['n_products'])) {
                echo "prodotti non inseriti";
                backtoform();
            }

            if (!isset($_GET['optional'])) {
                echo "optional non inseriti";
                backtoform();
            }
            
            if (!isset($_SESSION['total']) || !isset($_SESSION['n_products'])) {
                $_SESSION['total'] = 0;
                $_SESSION['n_products'] = 0;
            }


            $n_products = $_GET['n_products'][0];
            $optional = $_GET["optional"];
            
            $_SESSION['n_products'] += $n_products; 
            $_SESSION['total'] += $prices["$optional"] * $n_products;
            
            echo "<p>Prezzo totale <br>€" .$_SESSION['total'] ."</p>";
            echo "<p>Numero prodotti <br>" .$_SESSION['n_products'] ."</p>";    
        ?>  
    </body>
</html>