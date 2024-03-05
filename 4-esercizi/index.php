<!-- 
    0) Crea un array di 4 elementi con valori random da 1 a 10;
    1) Stampa tot <br> generati tramite random
    2) Stampa random righe con: ->  3) random asterischi
    4) lista con numeri consecutivi pari 
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
        <h1>4 Esercizi</h1>
            <div class = "Esercizio"> 
                <?php 
                    $arr = array(4);

                    for ($i = 0; $i < 4; $i++)
                    {
                        $arr[$i] = rand(0,10);
                    }

                    print_r($arr); 

                    echo "<p>Inizio spazi vuoti: </p>";
                    
                    for ($i = 0; $i < $arr[0]; $i++)
                    {
                        echo "<br>";
                    }
                    
                    echo "<p>Fine spazi vuoti</p>";
                ?>
            </div>

            <div class = "Esercizio">
                <?php 
                    for ($i = 0; $i < $arr[1]; $i++)
                    {
                        for ($j = 0; $j <$arr[2]; $j++)
                        {
                            echo "*";
                        }
                        echo "<br>";
                    }
                ?>
            </div>

            <div class = "Esercizio">
                <?php
                    $n = 0;
                        echo "<ul>";
                            for ($i = 0; $i <$arr[3]; $i++)
                            {
                                echo "<li>$n</li>";
                                $n += 2;
                            }
                        echo "</ul>";
                ?>
            </div>
    </div>
</body>
</html>