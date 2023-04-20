<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = 'stylesheet' href = 'style.css'>
    <title>5 Esercizi</title>
</head>
<body>
    <div class = 'PHP'> 
        <h1>Esercizi</h1>
            <div class = 'Esercizi'>

            <!-- data e ora -->
                <div class = 'Esercizio'>
                    <h3>Data e ora</h3>
                    <?php
                    $datetime = date("d/m/Y - H:i");
                        echo "<p style = 'color: rgb(77, 23, 152)';>$datetime</p>";
                    ?>
                </div>

            <!-- pari o dispari -->

                <div class = 'Esercizio'> 
                    <h3>Genera un numero e determina se è pari o dispari</h3>
                    <?php
                        $random = rand(1, 1001);
                        echo "<p>Numero generato: $random</p>";

                        if ($random % 2 == 0) {
                            echo "<p>Il numero generato è pari</p>";
                        }
                        else {
                            echo "<p>Il numero generato è dispari</p>";
                        }
                    ?>
                </div>

            <!-- 100 numeri pari -->

                <div class = 'Esercizio'>
                <h3>Genera 100 numeri pari</h3>
                    <table>
                        <?php
                            $num = 0;
                            echo "<tr>";
                            for ($i = 0; $i < 10; $i++) {
                                for ($j = 0; $j < 10; $j++) {
                                    echo "<td><p>$num</p></td>";
                                    $num += 2;
                                }
                                echo "</tr><tr>";   
                            } 
                        ?>
                    </table>
                </div>
            
            <!-- tabella 10x10 con numeri 1 -->

                <div class = 'Esercizio'>
                <h3>Genera una tabella 10x10 contenente solo "1"</h3>
                    <table>
                        <?php
                            echo "<tr>";
                            for ($i = 1; $i <= 100; $i++) {
                                echo "<td><p>1</p></td>";
                                if ($i % 10 == 0)
                                    echo "</tr><tr>";
                            } 
                        ?>
                    </table>
                </div> 

            <!-- tabella 10x10 con numeri random -->

            <div class = 'Esercizio'>
            <h3>Genera una tabella 10x10 contenente numeri random</h3>
                    <table>
                        <?php
                            echo "<tr>";
                            for ($i = 1; $i <= 100; $i++) {
                                $random = rand(1, 101);
                                echo "<td><p>$random</p></td>";
                                if ($i % 10 == 0)
                                    echo "</tr><tr>";
                            } 
                        ?>
                    </table>
                </div> 

            <!-- tabella 10x10 con 1 sulla diagonale e 0 intorno -->

            <div class = 'Esercizio'>
            <h3>Genera una tabella 10x10 contenente numeri 1 sulla diagonale e 0 intorno</h3>
                <table>
                    <?php
                        echo "<tr>";
                        for ($i = 0; $i < 10; $i++) {
                            for ($j = 0; $j < 10; $j++) {
                                if ($i == $j) {
                                    echo "<td><p style = 'color: blue; font-weight: bold;'>1</p></td>";
                                }
                                else {
                                    echo "<td><p>0</p></td>";
                                }
                            }
                            echo "</tr><tr>";
                        } 
                    ?>
                </table>
            </div>
        </div>
    </div>
</body>
</html>