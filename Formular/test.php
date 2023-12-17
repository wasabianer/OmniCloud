<?php

//Variabeln
$cpu = $_POST["cpu"];
$ram = $_POST["ram"];
$ssd = $_POST["ssd"];
$k_id = $_POST["k_id"];
$absenden = $_POST["absenden"];

//Paths
$filepath = "..\Log\server\server_cs.txt";
$fail_path = "..\Log\server_fail.txt";
$user_path = "..\Log\user\user_" . $k_id . ".txt";
$userlogpath = "..\Log\user_changes\user_log.txt";

//File
if (file_exists($user_path)) {
    $old_get = file_get_contents($user_path);
    $old_extract = explode(";", $old_get);
}

//Funktionen

//Debuging 
function printArray($small, $medium, $big)
{
    echo print_r($small);
    echo "<br>";
    print_r($medium);
    echo "<br>";
    print_r($big);
    echo "<br>";
}
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
function choose_Server($cpu, $ram, $ssd, $small_get1, $medium_get1, $big_get1)
{
    if ($cpu <= $small_get1[1] && $ram <= $small_get1[2] && $ssd <= $small_get1[3]) {
        $s_id = 1;
        return $s_id;
    } elseif ($cpu <= $medium_get1[1] && $ram <= $medium_get1[2] && $ssd <= $medium_get1[3]) {
        $s_id = 2;
        return $s_id;
    } elseif ($cpu <= $big_get1[1] && $ram <= $big_get1[2] && $ssd <= $big_get1[3]) {
        $s_id = 3;
        return $s_id;
    } else {
        echo "Momentan haben wir keinen Platz für ihre Konfiguration" . "<br>";
    }
}
function updateServera($cpu, $ram, $ssd, $user_path, $small, $medium, $big, $small_get1, $medium_get1, $big_get1, $s_id, $filepath)
{
    if (!file_exists($user_path)) {
        //echo "Neu" . "<br>";
        $s_id = choose_Server($cpu, $ram, $ssd, $small_get1, $medium_get1, $big_get1);
        switch ($s_id) {
            case 1:
                $small = array("server" => $small_get1[0], "cpu" => $small_get1[1] - $cpu, "ram" => $small_get1[2] - $ram, "ssd" => $small_get1[3] - $ssd,);
                break;
            case 2:
                $medium = array("server" => $medium_get1[0], "cpu" => $medium_get1[1] - $cpu, "ram" => $medium_get1[2] - $ram, "ssd" => $medium_get1[3] - $ssd,);
                break;
            case 3:
                $big = array("server" => $big_get1[0], "cpu" => $big_get1[1] - $cpu, "ram" => $big_get1[2] - $ram, "ssd" => $big_get1[3] - $ssd,);
                break;
        }

        file_put_contents($filepath, $small["server"] . ";" . $small["cpu"] . ";" . $small["ram"] . ";" . $small["ssd"] . "||" . $medium["server"] . ";" . $medium["cpu"] . ";" . $medium["ram"] . ";" . $medium["ssd"] . "||" . $big["server"] . ";" . $big["cpu"] . ";" . $big["ram"] . ";" . $big["ssd"] . ";");
    }
}
function updateServerb($cpu, $ram, $ssd, $user_path, $small, $medium, $big, $small_get1, $medium_get1, $big_get1, $s_id, $filepath)
{
    $old_get = file_get_contents($user_path);
    $old_extract = explode(";", $old_get);

    if ($old_extract[1] == $s_id) {
        $newcpu = $cpu - $old_extract[2];
        $newram = $ram - $old_extract[3];
        $newssd = $ssd - $old_extract[4];

        //echo "gleich" . "<br>";
        switch ($old_extract[1]) {
            case 1:
                $small = array("server" => $small_get1[0], "cpu" => $small_get1[1] + $newcpu, "ram" => $small_get1[2] + $newram, "ssd" => $small_get1[3] + $newssd,);
                break;
            case 2:
                $medium = array("server" => $medium_get1[0], "cpu" => $medium_get1[1] + $newcpu, "ram" => $medium_get1[2] + $newram, "ssd" => $medium_get1[3] + $newssd,);
                break;
            case 3:
                $big = array("server" => $big_get1[0], "cpu" => $big_get1[1] + $newcpu, "ram" => $big_get1[2] + $newram, "ssd" => $big_get1[3] + $newssd,);
                break;
        }

        file_put_contents($filepath, $small["server"] . ";" . $small["cpu"] . ";" . $small["ram"] . ";" . $small["ssd"] . "||" . $medium["server"] . ";" . $medium["cpu"] . ";" . $medium["ram"] . ";" . $medium["ssd"] . "||" . $big["server"] . ";" . $big["cpu"] . ";" . $big["ram"] . ";" . $big["ssd"] . ";");
    }
}

