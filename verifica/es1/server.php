<?php 

    $address = "127.0.0.1";
    $port = 6990;
    set_time_limit(0);

    $socket = socket_create(AF_INET, SOCK_STREAM, 0);

    socket_bind($socket, $address, $port);

    socket_listen($socket);
    $sk = socket_accept($socket);

    $name = socket_read($sk, 1024);
    $surname = socket_read($sk, 1024);
    $num1 = socket_read($sk, 1024);
    $num2 = socket_read($sk, 1024);

    $msg = "\nHo ricevuto i numeri ($num1, $num2), che operazione vuoi fare?
            \n1)Addizione;
            \n2)Sottrazione;
            \n3)Moltiplicazione;
            \n4)Divisione;
            \n";

    socket_write($sk, $msg, strlen($msg));

    $operation = socket_read($sk, 1024);

    switch($operation) {
        case 1:
            $result = $num1 + $num2;
            break;

        case 2:
            $result = $num1 - $num2;
            break;

        case 3:
            $result = $num1 * $num2;
            break;

        case 4:
            $result = $num1 / $num2;
            break;

        default:
            $result = "Errore";
            break;
    }

    $result = "\nIl risultato è $result. Grazie $name $surname.";
    socket_write($sk, $result, strlen($result));

    socket_close($socket);
    socket_close($sk);

?>