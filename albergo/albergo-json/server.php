<?php

    $address = "127.0.0.1";
    $port = 3000;
    $numberOfRooms = 3; // Numero di stanze presenti nel file JSON

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
        
        $date_in = DateTime::createFromFormat('Y-m-d', "$year_in-$month_in-$day_in");
        $date_out = DateTime::createFromFormat('Y-m-d', "$year_out-$month_out-$day_out");


        $room_key = FindRoom($date_in, $date_out, $category, $beds);

        socket_write($spawn, $room_key, strlen($room_key))
        or die ("\nNon riesco ad inviare il messaggio");

 
        if($room_key >= "room") {
            
            $name = socket_read($spawn, 1024)
            or die ("\nNon riesco a leggere il nome dalla socket");

            $surname = socket_read($spawn, 1024)
            or die ("\nNon riesco a leggere il cognome dalla socket");

            $age = socket_read($spawn, 1024)
            or die ("\nNon riesco a leggere l'età dalla socket");

            $guests = socket_read($spawn, 1024);

            $guest_name = [];
            $guest_surname = [];
            $guest_age = [];
        
            
            for($i = 0; $i < $guests; $i++) {

                $g_name = socket_read($spawn, 1024)
                or die ("\nNon riesco a leggere il nome del $i ° ospite");
                array_push($guest_name, $g_name);
                
                $g_surname = socket_read($spawn, 1024)
                or die ("\nNon riesco a leggere il cognome del $i ° ospite");
                array_push($guest_surname, $g_surname);

                $g_age = socket_read($spawn, 1024)
                or die ("\nNon riesco a leggere l'età del $i ° ospite");
                array_push($guest_age, $g_age);

            }

            $optionals = socket_read($spawn, 1024);
            $optionals = str_replace(",", "", $optionals);

            $bool_optionals = [false, false, false, false];

            for($i = 0; $i < strlen($optionals); $i++) {
                $bool_optionals[$optionals[$i] - 1] = true;
            }


            if(file_exists("rooms.json")) {

                $filename = "rooms.json";
                $data = file_get_contents($filename);
                $rooms = json_decode($data);


                $rooms -> $room_key -> prenotation -> start_date -> day = $day_in;
                $rooms -> $room_key -> prenotation -> start_date -> month = $month_in;
                $rooms -> $room_key -> prenotation -> start_date -> year = $year_in;
                
                $rooms -> $room_key -> prenotation -> end_date -> day = $day_out;
                $rooms -> $room_key -> prenotation -> end_date -> month = $month_out;
                $rooms -> $room_key -> prenotation -> end_date -> year = $year_out;
                
                $rooms -> $room_key -> prenotation -> extras -> refrigerator = $bool_optionals[0];
                $rooms -> $room_key -> prenotation -> extras -> safe = $bool_optionals[1];
                $rooms -> $room_key -> prenotation -> extras -> breakfast = $bool_optionals[2];
                $rooms -> $room_key -> prenotation -> extras -> parking = $bool_optionals[3];
                
                $rooms -> $room_key -> prenotation -> customer -> name = $name;
                $rooms -> $room_key -> prenotation -> customer -> surname = $surname;
                $rooms -> $room_key -> prenotation -> customer -> age = $age;

                for($i = 0; $i < count($guest_name); $i++) {
                    $selected_guest = "guest".$i + 1;

                    $rooms -> $room_key -> prenotation -> $selected_guest -> name = $guest_name[$i];
                    $rooms -> $room_key -> prenotation -> $selected_guest -> surname = $guest_surname[$i];
                    $rooms -> $room_key -> prenotation -> $selected_guest -> age = $guest_age[$i];
                }

                $mod_rooms = json_encode($rooms);
                file_put_contents($filename, $mod_rooms);

                $cost = $rooms -> $room_key -> prenotation -> customer -> cost;
                $lasted_days = $date_out -> diff($date_in); 

                $final_price = $cost * $lasted_days -> days * (strlen($optionals) * 1.2);

                $response = "\nPrenotazione effettuata con successo! Grazie $name $surname.";
                $response .= "
                \nDettagli prenotazione:\nCosto totale: €$final_price\nNumero di letti: " .$rooms -> $room_key -> beds;
                
            } else {

                $response = "\nIl file delle camere non esiste.";
            }

            socket_write($spawn, $response, strlen($response));

        }
        
    }

    socket_close($socket);
    socket_close($spawn);

