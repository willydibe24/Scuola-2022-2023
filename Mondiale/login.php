<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
<form method = "get" action = "index.php">
        <div id = "sign-up">
            <h2>Accedi</h2>
            <div id = "input">
                <input type = 'text', name = 'username', id = 'username', placeholder = 'Username'>
                <input type = 'password', name = 'password', id = 'password', placeholder = 'Password'>
                <?php 
                    if(login($username, $password) == false) {
                        echo "<p>Nome utente o password errati!</p>";
                    }
                ?> 
            </div>
        </div>
    </form>
</body>
</html>