<?php 

    // La porta e l'host devono essere le stesse definite nel server
    $host = "127.0.0.1"; // localhost IP
    $port = 5000; // Porta su cui comunicare
    set_time_limit(0); // Disabilita il timeout

    // Creazione della socket
    $socket = socket_create(AF_INET, SOCK_STREAM, 0) or die ("Non posso creare la socket\n");

    // Connessione al server
    socket_connect($socket, $host, $port) or die ("Non posso connettermi al server\n");

    while(true) {
        echo("\nSCEGLIERE UN'OPERAZIONE DA FARE:\n 1)Addizione\n 2)Sottrazione\n 3)Moltiplicazione\n 4)Divisione\n 5)Esci\n");
        $operation = readline();
        if($operation == 5) break;

        // Invio messaggio alla socket del server 
        echo("\n");
        socket_write($socket, $operation, strlen($operation)) or die ("Non posso inviare il messaggio al server\n");
        $message1 = readline("Inserisci il primo numero: ");
        socket_write($socket, $message1, strlen($message1)) or die ("Non posso inviare il messaggio al server\n");
        $message2 = readline("Inserisci il secondo numero: ");
        socket_write($socket, $message2, strlen($message2)) or die ("Non posso inviare il messaggio al server\n");
    
        // Leggi la risposta dal server 
        $result = socket_read($socket, 1024) or die ("Non posso leggere la risposta del server\n");
        echo "\nRisposta del server: " .$result;
    }

    // Chiusura della socket 
    socket_close($socket);

?>