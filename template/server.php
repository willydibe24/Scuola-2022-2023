<?php 

    $address = "127.0.0.1";
    $port = 3000;

    $socket = socket_create(AF_INET, SOCK_STREAM, 0)
    or die ("\nNon riesco a creare la socket");

    socket_bind($socket, $address, $port)
    or die ("\nNon riesco a bindare la socket");

    socket_listen($socket)
    or die ("\nNon riesco a mettermi in ascolto sulla socket");
    
    $spawn = socket_accept($socket)
    or die ("\nNon riesco ad accettare messaggi dalla socket");

    while(true) {
        $input = socket_read($spawn, 1024)
        or die ("\nNon riesco a leggere messaggi dalla socket");

        $message = "Ho ricevuto il tuo messaggio ($input).";

        socket_write($spawn, $message, strlen($message))
        or die ("\nNon riesco ad inviare il messaggio");
        
    }

    socket_close($socket);
    socket_close($spawn);

?> 
