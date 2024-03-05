<?php 

    function calc($operation) {
        $operation = str_replace(' ', '', $operation);
        return eval("return $operation;");
    }

?>

<?php

    $host = "127.0.0.1"; // localhost IP
    $port = 5000; // Porta su cui comunicare
    set_time_limit(0); // Disabilita il timeout 
    $operation = ""; // Input del client

    // Creazione socket
    $socket = socket_create(AF_INET, SOCK_STREAM, 0) or die ("Non posso creare la socket\n");

    // Stabilisce a quale porta deve mettersi in ascolto il server
    $result = socket_bind($socket, $host, $port) or die ("Non posso collegare la socket alla porta dell'host\n");

    // Ascolto della socket
    $result = socket_listen($socket, 3) or die ("Non posso ascoltare la socket\n");

    // Accettazione del collegamento
    $spawn = socket_accept($socket) or die ("Non posso accettare il collegamento\n");
    
    while(strcasecmp($operation, 'quit') != 0) {
        $operation = socket_read($spawn, 1024) or die ("Non posso leggere il messaggio del client\n");
        if($operation) {
            $output = calc($operation);
            socket_write($spawn, $output, strlen($output)) or die ("Non posso inviare il messaggio al client\n");
        }
    }
    socket_close($spawn);
    socket_close($socket);
?>