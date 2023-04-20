<?php 
    session_start();
    $min = 1;
    $max = 5;
?>

<?php 
    $address = "127.0.0.1";
    $port = 5000;
    set_time_limit(0);
    
    if(!isset($_SESSION['number'])) {
        $_SESSION['number'] = random_int($min, $max);
    }

    $socket = socket_create(AF_INET, SOCK_STREAM, 0)
    or die ("\nNon riesco a creare la socket");

    socket_bind($socket, $address, $port)
    or die ("\nNon riesco a bindare la socket");

    socket_listen($socket)
    or die ("\nNon riesco a mettermi in ascolto sulla socket");
    
    $spawn = socket_accept($socket)
    or die ("\nNon riesco ad accettare messaggi dalla socket");

    while(true) {
        $number = $_SESSION['number'];
        echo $number;
        $input = socket_read($spawn, 10)
        or die ("\nNon riesco a leggere messaggi dalla socket");

        $message = checkNumber($input, $number, $min, $max);

        socket_write($spawn, $message, strlen($message))
        or die ("\nNon riesco ad inviare il messaggio");
        
    }

    socket_close($socket);
    socket_close($spawn);
?> 


<?php 
    function checkNumber($number, $toGuess, $min, $max) {
        if($number > $toGuess) {
            return "$number è maggiore del numero da indovinare";
        } 
        
        if($number < $toGuess) {
            return "$number è minore del numero da indovinare";
        }

        $_SESSION['number'] = random_int($min, $max);
        return "Hai indovinato!";
    } 
?> 
