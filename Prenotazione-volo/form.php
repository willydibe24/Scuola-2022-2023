<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prenotazioni BESTFLIGHT</title>
</head>
    <body>
    <h1>Prenotazioni aeree BESTFLIGHT</h1>
    <h3>Dati prenotazione</h3>
        <form method="get" action="checkout.php">
            <span>Partenze</span>
            <select name = "partenza">
                <option value = "mxp">Milano Malpensa</option>  
                <option value = "flr">Firenze Vespucci</option>  
                <option value = "fco">Roma Fiumicino</option>  
                <option value = "pco">Pizzo calabro</option>  
            </select>
            
            <br><br><label>Inserire il numero di persone: </label>
            <input type = "text" name = "n_persone" min = "1" max = "20">

            <fieldset class = "class">
                <legend>Classe</legend>
                <input type = "radio" name = "classe" value = "e"><span>ECONOMY class</span><br> <!-- e = ECONOMY CLASS -->
                <input type = "radio" name = "classe" value = "b"><span>BUSINESS class</span><br> <!-- b = BUSINESS CLASS -->
                <input type = "radio" name = "classe" value = "f"><span>FIRST class</span><br> <!-- f = FIRST CLASS -->
            </fieldset>

            <fieldset class = "optional">
                <legend>Optional richiesti</legend>
                <input type = "checkbox" name = "optional[]" value = "0"><span>Bagaglio a mano con priority</span><br>
                <input type = "checkbox" name = "optional[]" value = "1"><span>Bagaglio da stiva</span><br>
                <input type = "checkbox" name = "optional[]" value = "2"><span>Assicurazine </span><br>
                <input type = "checkbox" name = "optional[]" value = "3"><span>Bagaglio a mano con priority</span><br>
                <input type = "checkbox" name = "optional[]" value = "4"><span>Doppio posto</span><br>
            </fieldset><br>

            <input name = "invia" type="submit" value = "Invia">
            <input type="reset" value="Cancella">
        </form>
    </body> 
</html>