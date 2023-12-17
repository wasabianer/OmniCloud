<?php
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
?>
<?php

// Pfad zur Textdatei
$dateipfad = '../Log/user/user_';

// Kundennummer aus dem Formular erhalten
$kundennummer = $_POST['k_id'];

// Pfad zur spezifischen Datei erstellen
$dateipfad .= $kundennummer . '.txt';

// Überprüfen, ob die Datei existiert
if (file_exists($dateipfad)) {

    // Formulardaten erhalten
    $cpu_cores = $_POST['cpu'];
    $ram = $_POST['ram'];
    $ssd = $_POST['ssd'];

    // Datei lesen und Daten extrahieren
    $dateiinhalt = file_get_contents($dateipfad);
    $daten = explode(';', $dateiinhalt);

    // Vorhandene Daten mit Formulardaten vergleichen und gegebenenfalls aktualisieren
    if ($daten[2] != $cpu_cores) {
        $daten[2] = $cpu_cores;
    }

    if ($daten[3] != $ram) {
        $daten[3] = $ram;
    }

    if ($daten[4] != $ssd) {
        $daten[4] = $ssd;
    }

    // Neuen Preis berechnen und aktualisieren
    $neuer_preis = getPrice($cpu_cores, $ram, $ssd);
    $daten[5] = $neuer_preis;

    // Aktualisierte Daten in die Datei schreiben
    $aktualisierte_daten = implode(';', $daten);
    file_put_contents($dateipfad, $aktualisierte_daten);

    //echo 'Änderungen erfolgreich durchgeführt.';
} else {
    echo 'Kundennummer nicht gefunden.';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/test.css">
    <link rel="stylesheet" href="../CSS/style.css">
    <title>Ihre Konfiguration</title>
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
        <h2>Ihre aktuelle Konfiguration</h2>
        <p>Sie haben Ihre Konfiguration <b>erfolgreich geändert.</b></p>
        <p>Ihre VM hat nun folgende Spezifikationen:</p>
        <ul>
            <li>CPU-Cores: <?php echo $cpu_cores; ?></li>
            <li>RAM (MB): <?php echo $ram; ?></li>
            <li>SSD (GB): <?php echo $ssd; ?></li>
            <li>Die VM kostet pro Monat: <?php echo $neuer_preis; ?> CHF (inkl. MWST)</li>
        </ul>
        <p>Sie können Ihre Konfiguration unter der Kundennummer <b><?php echo $kundennummer; ?></b> jederzeit ändern.</p>
    </div>

    <footer>
        <div class="footer-content">
            <p>&copy; 2023 OmniCloud. All rights reserved.<br>Contact: info@omnicloud.com</p>
        </div>
    </footer>

</body>

</html>