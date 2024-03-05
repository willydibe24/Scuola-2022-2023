<?php 

    // La porta e l'host devono essere le stesse definite nel server
    $host = "127.0.0.1"; // localhost IP
    $port = 5000; // Porta su cui comunicare
    set_time_limit(0); // Disabilita il timeout

    // Creazione della socket
    $socket = socket_create(AF_INET, SOCK_STREAM, 0) or die ("Non posso creare la socket\n");

    // Connessione al server
    $result = socket_connect($socket, $host, $port) or die ("Non posso connettermi al server\n");

    while(true) {
        echo("\nSCRIVERE UN'OPERAZIONE DA FARE (a + b | a / b + b / a | sqrt(a) + 3.14 | ecc...)\n\nPER USCIRE DIGITARE 'QUIT'\n");
        $operation = readline();
        if(strcasecmp($operation, 'quit') == 0) break;

        // Invio messaggio al server 
        echo("\n");
        socket_write($socket, $operation, strlen($operation)) or die ("Non posso inviare il messaggio al server\n");
    
        // Leggi la risposta del server 
        $result = socket_read($socket, 1024) or die ("Non posso leggere la risposta del server\n");
        echo "\nRisposta del server: " .$result . "\n";
    }

    // Chiusura della socket 
    socket_close($socket);

?>