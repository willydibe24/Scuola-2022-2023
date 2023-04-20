<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = 'stylesheet' href = 'style.css'>
    <title>Tabellina PHP</title>
</head>
<body>
    <div class = 'PHP'> 
        <h1>Tabellina PHP</h1>
            <table>
                <?php 
                    $a = rand(1, 100);
                    echo "<tr><td id = 'GeneratedNum', rowspan = 2> Numero generato: $a</td>";
                    for ($i = 1; $i <= 10; $i++) {
                        echo "<td>$i</td>"; // stampa tutti i moltiplicatori
                    }
                    echo "</tr><tr>";
                    for ($i = 1; $i <= 10; $i++) {
                        $b = $a * $i; // moltiplicazione per ottenere i prodotti
                        echo "<td>$b</td>";
                    }
                ?>
            </table>
    </div>
</body>
</html>