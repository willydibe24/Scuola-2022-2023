<?php 
    
        function esercizio1a() {
            for ($i = 0; $i < rand(10, 25); $i++) {
                echo "<h1>ciao</h1>";
            }
        }

        function esercizio1b() {
            $random = rand(10, 25);
            $n = 1; // numero dell'header
            echo "numero di ciao da generare: " .$random; // stampa il numero random generato (per capire quanti "ciao" dovrà stampare)
        
            for ($i = 0; $i < $random; $i++) {
                echo "<h$n>Ciao</h$n>";
                $n++;
                if ($n > 6) { // se arrivo ad h6, inizializzo di nuovo la mia "n" a 1
                    $n = 1;
                }
            }
        }
        
        function esercizio2a():array {

            $array = array("Roma" => 400, "Napoli" => 500, "Bari" => 800, "Varese" => 50, "Firenze" => 300);

            foreach ($array as $key => $value) {
                echo "Distanza da Milano a " .$key. ": " .$value. " km<br>";
            }

            return $array;
        }

        function esercizio2b($array) {
            $media = 0;
            foreach ($array as $key => $value) {
                $media += $value;
            }
            $media /= count($array);
            
            echo "<br>La media è " .$media;  
        }

        function esercizio2c($array) {
            $x = rand(0, 800);
            $cont = 0;
            echo "<br><br>Valore di x: " .$x;

            foreach ($array as $key => $value) {
                if ($value > $x) {
                    $cont++;
                }
            }

            echo "<br>Destinazioni oltre alla x: " .$cont;
        }


        function esercizio3() {
            $months = array("Gennaio", "Febbraio", "Marzo", "Aprile", "Maggio", "Giugno", "Luglio", "Agosto", "Settembre", "Ottobre", "Novembre", "Dicembre");

            // elenco
            echo "<ul>";
            for ($i = 0; $i < count($months); $i++) {
                echo "<li>$months[$i]</li>";
            }
            echo "</ul>";


            // tabella
            echo "<br><table  style = 'border: solid 2px;'><tr>";
            for ($i = 0; $i < count($months); $i++) {
                echo "<td style = 'border-right: solid 1px;'>$months[$i]</td>";
            }
            echo "</tr></table>";
            
            for ($i = 0; $i < count($months); $i++) {
                $red = rand(0, 255);
                $green = rand(0, 255);
                $blue = rand(0, 255);
                echo "<p style = 'background-color: rgb($red, $green, $blue); color: white;'>$months[$i]</p>";
            }
        }

        

    
    ?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        echo "<h1 style = 'background-color: blue; color: white; text-align: center; border-radius: 10px; margin: 10px 100px;'>Esercizio 1a</h1>";
        esercizio1a();
        echo "<h1 style = 'background-color: blue; color: white; text-align: center; border-radius: 10px; margin: 10px 100px;'>Esercizio 1b</h1>";
        esercizio1b();
        echo "<h1 style = 'background-color: blue; color: white; text-align: center; border-radius: 10px; margin: 10px 100px;'>Esercizio 2a</h1>";
        $array = esercizio2a();
        echo "<h1 style = 'background-color: blue; color: white; text-align: center; border-radius: 10px; margin: 10px 100px;'>Esercizio 2b</h1>";
        esercizio2b($array);
        echo "<h1 style = 'background-color: blue; color: white; text-align: center; border-radius: 10px; margin: 10px 100px;'>Esercizio 2c</h1>";
        esercizio2c($array);
        echo "<h1 style = 'background-color: blue; color: white; text-align: center; border-radius: 10px; margin: 10px 100px;'>Esercizio 3</h1>";
        esercizio3();
    ?>
</body>
</html>