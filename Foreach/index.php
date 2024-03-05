<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foreach PHP</title>
</head>
<body>
    
    <?php

    // $vet = array(); /*dichiarazione di un array vuoto*/
    // $vet = []; /*dichiarazione di un array vuoto #2*/
    // $num = [25,48,70,12];
    // echo $num[1]; /*stampa il valore in posizione 1*/
    // $num[4] = 7; /*aggiunge il valore 7 in posizione 4*/
    // $num[]= 7; /*aggiunge il valore 7 nella prima posizione libera*/

    $vet = [10,20,4,121,132];
    $elements = count($vet);
    
    for($i = 0; $i < $elements; $i++)
    {
        echo "$i ° elemento = $vet[$i]<br>";
    }
    foreach($vet as $ele)
    {
        echo "Elemento: $ele<br>"; 
    }

    $vet[10] = 44;

    for ($i = 0; $i < count($vet); $i++)
    {
        echo "$vet[$i]";
    }
    print_r($vet); /*visualizzazione vettore*/
    ?>
<body>
</html>