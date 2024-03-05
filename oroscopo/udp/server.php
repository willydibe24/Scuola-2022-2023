<?php 

    $address = "127.0.0.1";
    $port = 2222;
    set_time_limit(0);

    $socket = socket_create(AF_INET, SOCK_DGRAM, 0)
    or die ("\nNon riesco a creare la socket");

    socket_bind($socket, $address, $port)
    or die ("\nNon riesco a bindare la socket");

    while(true) {

        $input = "";
        socket_recvfrom($socket, $input, 1024, 0, $address, $port)
        or die ("\nNon riesco a leggere messaggi dalla socket");

        if (strtolower($input) === 'quit') break; 

        $message = "Ho ricevuto il tuo messaggio ($input).";

        socket_sendto($socket, $message, strlen($message), 0, $address, $port)
        or die ("\nNon riesco ad inviare il messaggio");
        
    }
    
    socket_close($socket);
?> 