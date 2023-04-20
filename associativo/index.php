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

        // key = stringa
        // value = prezzo

        $array = array("caffè" => 1.20, "tisana" => 2.50, "panino" => 5.50, "torta" => 3.70, "acqua" => 0.50);
        
        foreach ($array as $key => $value) 
        {
            echo "<h3>$key - $value €</h3>";
        }

        $array = array_fill(0, 5, $key);
        print_r($array);
    ?>
</body>
</html>