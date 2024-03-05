<!-- prima devo registrarmi (nome utente, password) -->
<!-- memorizzo i miei dati in delle variabili di sessione (array associativo [$nomeutente => $password] -->
<!-- la value dell'array associativo devo inserirla con una funzione che cripti la password -->
<!-- Se il login non riesce, utilizzo una variabile di sessione a false, altrimenti è true -->

<?php session_start();

    function signup($username, $password) {
        file_put_contents("data.txt", "$username:$password", FILE_APPEND);
    }

    function login($username, $password) :bool {
        foreach (file("data.txt") as $line) {
            if ($username.":".$password == $line)
            {
                return true;
            }
        }
        return false; 
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href = "style.css">
    <title>Registrati</title>
</head>
<body>
    <form method = "get" action = "sign-up.php">
        <div id = "sign-up">
            <h2>Registrati</h2>
            <div id = "input">
                <input type = 'text', name = 'username', id = 'username', placeholder = 'Username'>
                <input type = 'password', name = 'password', id = 'password', placeholder = 'Password'>
                <?= $_GET['username'], $_GET['password'];?>
                <?php signup($_GET['username'], $_GET['password'])?>
            </div>
        </div>
        <input type = "submit" value = "Registrati"> 
    </form>
</body>
</html>