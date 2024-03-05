<?php 

    $address = "127.0.0.1";
    $port = 2222;
    
    $input = "";
    // Inserire il path del file da riprodurre (il comando play funziona solo su linux dopo aver installato "sox" tramite apt-install)
    // 2> /dev/null permette di riprodurre il suono in background.
    $soundPath = "sudo play /home/william/OneDrive/Desktop/sQuola/2022-2023/TPSIT/Socket/oroscopo/oroscopo-terminal/right-round-bracket 2> /dev/null";

    $socket = socket_create(AF_INET, SOCK_STREAM, 0) 
    or die ("\nNon riesco a creare la socket");

    $result = socket_connect($socket, $address, $port)
    or die ("\nNon riesco a connettermi alla socket");

    while(true) {        
        $day = 0;
        // Segno zodiacale input 
        $zodiac = readline("Inserisci un segno zodiacale, altrimenti digita quit: ");
        $zodiac = trim(strtolower($zodiac));

        socket_write($socket, $zodiac, strlen($zodiac))
        or die ("\nNon riesco a inviare il messaggio");
        if($zodiac === 'quit') break;
        

        // Giorno input
        while ($day <= 0 || $day > 31) {
            $day = readline("Inserisci il giorno corrente (da 1 a 31): ");
        } 
        
        socket_write($socket, $day, strlen($day)) 
        or die ("\nNon riesco a inviare il messaggio");


        $response = socket_read($socket, 1024)
        or die ("\nNon riesco a leggere il messaggio sulla socket");

        echo "\n$response\n\n";
        exec($soundPath);

    }

    socket_close($socket);

?> 