function updateServerc($cpu, $ram, $ssd, $user_path, $small, $medium, $big, $small_get1, $medium_get1, $big_get1, $old_extract, $s_id, $filepath)
{

    $old_get = file_get_contents($user_path);
    $old_extract = explode(";", $old_get);

    //echo "neu verteilen" . "<br>";
    $old = $old_extract[1];
    //echo $old . "<br>";

    if ($old == 1 && $s_id == 2) {
        // Resourcen freigeben
        $small = array("server" => $small_get1[0], "cpu" => $small_get1[1] + $old_extract[3], "ram" => $small_get1[2] + $old_extract[4], "ssd" => $small_get1[3] + $old_extract[5],);
        // Resourcen belegen
        $medium = array("server" => $medium_get1[0], "cpu" => $medium_get1[1] - $cpu, "ram" => $medium_get1[2] - $ram, "ssd" => $medium_get1[3] - $ssd,);
    } else if ($old == 1 && $s_id == 3) {
        // Resourcen freigeben
        $small = array("server" => $small_get1[0], "cpu" => $small_get1[1] + $old_extract[3], "ram" => $small_get1[2] + $old_extract[4], "ssd" => $small_get1[3] + $old_extract[5],);
        // Resourcen belegen
        $big = array("server" => $big_get1[0], "cpu" => $big_get1[1] + $cpu, "ram" => $big_get1[2] + $ram, "ssd" => $big_get1[3] + $ssd,);
    } else if ($old == 2 && $s_id == 1) {
        // Resourcen freigeben
        $medium = array("server" => $medium_get1[0], "cpu" => $medium_get1[1] + $old_extract[3], "ram" => $medium_get1[2] + $old_extract[4], "ssd" => $medium_get1[3] + $old_extract[5],);
        // Resourcen belegen
        $small = array("server" => $small_get1[0], "cpu" => $small_get1[1] - $cpu, "ram" => $small_get1[2] - $ram, "ssd" => $small_get1[3] - $ssd,);
    } else if ($old == 2 && $s_id == 3) {
        // Resourcen freigeben
        $medium = array("server" => $medium_get1[0], "cpu" => $medium_get1[1] + $old_extract[3], "ram" => $medium_get1[2] + $old_extract[4], "ssd" => $medium_get1[3] + $old_extract[5],);
        //Resourcen belegen
        $big = array("server" => $big_get1[0], "cpu" => $big_get1[1] - $cpu, "ram" => $big_get1[2] - $ram, "ssd" => $big_get1[3] - $ssd,);
    } else if ($old == 3 && $s_id == 2) {
        // Resourcen freigeben
        $big = array("server" => $big_get1[0], "cpu" => $big_get1[1] + $old_extract[3], "ram" => $big_get1[2] + $old_extract[4], "ssd" => $big_get1[3] + $old_extract[5],);
        //Resourcen belegen
        $medium = array("server" => $medium_get1[0], "cpu" => $medium_get1[1] - $cpu, "ram" => $medium_get1[2] - $ram, "ssd" => $medium_get1[3] - $ssd,);
    } else if ($old == 3 && $s_id == 1) {
        // Resourcen freigeben
        $big = array("server" => $big_get1[0], "cpu" => $big_get1[1] + $old_extract[3], "ram" => $big_get1[2] + $old_extract[4], "ssd" => $big_get1[3] + $old_extract[5],);
        //Resourcen belegen
        $small = array("server" => $small_get1[0], "cpu" => $small_get1[1] - $cpu, "ram" => $small_get1[2] - $ram, "ssd" => $small_get1[3] - $ssd,);
    }
    file_put_contents($filepath, $small["server"] . ";" . $small["cpu"] . ";" . $small["ram"] . ";" . $small["ssd"] . "||" . $medium["server"] . ";" . $medium["cpu"] . ";" . $medium["ram"] . ";" . $medium["ssd"] . "||" . $big["server"] . ";" . $big["cpu"] . ";" . $big["ram"] . ";" . $big["ssd"] . ";");
    print_r($small);
    print_r($medium);
    print_r($big);
}


//Funktion um die Recurcen zu berechnen und von den Servern abzuziehen

