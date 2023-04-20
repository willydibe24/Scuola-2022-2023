<!-- Generare una password utilizzando solo lettere maiuscole e minuscole -->
<!-- Le lettere dovranno essere random. Per farlo si converte il numero generato in codice ascii -->
<!-- Per convertire da intero ad ascii si utilizza il metodo "chr()" -->


<!-- genera da 33 a 126 -->
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
        <h1>Generatore di Password</h1>

        <div class = "Box"> <!-- Generatore password -->
        <?php
            $password = "";

            for ($i = 0; $i < 8; $i++) {
                // All'interno di char[] sono presenti 3 numeri random, convertiti successivamente in ascii tramite chr();
                // L'ultimo random_int(0, 2) sorteggia uno dei 3 caratteri ascii generati;
                $char[] = array(chr(random_int(65, 90)), chr(random_int(97, 122)), chr(random_int(48, 57)))[random_int(0, 2)];
                $password .= $char[$i];
            }

            echo "<p>La password generata è: $password</p>";
        ?>
        </div>

        <div class = "Box"> <!-- hacking password -->
        <?php 
            $char = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z',
                            'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z',
                            '0', '1', '2', '3', '4', '5', '6', '7', '8', '9');

            $hackedpw = "";
            $time_start = microtime(true); // calcola il tempo di runtime;
            $tent = 0;
                for ($i = 0; $i < strlen($password); $i++) { // strlen individua la lunghezza della stringa
                    for ($j = 0; $j < 62; $j++) {
                        if ($password[$i] === $char[$j]) 
                        {
                            $hackedpw .= $char[$j];
                            break;
                        }
                        $tent++;
                    }
                    
                }
            $time_end = microtime(true);
            $time =  ($time_end - $time_start);

            echo "<p>La password hackerata è: $hackedpw </p>";
            echo "<p>Il tempo di runtime è: $time </p>";
            echo "<p>Tentativi: $tent </p>";
        
        ?>
        </div>
    </div>
</body>
</html>