<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = 'stylesheet' href = 'style.css'>
    <title>Ciclo For PHP</title>
</head>
<body>
    <div class = 'PHP'> 
        <h1>Numeri random PHP</h1>
            <div class = 'NumeriRandom'>
                <?php 
                    for ($i = 0; $i < 10; $i++) {
                        $a = rand(1, 100);
                        echo "<p>Numero generato: <p id = 'Num'> $a </p><br>";
                    }
                ?>
            </div>
    </div>
</body>
</html>