//überprüfung der eingabe Serverseitig

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["absenden"]) && !empty(trim(is_numeric($_POST["k_id"]))) && !empty(trim(is_numeric($_POST["cpu"]))) && !empty(trim(is_numeric($_POST["ssd"]))) && !empty(trim(is_numeric($_POST["ram"])))) {


    // das File server_cs.txt lesen
    // Prüft ob er zugriff auf die Daten hat da uhne diese nicht berechnet werden kann
    if (file_exists($filepath)) {

        $server = file_get_contents($filepath);

        $serverextract = explode("||", $server);

        $small_get1 = explode(";", $serverextract[0]);
        $medium_get1 = explode(";", $serverextract[1]);
        $big_get1 = explode(";", $serverextract[2]);

        //Defenition der Server
        $small = array("server" => $small_get1[0], "cpu" => $small_get1[1], "ram" => $small_get1[2], "ssd" => $small_get1[3],);
        $medium = array("server" => $medium_get1[0], "cpu" => $medium_get1[1], "ram" => $medium_get1[2], "ssd" => $medium_get1[3],);
        $big = array("server" => $big_get1[0], "cpu" => $big_get1[1], "ram" => $big_get1[2], "ssd" => $big_get1[3],);
        /*echo "first";
        echo "<br>";
        printArray($small, $medium, $big);
        echo "second";
        echo "<br>";*/
        //abzug

        //beim Neuerstellen einer VM


        //create one file per user
        $price = getPrice($cpu, $ram, $ssd);
        if (file_exists($user_path)) {
            $s_id = choose_Server($cpu, $ram, $ssd, $small_get1, $medium_get1, $big_get1);
            if ($s_id == $old_extract[1]) {
                updateServerb($cpu, $ram, $ssd, $user_path, $small, $medium, $big, $small_get1, $medium_get1, $big_get1, $s_id, $old_extract, $filepath);
            } else {
                updateServerc($cpu, $ram, $ssd, $user_path, $small, $medium, $big, $small_get1, $medium_get1, $big_get1, $s_id, $old_extract, $filepath);
            }
            file_put_contents($user_path, $k_id . ";" . $s_id . ";" . $cpu . ";" . $ram . ";" . $ssd . ";" . $price . ";" . "changed" . ";");
            // user log überschreibung der alten daten 
            $changed = true;
        } else {
            //echo "neu_2" . "<br>";
            $s_id = choose_Server($cpu, $ram, $ssd, $small_get1, $medium_get1, $big_get1);
            updateServera($cpu, $ram, $ssd, $user_path, $small, $medium, $big, $small_get1, $medium_get1, $big_get1, $s_id, $filepath);
            file_put_contents($user_path, $k_id . ";" . $s_id . ";" . $cpu . ";" . $ram . ";" . $ssd . ";" . $price . ";" . "-" . ";");
            // user log neue Datei
            $changed = false;
        }

        //log file schreiben
        // Verzeichnis erstellen, wenn es nicht existiert
        if (!file_exists(dirname($userlogpath))) {
            mkdir(dirname($userlogpath), 0777, true);
        }
        //die Variable $changed wird oben definiert und mit einem Tärnär Operator wird entschieden ob die Datei schon mal existiert hat oder nicht
        $userlog = "USER: " . $k_id . " CPU: " . $cpu . " RAM: " . $ram . " SSD: " . $ssd . " TIME: " . date("Y-m-d H:i:s") . " Changed: " . ($changed ? "True" : "False") . "\n";
        file_put_contents($userlogpath, $userlog, FILE_APPEND);


        //printArray($small, $medium, $big);
        /*echo '<div style="border: 1px solid #ccc; padding: 15px; border-radius: 10px; margin: 20px; background-color: #f9f9f9; max-width: 400px;">';
        echo '<h2>Ihre Bestellung</h2>';
        echo '<p>Sie haben erfolgreich eine Virtuelle Maschine mit den folgenden Spezifikationen gemietet:</p>';
        echo '<ul>';
        echo '<li>CPU-Cores: ' . $cpu . '</li>';
        echo '<li>RAM (MB): ' . $ram . '</li>';
        echo '<li>SSD (GB): ' . $ssd . '</li>';
        echo '<li>Die VM kostet pro Monat: ' . $price . ' CHF (inkl. MWST)</li>';
        echo '</ul>';
        echo '<p>Sie können Ihr Abonnement unter der Kundennummer ' . $k_id . ' jederzeit ändern.</p>';
        echo '</div>';*/
    } else {
        echo "Keinen Zugriff auf Serverdaten";
    }
} else {
    // Fail Log
    echo "Bitte geben Sie eine Kunden ID ein" . "<br>";
    $fail_log = " Login versuch :" . date("Y-m-d H:i:s") . ";" . (isset($_POST["k_id"]) ? $k_id : $note) . ";" . $cpu . ";" . $ram . ";" . $ssd . ";" . "\n";
    $note = "ID not Found";
    file_put_contents($fail_path, $fail_log, FILE_APPEND);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/test.css">
    <link rel="stylesheet" href="../CSS/style.css">
    <title>Ihre Bestellung</title>
</head>

<body>
    <nav class="navbar">
        <ul>
            <li><a href="../index.php"><img src="../Images/Omnicloud-logo.png" alt="Home"></a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">Contact</a></li>
            <li><a id="nav-login" href="../Login/register.php">Login</a></li>
        </ul>
    </nav>


    <div class="container">
        <h2>Ihre Bestellung</h2>
        <p>Sie haben erfolgreich eine Virtuelle Maschine mit den folgenden Spezifikationen gemietet:</p>
        <ul>
            <li>CPU-Cores: <?php echo $cpu; ?></li>
            <li>RAM (MB): <?php echo $ram; ?></li>
            <li>SSD (GB): <?php echo $ssd; ?></li>
            <li>Die VM kostet pro Monat: <?php echo $price; ?> CHF (inkl. MWST)</li>
        </ul>
        <p>Sie können Ihre aktuelle Konfiguration unter der Kundennummer <b><?php echo $k_id; ?></b> jederzeit ändern.</p>
    </div>

    <footer>
        <div class="footer-content">
            <p>&copy; 2023 OmniCloud. All rights reserved.<br>Contact: info@omnicloud.com</p>
        </div>
    </footer>

</body>

</html>