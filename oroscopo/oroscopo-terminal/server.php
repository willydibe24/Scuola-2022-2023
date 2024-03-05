<?php 

    $address = "127.0.0.1";
    $port = 2222;

    $socket = socket_create(AF_INET, SOCK_STREAM, 0)
    or die ("\nNon riesco a creare la socket");

    // socket_close($socket);

    socket_bind($socket, $address, $port)
    or die ("\nNon riesco a bindare la socket");

    socket_listen($socket)
    or die ("\nNon riesco a mettermi in ascolto sulla socket");
    
    $spawn = socket_accept($socket)
    or die ("\nNon riesco ad accettare messaggi dalla socket");

    while(true) {
        $zodiac = socket_read($spawn, 1024)
        or die ("\nNon riesco a leggere messaggi dalla socket");
        
        $day = socket_read($spawn, 1024)
        or die ("\nNon riesco a leggere messaggi dalla socket");
        
        echo "giorno: " .$day . "\nzodiaco: " . $zodiac;
        
        $output = Horoscope($zodiac, $day);

        socket_write($spawn, $output, strlen($output))
        or die ("\nNon riesco ad inviare il messaggio");
    }    

    socket_close($socket);
    socket_close($spawn);
?> 

<?php 


    function Horoscope($zodiac, $currentDay) {
        switch($zodiac) {
            case "ariete":
                return randomQuote($currentDay, 1);
            case "toro":
                return randomQuote($currentDay, 2);
            case "gemelli":
                return randomQuote($currentDay, 3);
            case "cancro":
                return randomQuote($currentDay, 4);
            case "leone":
                return randomQuote($currentDay, 5);
            case "vergine":
                return randomQuote($currentDay, 6);
            case "bilancia":
                return randomQuote($currentDay, 7);
            case "scorpione":
                return randomQuote($currentDay, 8);
            case "sagittario":
                return randomQuote($currentDay, 9);
            case "capricorno":
                return randomQuote($currentDay, 10);
            case "acquario":
                return randomQuote($currentDay, 11);
            case "pesci":
                return randomQuote($currentDay, 12);
            default: 
                return "Il segno zodiacale inserito non esiste.";
        }
    }

    function randomQuote($currentDay, $index) {
        $quotes = [
            "Oggi è una bella giornata.",
            "Oggi è una brutta giornata.",
            "Oggi troverai l'amore della tua vita.",
            "Oggi avrai un sacco di fortuna.",
            "Oggi vincerai alla lotteria.",
            "Oggi perderai 1 milione di euro.",
            "Oggi la tua fortuna raggiungerà il picco.",
            "Oggi è meglio se non esci di casa.",
            "Oggi la tua vita avrà una svolta.",
            "Oggi dovrai prendere una scelta importante.",
            "Oggi non è il caso di sbilanciarsi.",
            "Oggi è meglio che nessuno ti parli."
        ];
        
        $toReturn = (count($quotes) + $currentDay + $index);
        
        $j = 0;

        for($i = 0; $i < $toReturn; $i++) {
            $j++;
            if ($j == count($quotes)) {
                $j = 0;
            }
        }

        return $quotes[$j];
    }
?>