?> 


<?php 

    function FindRoom($date_in, $date_out, $category, $beds) {

        if (file_exists("rooms.json")) {
            $filename = "rooms.json";
            $data = file_get_contents($filename);
            $rooms = json_decode($data);

            for ($i = 1; $i <= $GLOBALS['numberOfRooms']; $i++) {
                $room_key = 'room'.$i;  

                $day_in = $rooms -> $room_key -> prenotation -> start_date -> day;
                $month_in = $rooms -> $room_key -> prenotation -> start_date -> month;
                $year_in = $rooms -> $room_key -> prenotation -> start_date -> year;

                $day_out = $rooms -> $room_key -> prenotation -> end_date -> day;
                $month_out = $rooms -> $room_key -> prenotation -> end_date -> month;
                $year_out = $rooms -> $room_key -> prenotation -> end_date -> year;


                $curr_start_date = DateTime::createFromFormat('Y-m-d', "$year_in-$month_in-$day_in");
                $curr_end_date = DateTime::createFromFormat('Y-m-d', "$year_out-$month_out-$day_out");
                $curr_type = $rooms -> $room_key -> category;
                $curr_beds = $rooms -> $room_key -> beds;


                $status = "";
                
                if($date_in > $curr_end_date || $date_out < $curr_start_date) { 
                    if($curr_type == $category) {
                        if($curr_beds == $beds) {
                            InitializeRoom($rooms, $room_key);
                            return $room_key;

                        } else {
                            $status = "Nessuna stanza con $beds posti letto è stata trovata per questa data.";
                        }
                    } else {
                        $status = "Nessuna stanza di tipo $category è stata trovata per questa data.";
                    }
                } else {
                    $status = "Nessuna stanza $category disponibile per il periodo tra il ". $date_in -> format('d-m-Y') ." e il ". $date_out -> format ('d-m-Y').". Riprova con un'altra data.";
                }  
            }

            if ($beds < 3) {
                //* Funzione ricorsiva con numero di letti incrementato di 1
                $status = FindRoom($date_in, $date_out, $category, $beds + 1);
            }
            return $status;
        }
        return "Il file cercato è stato eliminato";
    }

?>  


<?php 

    function InitializeRoom($rooms, $room_key) {

        $filename = "rooms.json";

        $rooms -> $room_key -> prenotation -> start_date -> day = 1;
        $rooms -> $room_key -> prenotation -> start_date -> month = 1;
        $rooms -> $room_key -> prenotation -> start_date -> year = 1900;
        
        $rooms -> $room_key -> prenotation -> end_date -> day = 1;
        $rooms -> $room_key -> prenotation -> end_date -> month = 1;
        $rooms -> $room_key -> prenotation -> end_date -> year = 10000;
        
        $rooms -> $room_key -> prenotation -> extras -> refrigerator = false;
        $rooms -> $room_key -> prenotation -> extras -> safe = false;
        $rooms -> $room_key -> prenotation -> extras -> breakfast = false;
        $rooms -> $room_key -> prenotation -> extras -> parking = false;
        
        $rooms -> $room_key -> prenotation -> customer -> name = "";
        $rooms -> $room_key -> prenotation -> customer -> surname = "";
        $rooms -> $room_key -> prenotation -> customer -> age = 0;
        
        $rooms -> $room_key -> prenotation -> guest1 -> name = "";
        $rooms -> $room_key -> prenotation -> guest1 -> surname = "";
        $rooms -> $room_key -> prenotation -> guest1 -> age = 0;

        $rooms -> $room_key -> prenotation -> guest2 -> name = "";
        $rooms -> $room_key -> prenotation -> guest2 -> surname = "";
        $rooms -> $room_key -> prenotation -> guest2 -> age = 0;
        
        $mod_rooms = json_encode($rooms);
        file_put_contents($filename, $mod_rooms);

    }

?>
