<?php 

// 1.	Creare una socket PHP che inserendo due numeri da tastiera restituisca un messaggio che comunichi all'utente
// la ricezione dei numeri e chieda all'utente che operazione vuole effettuare.
// Una volta eseguita una delle quattro operazioni aritmetiche a scelta dell'utente, 
// verrà restituito il risultato e ringraziato l'utente con nome e cognome (es: il risultato è 24, Grazie sig. Mario Rossi).

    $address = "127.0.0.1";
    $port = 6990;
    set_time_limit(0);

    
    $socket = socket_create(AF_INET, SOCK_STREAM, 0);
    
    socket_connect($socket, $address, $port);

    $name = readline("Inserisci il tuo nome: ");
    socket_write($socket, $name, strlen($name));

    $surname = readline("Inserisci il tuo cognome: ");
    socket_write($socket, $surname, strlen($surname));

    $num1 = readline("Inserisci il primo numero: ");
    socket_write($socket, $num1, strlen($num1));
    
    $num2 = readline("Ora inserisci il secondo numero: ");
    socket_write($socket, $num2, strlen($num2));

    $operation = socket_read($socket, 1024);
    echo $operation;

    $operation = readline();
    socket_write($socket, $operation, strlen($operation));

    $result = socket_read($socket, 1024);

    echo $result;

    socket_close($socket);
    
?>