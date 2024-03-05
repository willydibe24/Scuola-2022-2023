<!-- genera 3 vettori di 10 elementi in modo random (0, 255) -->
<!-- scrivi una funzione che riceva questi 3 numeri. Stabilisci quali dei 3 è maggiore. -->
<!-- fai una funzione che restituisca il colore con i maggiori dei 3 vettori -->
<!-- scrivi 10 paragrafi che richiamino ogni volta la funzione di generazione -->

<?php

    $red = array();
    $green = array();
    $blue = array();
    $max = array_fill(0, 3, 0); // array per memorizzare i numeri massimi (parti da 0, arriva fino a 3, inizializza a 0);

    function generateArray(&$red, &$green, &$blue, &$max) {

        $max = array_fill(0, 3, 0); // inizializzazione dell'array;

        for ($i = 0; $i < 10; $i++) {
            $red[$i] = random_int(0, 255);
            $green[$i] = random_int(0, 255);
            $blue[$i] = random_int(0, 255);
        }
    }
    
    function findMax(&$red, &$green, &$blue, &$max):array {

        for ($i = 0; $i < 10; $i++) {
            if ($max[0] < $red[$i]) {
                $max[0] = $red[$i];
            }
        }

        for ($i = 0; $i < 10; $i++) {
            if ($max[1] < $green[$i]) {
                $max[1] = $green[$i];
            }
        }

        for ($i = 0; $i < 10; $i++) {
            if ($max[2] < $blue[$i]) {
                $max[2] = $blue[$i];
            }
        }

        return $max;
    }

    function getRGB($max) {
        echo "rgb($max[0], $max[1], $max[2]);";
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href = "style.css">
    <title>Genera rgb</title>
</head>
<body>
    <div class = "PHP">
        <h1>Genera RGB</h1>
        <div class = "colors">
            <div class = "getRGB">
                <?php generateArray($red, $green, $blue, $max) ?>
                <?php findMax($red, $green, $blue, $max) ?>
                <p style = "color: <?= getRGB($max) ?>">Ciao</p>
            </div>
            <div class = "getRGB">
                <?php generateArray($red, $green, $blue, $max) ?>
                <?php findMax($red, $green, $blue, $max) ?>
                <p style = "color: <?= getRGB($max) ?>">Ciao</p>
            </div>
            <div class = "getRGB">
                <?php generateArray($red, $green, $blue, $max) ?>
                <?php findMax($red, $green, $blue, $max) ?>
                <p style = "color: <?= getRGB($max) ?>">Ciao</p>
            </div>
            <div class = "getRGB">
                <?php generateArray($red, $green, $blue, $max) ?>
                <?php findMax($red, $green, $blue, $max) ?>
                <p style = "color: <?= getRGB($max) ?>">Ciao</p>
            </div>
            <div class = "getRGB">
                <?php generateArray($red, $green, $blue, $max) ?>
                <?php findMax($red, $green, $blue, $max) ?>
                <p style = "color: <?= getRGB($max) ?>">Ciao</p>
            </div>
            <div class = "getRGB">
                <?php generateArray($red, $green, $blue, $max) ?>
                <?php findMax($red, $green, $blue, $max) ?>
                <p style = "color: <?= getRGB($max) ?>">Ciao</p>
            </div>
            <div class = "getRGB">
                <?php generateArray($red, $green, $blue, $max) ?>
                <?php findMax($red, $green, $blue, $max) ?>
                <p style = "color: <?= getRGB($max) ?>">Ciao</p>
            </div>
            <div class = "getRGB">
                <?php generateArray($red, $green, $blue, $max) ?>
                <?php findMax($red, $green, $blue, $max) ?>
                <p style = "color: <?= getRGB($max) ?>">Ciao</p>
            </div>
            <div class = "getRGB">
                <?php generateArray($red, $green, $blue, $max) ?>
                <?php findMax($red, $green, $blue, $max) ?>
                <p style = "color: <?= getRGB($max) ?>">Ciao</p>
            </div>
            <div class = "getRGB">
                <?php generateArray($red, $green, $blue, $max) ?>
                <?php findMax($red, $green, $blue, $max) ?>
                <p style = "color: <?= getRGB($max) ?>">Ciao</p>
            </div>
        </div>
    </div>
</body>
</html>