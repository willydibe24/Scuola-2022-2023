
<?php session_start();

if (isset($_POST['reset_values'])) {
    session_destroy();
    header('refresh:0; url='.$_SERVER['HTTP_REFERER']);
    exit();
}

/* --------------- FORM 1 --------------- */

    if (isset($_POST['color'])) { /* ----- viene selezionato il colore del radio button ----- */
        $_SESSION['color'] = $_POST['color'];
    }

    else {  /* ----- colore di default ----- */
        $_SESSION['color'] = "red";
    }
    
?>



<?php
    
/* --------------- FORM 2 --------------- */

    function print_artist() { 

        if (!isset($_SESSION['artist'])) {
            $_SESSION['artist'] = array("Zucchero"=>0, "Celentano"=>0, "Nirvana"=>0, "Vasco Rossi"=>0);
        }

        if (isset($_POST['artist'])) { /* SE E' SETTATO UN R.B., viene fatto un confronto tra il suo value e la key dell'array */
            foreach (($_SESSION['artist']) as $key => $value) {
                if ($key == $_POST['artist']) {
                    $_SESSION['artist'][$key]++;
                }
            }
        }

        foreach ($_SESSION['artist'] as $key => $value) { /* ----- STAMPA DEI RADIO BUTTON ----- */
            echo "<input type = 'radio', name = 'artist', value='$key'>$key ===> Biglietti prenotati: $value<br>";
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel = "stylesheet" href = "style.css"> -->
    <title>Concerto</title>
</head>
    <body>
        <h1>Prenotazione concerto</h1>
        <form method = "post" action = "form.php">
            <fieldset id = "optionals" style = "background-color: <?= $_SESSION['color']?>;">
                <legend style = "background: white; border: solid 1px;">Selezionare il colore</legend>
                    <input type="radio" name="color" id = "color" value="red">Rosso<br>
                    <input type="radio" name="color" id = "color" value="pink">Rosa<br>
                    <input type="radio" name="color" id = "color" value="yellow">Giallo<br>
                    <input type="radio" name="color" id = "color" value="brown">Marrone<br>
                    <input type="radio" name="color" id = "color" value="blue">Blu<br><br>
                    <input name="submit_color" id = "button" type="submit" value="Cambia colore">
            </fieldset><br> 
        </form>
        <form method = "post" action = "form.php">
            <fieldset id = "artists">
                <legend style = "background: white; border: solid 1px;">Selezionare l'artista</legend>
                    <?php print_artist() ?><br> 
                    <input name="submit_artist" id = "button" type="submit" value="Prenota biglietto">
                    <input name="reset_page" id = "button" type="reset" value="Cancella tutto / reset"><br>
            </fieldset><br>
            <input name="reset_values" id = "button" type="submit" value="Inizializza variabili di sessione">
        </form>
    </body>
</html>
