<?php 



//Testvariabeln
 $cpu =  4;
 $ram =  32768;
 $ssd = 4000;
 $k_id = 123456;
/*
// Variablen
$cpu =  $_POST['cpu'];
$ram =  $_POST['ram'];
$ssd = $_POST['ssd'];
$id = $_POST['k_id'];
*/


$filename = "Log\server.txt";
$log = "Log\server_log.txt";
$Kunden_LOG = "Log\kunden_log.txt";



// Test eingabe Serverseitig

if (isset($_POST["k_id"])) {
    if (empty(trim($_POST["id"]))) {
        echo "Bitte Kunden ID eingeben";
    } else {

        $k_id = htmlspecialchars(trim($_POST["k_id"]));
    }
}  


// Server Größen
$small = array("cpu" => 4, "ram" => 32768, "ssd" => 4000);
$medium = array("cpu" => 8, "ram" => 65536, "ssd" => 8000);
$big = array("cpu" => 16, "ram" => 131072, "ssd" => 16000);

// Clone
$c_small = array("cpu" => 4, "ram" => 32768, "ssd" => 4000);
$c_medium = array("cpu" => 8, "ram" => 65536, "ssd" => 8000);
$c_big = array("cpu" => 16, "ram" => 131072, "ssd" => 16000);




// lies das File server.txt aus und speichere es in $getfile

$getfile = file_get_contents($filename);

// Teile den Inhalt von $getfile in ein Array auf
$server = explode("\n", $getfile);

// Teile den Inhalt von $server in ein Array auf
$server_small = explode(";", $server[0]);
$server_medium = explode(";", $server[1]);
$server_big = explode(";", $server[2]);


$filevalues_small = array("cpu" => $server_small[0], "ram" => $server_small[1], "ssd" => $server_small[2]);
$filevalues_medium = array("cpu" => $server_medium[0], "ram" => $server_medium[1], "ssd" => $server_medium[2]);
$filevalues_big = array("cpu" => $server_big[0], "ram" => $server_big[1], "ssd" => $server_big[2]);



//inhalt vom server file
$inhalt = "cpu!".$c_small["cpu"] . ";" ."ram!". $c_small["ram"] . ";"."ssd!". $c_small["ssd"] . " "."cpu!".$c_medium["cpu"] . ";" ."ram!". $c_medium["ram"] . ";"."ssd!". $c_medium["ssd"] . "\n"."cpu!".$c_big["cpu"] . ";" ."ram!". $c_big["ram"] . ";"."ssd!". $c_big["ssd"];

//log kunden
$k_logfile = "Id!".$k_id . ";" ."cpu!". $cpu . ";"."ram!". $ram . ";"."ssd!". $ssd . "\n";



// Ausgabe
//kleiner Server 
if ($c_small["cpu"] <= 0 || $c_small["ram"] <= 0 || $c_small["ssd"] <= 0) {
    if ($cpu <= $small["cpu"] && $ram <= $small["ram"] && $ssd <= $small["ssd"]) {
        $c_small = array("cpu" => $small["cpu"] - $cpu, "ram" => $small["ram"] - $ram, "ssd" => $small["ssd"] - $ssd);
        echo "Small Server"." ". print_r($c_small);        }
//Mittlerer Server
} elseif ($c_medium["cpu"] <= 0 || $c_medium["ram"] <= 0 || $c_medium["ssd"] <= 0) {
    if ($cpu <= $medium["cpu"] && $ram <= $medium["ram"] && $ssd <= $medium["ssd"]) {
        $c_medium = array("cpu" => $medium["cpu"] - $cpu, "ram" => $medium["ram"] - $ram, "ssd" => $medium["ssd"] - $ssd);
        echo "Medium Server"." ". print_r($c_medium);
    } 
//Großer Server
} elseif ($c_big["cpu"] <= 0 || $c_big["ram"] <= 0 || $c_big["ssd"] <= 0) {
    
    if ($cpu <= $big["cpu"] && $ram <= $big["ram"] && $ssd <= $big["ssd"]) {
        $c_big = array("cpu" => $big["cpu"] - $cpu, "ram" => $big["ram"] - $ram, "ssd" => $big["ssd"] - $ssd);
        echo "Big Server"." ". print_r($c_big);
    }
//Wenn nichts gefunden wurde
} else {
    echo "Keine passenden Server gefunden";
    
}





?>