<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Überprüfen, ob die Kundennummer gesetzt ist
    if (isset($_POST["k_id"])) {
        // Kundennummer aus dem Formular holen
        $kundennummer = $_POST["k_id"];

        // Dateipfad zur Textdatei erstellen
        $dateipfad = "../Log/user/user_" . $kundennummer . ".txt";

        // Überprüfen, ob die Datei existiert, bevor sie gelöscht wird
        if (file_exists($dateipfad)) {
            // Datei löschen
            unlink($dateipfad);

            //echo "Die Konfiguration für Kundennummer " . $kundennummer . " wurde erfolgreich gelöscht.";
        } else {
            //echo "Die Konfiguration für Kundennummer " . $kundennummer . " wurde nicht gefunden.";
        }
    } else {
        //echo "Fehler: Kundennummer nicht gesetzt.";
    }
} else {
    //echo "Ungültige Anfrage.";
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
        <p>Sie haben Ihre Konfiguration <b>erfolgreich gelöscht.</b></p>
        <p>Ihre VM hat nun folgende Spezifikationen:</p>
        <ul>
            <li>CPU-Cores: 0</li>
            <li>RAM (MB): 0</li>
            <li>SSD (GB): 0</li>
            <li>Die VM kostet pro Monat: 0 CHF (inkl. MWST)</li>
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