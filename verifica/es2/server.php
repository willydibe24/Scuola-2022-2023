<?php 
    $address = "127.0.0.1";
    $port = 6990;
    set_time_limit(0);

    $input = "";

    $target = ["\nColpito!\n", "\nMancato, ritenta!\n"];

    $socket = socket_create(AF_INET, SOCK_STREAM, 0);

    socket_bind($socket, $address, $port);

    socket_listen($socket);
    $sk = socket_accept($socket);

    while(true) {
        $input = socket_read($sk, 1024);

        if ($input == 'exit') break;

        $output = $target[random_int(0,1)];
        socket_write($sk, $output, strlen($output));
    }

    socket_close($socket);
    socket_close($sk);
?>