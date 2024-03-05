<?php

    $address = "127.0.0.1";
    $port = 3000;
    $db = new mysqli($address, "root", "", "albergo");

    // Check connection
    if ($db -> connect_errno) {
        echo "Non riesco a connettermi al database: " . $db -> connect_error;
        exit();
    }
    
    $socket = socket_create(AF_INET, SOCK_STREAM, 0)
    or die ("\nNon riesco a creare la socket");

    socket_bind($socket, $address, $port)
    or die ("\nNon riesco a bindare la socket");
    
    // socket_close($socket);   

    socket_listen($socket)
    or die ("\nNon riesco a mettermi in ascolto sulla socket");
    
    $spawn = socket_accept($socket)
    or die ("\nNon riesco ad accettare messaggi dalla socket");

    while(true) {
        
        $date_in = socket_read($spawn, 1024)
        or die ("\nNon riesco a leggere la data di check-in dalla socket");
        
        if ($date_in == 'quit') break;
        
        $date_out = socket_read($spawn, 1024)
        or die ("\nNon riesco a leggere la data di check-out dalla socket");
        
        $category = socket_read($spawn, 1024)
        or die ("\nNon riesco a leggere il tipo dalla socket");
        
        $beds = socket_read($spawn, 1024)
        or die ("\nNon riesco a leggere il numero di letti dalla socket");

        
        $day_in = $date_in[0].$date_in[1];
        $month_in = $date_in[3].$date_in[4];
        $year_in = $date_in[6].$date_in[7].$date_in[8].$date_in[9];

        $day_out = $date_out[0].$date_out[1];
        $month_out = $date_out[3].$date_out[4];
        $year_out = $date_out[6].$date_out[7].$date_out[8].$date_out[9];
        
        $date_in = "$year_in-$month_in-$day_in";
        $date_out = "$year_out-$month_out-$day_out";

        while($beds <= 3) {
            $query_find_room = "
                SELECT stanze.id_stanza FROM stanze
                LEFT JOIN prenotazioni ON stanze.id_stanza = prenotazioni.id_stanza
                AND(prenotazioni.check_in > '$date_out' OR prenotazioni.check_out < '$date_in')
                WHERE prenotazioni.id_stanza IS NULL
                AND stanze.letti = $beds AND stanze.categoria = '$category';
            ";
    
            // * SELECT ROOM
            $room = $db -> query($query_find_room);
            $rooms = $room -> fetch_all(MYSQLI_ASSOC);

            if (count($rooms) > 0) break;
            $beds++;
        }


        if(count($rooms) > 0) {
            $room_id = $rooms[0]['id_stanza'];
            
            socket_write($spawn, 1, 1)
            or die ("\nNon riesco a inviare la conferma sulla socket");
        
            $name = socket_read($spawn, 1024)
            or die ("\nNon riesco a leggere il nome dalla socket");

            $surname = socket_read($spawn, 1024)
            or die ("\nNon riesco a leggere il cognome dalla socket");

            $age = socket_read($spawn, 1024)
            or die ("\nNon riesco a leggere l'età dalla socket");

            $guests = socket_read($spawn, 1024);


            $query_guests = [];
        

            for($i = 0; $i < $guests; $i++) {

                $g_name = socket_read($spawn, 1024)
                or die ("\nNon riesco a leggere il nome del $i ° ospite");
                
                $g_surname = socket_read($spawn, 1024)
                or die ("\nNon riesco a leggere il cognome del $i ° ospite");

                $g_age = socket_read($spawn, 1024)
                or die ("\nNon riesco a leggere l'età del $i ° ospite");

                array_push($query_guests, "
                    INSERT INTO ospiti (nome, cognome, eta) 
                    VALUES ('$g_name', '$g_surname', '$g_age');
                "); 
            }

            $optionals = socket_read($spawn, 1024);
            $optionals = str_replace(",", "", $optionals);

            $bool_optionals = [0, 0, 0, 0];

            for($i = 0; $i < strlen($optionals); $i++) {
                $bool_optionals[$optionals[$i] - 1] = 1;
            }
            
            $query_customer = "
                INSERT INTO clienti (nome, cognome, eta)
                VALUES ('$name', '$surname', $age);
            ";
            
            // * INSERT CLIENTE
            $db -> query($query_customer);
            $customer_id = $db -> insert_id;


            $query_reservation = "
                INSERT INTO prenotazioni (
                    id_cliente,
                    id_stanza,
                    check_in, 
                    check_out, 
                    frigobar, 
                    cassaforte, 
                    colazione, 
                    parcheggio
                    ) VALUES (
                        $customer_id,
                        $room_id,
                        '$date_in',
                        '$date_out',
                        $bool_optionals[0],
                        $bool_optionals[1],
                        $bool_optionals[2],
                        $bool_optionals[3]
                    )
            ";
                
            // * INSERT PRENOTAZIONE
            $db -> query($query_reservation);
            $reservation_id = $db -> insert_id;

            
            $guests_id = [];

            for($i = 0; $i < count($query_guests); $i++) {
                // * INSERT OSPITI
                $db -> query($query_guests[$i]);
                array_push($guests_id, $db -> insert_id);
            }

            for($i = 0; $i < count($guests_id); $i++) {
                $host_query = "
                    INSERT INTO ospitare (id_ospite, id_prenotazione)
                    VALUES ($guests_id[$i], $reservation_id);
                ";

                // * INSERT OSPITARE
                $db -> query($host_query);
            }


            $date1 = DateTime::createFromFormat("Y-m-d", $date_out);
            $date2 = DateTime::createFromFormat("Y-m-d", $date_in);
    
            $diff = $date1 -> diff($date2);
            $lasted_days = $diff -> days;

            $query_room_cost = "
                SELECT costo FROM stanze WHERE id_stanza = $room_id;
            ";

            $room_cost = $db -> query($query_room_cost);
            $cost = $room_cost -> fetch_all(MYSQLI_ASSOC);
            $cost = $cost[0]['costo'];
            
            $final_price = $cost * ($lasted_days * (strlen($optionals) * 1.2));
            
            $response = "\nPrenotazione effettuata con successo! Grazie $name $surname.";
            $response .= "\nDettagli prenotazione:\nCosto totale: €$final_price\nNumero di letti: $beds";
            
            
            socket_write($spawn, $response, strlen($response))
            or die ("\nNon riesco ad inviare l'output sulla socket");


            $room -> free();
            $room_cost -> free();

        } else {
            socket_write($spawn, 0, 1)
            or die ("\nNon riesco a inviare la risposta sulla socket");
        } 
    }

    $db->close();
    socket_close($socket);
    socket_close($spawn);

?> 