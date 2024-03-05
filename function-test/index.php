<!-- utilizza una funzione per scrivere in un flutter "sito generato da William Di Bella Copyright" -->
<!-- utilizza un'altra funzione per affiancare alla stringa precedente l'anno corrente (utilizza metodo date) -->
<!-- la prima funzione è di tipo void, la seconda funzione deve ritornare l'anno -->

<?php

    function printfooter() {
        echo "Sito realizzato da William Di Bella - Copyright";
    } 

    function year():int {
        return date("Y");
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href = "style.css">
    <title>Prova funzione</title>
</head>
<body>
    <div class = "PHP">
        <h1>Prova funzione</h1>
        <div class = "Footer">
            <p><?= printfooter(); echo " ".year()?></p>
        </div>
    </div>
</body>
</html>