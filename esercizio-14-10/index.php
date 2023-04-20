<!-- 1) ricevi a e b (int) in una funzione -->
<!-- genera una tabella di asterischi con a e b, rispettivamente righe e colonne -->

<!-- 2) function che riceve array associativo e restituisce il valore totale del magazzino -->
<!-- valori: random (1,20) -->

<!-- 3) function che riceve array dell'esercizio 2 e restituisce vettore con valori di ogni singolo prodotto -->
<!-- quantita: random (1, 7) -->

<!-- 4) dichiarare un vettore (indice numerico) in cui ciascun elemento è un array associativo -->

<?php 

    // ----------------------- ESERCIZIO 1 -----------------------

    function asterischi($a, $b) {
        for ($i = 0; $i < $a; $i++) 
        {
            echo "<tr>"; // genera una nuova riga

            for ($j = 0; $j < $b; $j++)
            {
                echo "<td> * </td>"; // genera le varie colonne
            }
            
            echo "</tr>";
        }
    }

    // ----------------------- ESERCIZIO 2 -----------------------
    
    function prezzo($array):int {
        $tot = 0;
        foreach ($array as $key => $value) 
        {
            echo "$key: $value € --------- " ;
            $tot += $value;
        }
        return $tot;
    }


    // ----------------------- ESERCIZIO 3 -----------------------

    function quantita($array):array {
        $vet = array();
        $i = 0;

        foreach ($array as $key => $value) {
            $vet[$i] = $value * rand(1, 7);
            $i++;
        }
        return $vet;
    }

    // ----------------------- ESERCIZIO 4 -----------------------

    function associativo() {
        $vet = array_fill(0, 5, $ass = array("a" => 1)); // array composto da 5 array associativi.

        print_r($vet);
        echo "<br><br><br>";
        print_r($ass);
    }
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel = "stylesheet" href = "style.css"> -->
    <title>Esercizio 14-10</title>
</head>
<body>
    <div class = "PHP">
        <h1>Esercizi</h1>
        <div class = "esercizio">
            <table>
                <?php 
                    asterischi(5, 10);
                    echo "<br><br>";
                ?>
            </table>
        </div>
        <div class = "esercizio">
            <?php 
                $array = array ("caffe" => rand(1, 20), "pizza" => rand(1, 20), "pasta" => rand(1,20));
                $tot = prezzo($array);

                echo "TOTALE = " .$tot . "€";
                echo "<br><br>";
            ?> 
        </div>
        <div class = "esercizio">
            <?php 
                print_r(quantita($array));
            ?> 
        </div>
        <div class = "esercizio">
            <?php 
                associativo();
            ?> 
        </div>
    </div>
</body>
</html>