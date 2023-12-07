<?php
/*
//Test Variabeln
$cpu = 6;
$ram = 32768;
$ssd = 2000;
$k_id = 6666;
*/


//Variabeln
$cpu = $_POST["cpu"];
$ram = $_POST["ram"];
$ssd = $_POST["ssd"];
$k_id = $_POST["k_id"];
$absenden = $_POST["absenden"];

//Paths
$filepath = "..\Log\server\server_cs.txt";
$fail_path = "..\Log\server_fail.txt";
$user_path = "..\Log\user\ ".$k_id.".txt";
$userlogpath = "..\Log\user_changes\user_log.txt";



//überprüfung der eingabe Serverseitig


if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["k_id"]) && isset($_POST["absenden"]) && !empty(trim(is_numeric($_POST["k_id"])))){

function getPrice($cpu, $ram, $ssd){
    swich($cpu){
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
        default:
            $cpu_price = 0;
            break;
    }
    swich ($ram){
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
        default:
            $ram_price = 0;
            break;
        switch ($ssd){
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
                $ssd_price = 80;
                break;
            case 500:
                $ssd_price = 160;
                break;
            case 1000:
                $ssd_price = 320;
                break;
            default:
                $ssd_price = 0;
                break;
            }
    }
}


// das File server_cs.txt lesen


if (file_exists($filepath)) {

$server = file_get_contents($filepath);

$serverextract = explode("||", $server);
//print_r($serverextract);


$small_get1 = explode(";",$serverextract[0]);
$medium_get1 = explode(";",$serverextract[1]);
$big_get1 = explode(";",$serverextract[2]);


$small = array("server" => $small_get1[0], "cpu" => $small_get1[1], "ram" => $small_get1[2], "ssd" => $small_get1[3], );
$medium = array("server" => $medium_get1[0], "cpu" => $medium_get1[1], "ram" => $medium_get1[2], "ssd" => $medium_get1[3], );
$big = array("server" => $big_get1[0], "cpu" => $big_get1[1], "ram" => $big_get1[2], "ssd" => $big_get1[3], );


//create one file per user
$price = 0;
if (file_exists($user_path)){
    file_put_contents($user_path, $k_id . ";" . $cpu . ";" . $ram . ";" . $ssd . ";". $price .  ";". "changed" .";");
    // user log überschreibung der alten daten 
    $changed = true;
}else{
    file_put_contents($user_path, $k_id . ";" . $cpu . ";" . $ram . ";" . $ssd . ";");
    // user log neue Datei
    $changed = false;
}


//log file schreiben
$userlog = "USER: ".$k_id. " CPU: ".$cpu. " RAM: ".$ram. " SSD: ".$ssd. " TIME: ".date("Y-m-d H:i:s")." Changed: ". ($changed?"True":"False")."\n";
file_put_contents($userlogpath, $userlog, FILE_APPEND);


} else {
   echo "File nicht gefunden"."<br>";
};


echo "somit haben sie erfolgreich einen Server gemietet"."<br>";
echo "dieser läuft unter der Kunden Nummer ".$k_id."<br>";

}else{
// Fail Log
echo "Bitte geben Sie eine Kunden ID ein"."<br>";
$fail_log =" Login versuch :" . date("Y-m-d H:i:s") . ";" . (isset($_POST["k_id"])? $k_id : $note)  . ";" . $cpu . ";" . $ram . ";" . $ssd . ";" . "\n";
$note = "ID not Found";
file_put_contents($fail_path,$fail_log, FILE_APPEND);

}

?>