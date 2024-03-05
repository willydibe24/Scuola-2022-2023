<!-- 
    1) stampare tutti gli elementi del vettore tramite foreach;
    2) assegna un valore a un elemento a scelta dell'array;
    3) ricercare l'elemento tramite foreach; 
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = 'stylesheet' href = 'style.css'>
    <title>Esercizio Array PHP</title>
</head>
<body>
    <div class = 'PHP'> 
        <h1>Esercizio Array PHP</h1>
            <?php 

                $vet = array("caffè" => 1.20, "tisana" => 2.50, "panino" => 5.50, "torta" => 3.70, "acqua" => 0.50);
                
                foreach ($vet as $value => $element) 
                {
                    echo "<h3>$value - $element €</h3>";
                }
            ?>
    </div>
</body>
</html>