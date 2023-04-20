<?php 
    $address = "127.0.0.1";
    $port = 6990;
    set_time_limit(0);

    $socket = socket_create(AF_INET, SOCK_STREAM, 0);
    
    socket_connect($socket, $address, $port);

    while(true) {
        $input = readline("\nInserire una casella da colpire, separando la lettera e il numero con uno spazio [es: c 6], oppure digita 'exit': ");
        $input = strtolower($input);

        if($input == 'exit') {
            socket_write($socket, $input, strlen($input));
            break;
        }

        if(!is_numeric($input[0]) && $input[1] == " " && is_numeric($input[2])) {
            socket_write($socket, $input, strlen($input));
    
            $result = socket_read($socket, 1024);
            echo $result;
        } else {
            echo "";
        }
    }
    
    socket_close($socket);
?>