<?php
/*
//Test Variabeln
$cpu = 6;
$ram = 32768;
$ssd = 2000;
$k_id = 6666;
*/
$oldprice = 0;
$i_id = "small";

//Variabeln
$cpu = $_POST["cpu"];
$ram = $_POST["ram"];
$ssd = $_POST["ssd"];
$k_id = $_POST["k_id"];
$absenden = $_POST["absenden"];

//Paths
$filepath = "..\Log\server\server_cs.txt";
$fail_path = "..\Log\server_fail.txt";
$user_path = "..\Log\user\ " . $k_id . ".txt";
$userlogpath = "..\Log\user_changes\user_log.txt";


//Funktionen

function getPrice($cpu, $ram, $ssd)
{
    //preis berechnen
    switch ($cpu) {
        case 1:
            $cpu_price = 5;
            break;
        case 2:
            $cpu_price = 10;
            break;
        case 4:
            $cpu_price = 18;
            break;
        case 8:
            $cpu_price = 30;
            break;
        case 16:
            $cpu_price = 45;
            break;
    }
    switch ($ram) {
        case 512:
            $ram_price = 5;
            break;
        case 1024:
            $ram_price = 10;
            break;
        case 2048:
            $ram_price = 20;
            break;
        case 4096:
            $ram_price = 40;
            break;
        case 8192:
            $ram_price = 80;
            break;
        case 16384:
            $ram_price = 160;
            break;
        case 32768:
            $ram_price = 320;
            break;
    }
    switch ($ssd) {
        case 10:
            $ssd_price = 5;
            break;
        case 20:
            $ssd_price = 10;
            break;
        case 40:
            $ssd_price = 20;
            break;
        case 80:
            $ssd_price = 40;
            break;
        case 240:
            $ssd_price = 120;
            break;
        case 500:
            $ssd_price = 250;
            break;
        case 1000:
            $ssd_price = 500;
            break;
    }

    $price = $cpu_price + $ram_price + $ssd_price;
    return $price;
}



//überprüfung der eingabe Serverseitig




if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["k_id"]) && isset($_POST["absenden"]) && !empty(trim(is_numeric($_POST["k_id"])))) {





    // das File server_cs.txt lesen
// Prüft ob er zugriff auf die Daten hat da uhne diese nicht berechnet werden kann
    if (file_exists($filepath)) {

        $server = file_get_contents($filepath);

        $serverextract = explode("||", $server);

        $small_get1 = explode(";", $serverextract[0]);
        $medium_get1 = explode(";", $serverextract[1]);
        $big_get1 = explode(";", $serverextract[2]);

        //Defenition der Server
        $small = array("server" => $small_get1[0], "cpu" => $small_get1[1], "ram" => $small_get1[2], "ssd" => $small_get1[3], );
        $medium = array("server" => $medium_get1[0], "cpu" => $medium_get1[1], "ram" => $medium_get1[2], "ssd" => $medium_get1[3], );
        $big = array("server" => $big_get1[0], "cpu" => $big_get1[1], "ram" => $big_get1[2], "ssd" => $big_get1[3], );

        //Funktuionen add and take da server array required


        //create one file per user
        $price = getPrice($cpu, $ram, $ssd);
        if (file_exists($user_path)) {
            $newprice = $oldprice + $price;
            file_put_contents($user_path, $k_id . ";" . $s_id . ";" . $cpu . ";" . $ram . ";" . $ssd . ";" . $newprice . ";" . "changed" . ";");
            // user log überschreibung der alten daten 
            $changed = true;
        } else {
            file_put_contents($user_path, $k_id . ";" . $s_id . ";" . $cpu . ";" . $ram . ";" . $ssd . ";" . $price . ";" . "-" . ";");
            // user log neue Datei
            $changed = false;
        }


        if (file_exists($user_path)) {

            $old_get = file_get_contents($user_path);
            $old_extract = explode(";", $old_get);
            if ($old_extract[5] == "changed") {

                $old_cpu = $old_extract[1];
                $old_ram = $old_extract[2];
                $old_ssd = $old_extract[3];

                $cpu_diff = $cpu - $old_cpu;
                $ram_diff = $ram - $old_ram;
                $ssd_diff = $ssd - $old_ssd;


                // change the server arrays



                //Print out for testing
                print_r($small_changed);
                print_r($medium_changed);
                print_r($big_changed);




            }


        }




        //log file schreiben
        $userlog = "USER: " . $k_id . " CPU: " . $cpu . " RAM: " . $ram . " SSD: " . $ssd . " TIME: " . date("Y-m-d H:i:s") . " Changed: " . ($changed ? "True" : "False") . "\n";
        file_put_contents($userlogpath, $userlog, FILE_APPEND);

    } else {
        echo "<br>" . "Kein Zugriff auf die Server Daten" . "<br>";
    }
    ;

    echo "somit haben sie erfolgreich einen Server gemietet" . "<br>";
    echo "dieser läuft unter der Kunden Nummer " . $k_id . "<br>";

} else {
    // Fail Log
    echo "Bitte geben Sie eine Kunden ID ein" . "<br>";
    $fail_log = " Login versuch :" . date("Y-m-d H:i:s") . ";" . (isset($_POST["k_id"]) ? $k_id : $note) . ";" . $cpu . ";" . $ram . ";" . $ssd . ";" . "\n";
    $note = "ID not Found";
    file_put_contents($fail_path, $fail_log, FILE_APPEND);

}

?>