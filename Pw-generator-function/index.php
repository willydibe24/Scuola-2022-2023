<!-- Generare una password utilizzando solo lettere maiuscole e minuscole -->
<!-- Le lettere dovranno essere random. Per farlo si converte il numero generato in codice ascii -->
<!-- Per convertire da intero ad ascii si utilizza il metodo "chr()" -->


<!-- genera da 33 a 126 -->

<?php

    $length = rand(8, 20);

    function newPassword(int $length): string {
        $password = "";

        for ($i = 0; $i < $length; $i++) {
            $password .= chr(random_int(33, 126));
        }

        echo "lunghezza ".strlen($password);
        return $password;
    }

    function hackPassword($password):float {
        $hackedpw = "";

        $time_start = microtime(true); // calcola il tempo di runtime;
        $tent = 0;
        
        for ($i = 0; $i < strlen($password); $i++) { // strlen individua la lunghezza della stringa
            for ($j = 33; $j < 126; $j++, $tent++) { //33 è il primo carattere ascii che mi interessa, 126 è l'ultimo
                if ($password[$i] == chr($j)) {
                    $hackedpw .= chr($j);
                    break;
                }
            }
        }

        $time_end = microtime(true);
        $time =  ($time_end - $time_start);
        return $time;
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href = "style.css">
    <title>Password generator</title>
</head>
<body>
    <div class = "PHP">
        <h1>Generatore di Password<br>(funzione)</h1>

        <div class = "Box"> <!-- Generatore password -->
            <?= "<p>Password generata: ".$password = newPassword($length); ?>
        </div>

        <div class = "Box"> <!-- hacking password -->
            <?= "<p>Tempo necessario per l'hacking: ".hackPassword($password); ?>
        </div>
    </div>
</body>
</html>