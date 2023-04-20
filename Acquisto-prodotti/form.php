<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href = "style.css">
    <title>Vendita prodotti</title>
</head>
<body>
    <h1>Vendita oggetti scolastici</h1>
        <form method="get" action="prodotti.php">
            <p>Inserire il numero dei prodotti: 
            <input type="text" name="n_products" id = "n_products">
            </p>
        <fieldset id = "optionals">
            <legend>Selezionare il prodotto</legend>
            <input type="radio" name="optional" id = "optional" value="0"> Quaderno A4 => €5<br>
            <input type="radio" name="optional" id = "optional" value="1"> Agenda 2023 => €3,20<br>
            <input type="radio" name="optional" id = "optional" value="2"> Quaderno A4 quadretti 0,5 mm => €2,50<br>
            <input type="radio" name="optional" id = "optional" value="3"> calcolatrice => €15<br>
            <input type="radio" name="optional" id = "optional" value="4"> astuccio => €12<br>
            <input type="radio" name="optional" id = "optional" value="5"> zaino => €45<br>
        </fieldset>
        <br> 
        <input name="invia" id = "button" type="submit" value="Prenota">
        <input name="reset" id = "button" type="reset" value="Cancella tutto / reset">
        <br>
        <input name="cart_reset" id = "button" type="submit" value="Inizializza il carrello">
    </form>
</body>
</html>
