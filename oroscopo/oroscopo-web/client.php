<?php 

    if(isset($_POST['submit-button'])) {
        $day = $_POST['current-day'];
        $zodiac = strtolower($_POST['zodiac']);

        $address = "127.0.0.1";
        $port = 3333;

        $socket = socket_create(AF_INET, SOCK_STREAM, 0);
        socket_connect($socket, $address, $port);

        socket_write($socket, $zodiac, strlen($zodiac));
        sleep(.1);
        socket_write($socket, $day, strlen($day));

        $response = socket_read($socket, 1024);
   	    socket_close($socket);
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Oroscopo</title>
</head>
<body>
    <audio controls autoplay id = "audiofile">
        <source src = "right-round-bracket" type = "audio/wav">
    </audio>
    <div class="container-background">
        <div class="container">
            <div class="container-content">
                <div class="container-header">
                    <h1>Oroscopo</h1>
                </div>
                <div class="container-sides">
                    <div class="container-left">
                        <div class="container-form">
                        <form method = "post">
                                <div class="date-input">
                                    <p>Inserisci il giorno corrente: </p>
                                    <input 
                                        type = "number" 
                                        id = "current-day" 
                                        name = "current-day"
                                        min = "1"
                                        max = "31"
                                    >
                                </div>
                                <div class="sign-input">
                                    <p>Inserisci il tuo segno zodiacale:</p>
                                    <input 
                                        type = "text" 
                                        id = "user-sign" 
                                        name = "zodiac"
                                    >  
                                </div>
                                <div class="submit-form">
                                    <input 
                                        type = "submit" 
                                        id = "submit-button" 
                                        name = "submit-button"
                                        value = "Genera oroscopo!"
                                    >
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="container-right">
                        <div class="message-box">
                            <div class="message-box-header">
                                <h3>Il tuo oroscopo apparirà qui:</h3>
                            </div>
                            <div class="message-box-paragraph">
                                <p id = "message"><?= @$response?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
