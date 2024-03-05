<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href = "style.css">
    <title>Form</title>
</head>
<body>
    <form method="post" action="" target = "_blank">
        <fieldset>
            <legend><p>Input di testo</p></legend>

            <label class = "texts">
                <input type = "text" name = "nome" placeholder="Nome" required>
                <input type = "text" name = "cognome" placeholder="Cognome" required>
                <input type = "email" name = "email" placeholder="Email" required>
            </label>

            <label class = "number">
                <p>Numero</p>
                <span>Inserisci un numero: </span>
                    <input type="number" name = "number">
            </label>
            
            <label class = "checkboxes">
                <p>Checkbox</p>
                <span>Voce 1</span>
                    <input type="checkbox" name = "opt[]" value = "0">
                <span>Voce 2</span>
                    <input type="checkbox" name = "opt[]" value = "1">
                <span>Voce 3</span>
                    <input type="checkbox" name = "opt[]" value = "2">
            </label>
                
            <label class = "radio-buttons">
                <p>Radio buttons</p>
                <span>Button 1</span>
                    <input type="radio" name = "radio-button">
                <span>Button 2</span>
                    <input type="radio" name = "radio-button">
                <span>Button 3</span>
                    <input type="radio" name = "radio-button">
            </label> 

            <label class = "select-options">
                <p>Select</p> 
                <span>Select - options</span>
                <select name="dispositivo"> 
                    <option value="opzione 1" selected> opzione 1</option>
                    <option value="opzione 2"> opzione 2</option>
                    <option value="opzione 3"> opzione 3</option>
                    <option value="opzione 4"> opzione 4</option>
                </select>
            </label> 

            <label class = "color">
                <p>Colore</p>
                <span>Seleziona un colore: </span>
                    <input type="color">
            </label>

            <label class = "date">
                <p>Data</p>
                <span>Inserisci una data: </span>
                    <input type="date">
            </label>

            <label class = "datetime-local">
                <p>Data e ora</p>
                <span>Inserisci data e ora: </span>
                    <input type="datetime-local">
            </label>

            <label class = "month">
                <p>Mese</p>
                <span>Inserisci mese: </span>
                    <input type="month">
            </label>

            <label class = "image">
                <p>Immagine</p>
                <span>Inserisci un'immagine: </span>
                    <input type="image">
            </label>

            <label class = "password">
                <p>Password</p>
                <span>Inserisci una password: </span>
                    <input type="password">
            </label>

            <label class = "file">
                <p>File</p>
                <span>Inserisci un file: </span>
                    <input type="file">
            </label>

            <label class = "search">
                <p>Search</p>
                <span>Fai una ricerca: </span>
                    <input type="search">
            </label>

            <!-- <label class = "url">
                <p>url</p>
                <span>Inserisci un url: </span>
                    <input type="url">
            </label> -->

            <div class="buttons">
                <button class="submit" type="submit"> Invio</button> 
                <button class="reset" type="reset"> ripristina la pagina</button>
            </div>
        </fieldset>
    </form>	
</body>
</html>