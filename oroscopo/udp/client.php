<?php 

    $address = "127.0.0.1";
    $port = 2222;
    set_time_limit(0);
    
    $input = "";

    $socket = socket_create(AF_INET, SOCK_DGRAM, 0) 
    or die ("\nNon riesco a creare la socket");

    while(true) {
        
        echo "\n\n";
        $input = readline("Inserisci un input: ");

        socket_sendto($socket, $input, strlen($input), 0, $address, $port)
        or die ("\nNon riesco a inviare il messaggio");

        if(strtolower($input) === 'quit') break;
        
        $response = "";
        socket_recvfrom($socket, $response, 1024, 0, $address, $port)
        or die ("\nNon riesco a leggere il messaggio sulla socket");

        echo "\nMessaggio del server: $response";

    }
    socket_close($socket);
?> 