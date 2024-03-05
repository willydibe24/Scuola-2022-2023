<?php 

    $address = "127.0.0.1";
    $port = 3000;
    
    $date = "";
    $category = "";
    $beds = 0;

    $socket = socket_create(AF_INET, SOCK_STREAM, 0) 
    or die ("\nNon riesco a creare la socket");

    $result = socket_connect($socket, $address, $port)
    or die ("\nNon riesco a connettermi alla socket");

    while(true) {
        echo "\n\n";

        do {
            $date_in = readline("Inserisci la data del check-in [gg/mm/aaaa], altrimenti digita 'quit': ");
            if (strtolower($date_in) == 'quit') {
                socket_write($socket, $date_in, strlen($date_in))
                or die ("\nNon riesco a inviare la richiesta d'uscita");
                break 2;
            }
        } while ($date_in[2] != "/" || $date_in[5] != "/" || strlen($date_in) != 10);

        socket_write($socket, $date_in, strlen($date_in))
        or die ("\nNon riesco a inviare la data");


        do {
            $date_out = readline("Inserisci la data del check-out [gg/mm/aaaa]: ");
        } while ($date_out[2] != "/" || $date_out[5] != "/" || strlen($date_out) != 10);

        socket_write($socket, $date_out, strlen($date_out))
        or die ("\nNon riesco a inviare la data");


        do {
            $category = readline("Inserisci il tipo della stanza [normale/lussuosa]: ");
            $category = strtolower($category);
        } while ($category != "lussuosa" && $category != "normale");

        socket_write($socket, $category, strlen($category))
        or die ("\nNon riesco a inviare il tipo della stanza");


        do {
            $beds = readline("Inserisci il numero di letti: ");
        } while ($beds <= 0 || $beds > 3);

        socket_write($socket, $beds, strlen($beds))
        or die ("\nNon riesco a inviare il numero di letti");


        $response = socket_read($socket, 1024)
        or die ("\nNon riesco a leggere il messaggio sulla socket");

        
        // * If response == true
        if ($response == 1) {

            echo "\nStanza trovata! Per procedere con la prenotazione inserisci i tuoi dati personali:\n";

            $name = readline("Nome: ");
            socket_write($socket, $name, strlen($name))
            or die ("\nNon riesco a scrivere il nome sulla socket");


            $surname = readline("Cognome: ");
            socket_write($socket, $surname, strlen($surname))
            or die ("\nNon riesco a scrivere il cognome sulla socket");


            do {
                $age = readline("Età: ");
            } while(!is_numeric($age));

            socket_write($socket, $age, strlen($age))
            or die ("\nNon riesco a scrivere l'età sulla socket");


            do {
                $guests = readline("\nNumero ospiti [0/1/2]: ");
            } while ($guests < 0 || $guests > 2);

            socket_write($socket, $guests, strlen($guests))
            or die ("\nNon riesco a scrivere gli ospiti sulla socket");


            for($i = 0; $i < $guests; $i++) {
                $guest_name = readline("Nome ".$i + 1 ."° ospite: ");
                socket_write($socket, $guest_name, strlen($guest_name))
                or die ("\nNon riesco a scrivere il nome del $i ° ospite");

                $guest_surname = readline("\nCognome ".$i + 1 ."° ospite: ");
                socket_write($socket, $guest_surname, strlen($guest_surname))
                or die ("\nNon riesco a scrivere il cognome del $i ° ospite");

                do {
                    $guest_age = readline("\nEtà ".$i + 1 ."° ospite: ");
                } while (!is_numeric($guest_age));

                socket_write($socket, $guest_age, strlen($guest_age))
                or die ("\nNon riesco a scrivere l'età del $i ospite");
            }


            echo "\nInserire gli optionals desiderati, separandoli con una virgola: \n1)Frigo-bar\n2)Cassaforte\n3)Colazione\n4)Parcheggio\n0)Nessun optional\n\n";
            $optionals = readline();

            socket_write($socket, $optionals, strlen($optionals))
            or die ("\nNon riesco a scrivere gli optionals sulla socket");


            $response = socket_read($socket, 1024)
            or die ("\nNon riesco a leggere la risposta dalla socket");

            echo $response;

        } else {
            echo "\nNessuna stanza trovata. Riprova.";
        }
    }

    socket_close($socket);

?> 