
<?php // * Controlla se sono stati inseriti dei valori riguardo alla classe o al numero di persone * //

    if (!isset($_GET["classe"])||empty($_GET["n_persone"]))
    {
        echo "Classe o numero persone non inseriti";
        $u = $_SERVER["HTTP_REFERER"];
        header("refresh:1.5; url=".$u);
        exit();
    }

?>

<?php 

    function checkout() {

        /* ----- VARIABILI ----- */

        $partenza = $_GET["partenza"]; // prende i dati dal form relativi alla partenza
        $n_persone = $_GET["n_persone"]; // prende i dati dal form relativi al numero di persone
        $prezzi_partenze = array("mxp"=>50, "flr"=>70, "fco"=>100, "pco"=>10); // array associativo con il prezzo relativo all'aeroporto di partenza
        $prezzi_optional = array(50, 30, 20, 100, 150); // prezzi relativi agli optional (es. 50 è relativo al bagaglio a mano)
        $classe = $_GET["classe"]; // economy, business, first    
        if (!isset($_GET["optional"])) {
            $optional = null;
        }
        
        else {
            $optional = $_GET["optional"]; 
        }

        $totale = $prezzi_partenze["$partenza"] * $n_persone; // calcola il totale
        $totale_optional = 0;



        /* ----- MAIN ----- */ 

        switch ($classe) {
            case "b":               // business class = prezzo * 1.7
                $totale *= 1.7;
                break;

            case "f":              // prima classe = prezzo * 2
                $totale *= 2;
                break;
        }

        if ($optional != null)
        {
            for ($i = 0; $i < count($optional); $i++) {     // calcola il totale degli optional
                $totale_optional += $prezzi_optional[$optional[$i]]; 
            }
            $totale += $totale_optional;
        }

        else {
            echo "Nessun optional richiesto<br>";
        }
        
        echo "Numero persone: ".$n_persone."<br>"; 
        echo "Totale optional: ".$totale_optional." euro<br>";
        echo "Totale: ".$totale." euro<br>";
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
</head>
<body>
    <h1>Checkout</h1>
    <?= checkout() ?>
</body>
</html>
