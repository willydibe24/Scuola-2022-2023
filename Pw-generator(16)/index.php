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
        <h1>Generatore di Password<br>(16 caratteri)</h1>

        <div class = "Box"> <!-- Generatore password -->
            <?php
                $password = "";

                for ($i = 0; $i < 12; $i++) {
                    $password .= chr(random_int(33, 126));
                }

                echo "<p>La password generata è: $password</p>";
            ?>
        </div>

        <div class = "Box"> <!-- hacking password -->
            <?php 
                $hackedpw = "";

                $time_start = microtime(true); // calcola il tempo di runtime;
                $tent = 0;
                    for ($i = 0; $i < strlen($password); $i++) { // strlen individua la lunghezza della stringa
                        for ($j = 33; $j < 126; $j++) {
                            if ($password[$i] == chr($j)) 
                            {
                                $hackedpw .= chr($j);
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