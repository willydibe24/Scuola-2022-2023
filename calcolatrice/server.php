<?php

    $host = "127.0.0.1"; // localhost IP
    $port = 5000; // Porta su cui comunicare
    set_time_limit(0); // Disabilita il timeout 

    // Creazione socket
    $socket = socket_create(AF_INET, SOCK_STREAM, 0) or die ("Non posso creare la socket\n");

    // Stabilisce a quale porta deve mettersi in ascolto il server
    // $result = socket_bind($socket, $host, $port) or die ("Non posso collegare la socket alla porta dell'host\n");

    // Ascolto della socket
    $result = socket_listen($socket, 3) or die ("Non posso ascoltare la socket\n");

    // Accettazione del collegamento
    $spawn = socket_accept($socket) or die ("Non posso accettare il collegamento\n");

    
    while(true) {
        // Lettura del messaggio del client sulla socket
        $operation = socket_read($spawn, 1024) or die ("Non posso leggere il messaggio del client\n");
        $num1 = socket_read($spawn, 1024) or die ("Non posso leggere il messaggio del client\n");
        $num2 = socket_read($spawn, 1024) or die ("Non posso leggere il messaggio del client\n");
        
        // Definisce il messaggio di risposta da inviare al client
        switch($operation){
            // Addizione
            case 1:
                $output = "La somma è ".$num1 + $num2."\n";
                break;
                
            // Sottrazione
            case 2:
            $output = "La differenza è ".$num1 - $num2."\n";
                break;
            
            // Moltiplicazione
            case 3:
                $output = "Il prodotto è ".$num1 * $num2."\n";
                break;
    
            // Divisione
            case 4:
                $output = "Il quoziente è ".$num1 / $num2."\n";
                break;

            case 5: 
                break;
                
            default:
                $output = "Input non consentito\n";
                break;
            }
        // Invia il messaggio alla socket del client
        socket_write($spawn, $output, strlen($output)) or die ("Non posso inviare il messaggio al client\n");
    }
    socket_close($spawn);
    socket_close($socket);
?>