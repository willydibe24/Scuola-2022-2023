<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Esercitazione 1</title>
</head>
<body>
    <?php 
        $random = rand(1,6);

        echo "<p>Il numero dell'header è $random";
        for ($i = 1; $i <= 100; $i++)
        {
            if ($i % $random == 0) {
                echo "<h$random>Hello world!</h$random>";
            }

            else {
                echo "<p>Hello world!</p>";
            }
        }
    ?>
</body>
</html>