<!DOCTYPE html>
<html lang="de">

<head>
    <title>OmniCloud</title>
    <link rel="stylesheet" href="./CSS/style.css">
</head>

<body>

    <nav class="navbar">
        <ul>
            <li><a href="./index.php"><img src="./Images/Omnicloud-logo.png" alt="Home"></a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">Contact</a></li>
            <li><a id="nav-login" href="./Login/register.php">Login</a></li>
        </ul>
    </nav>
    <div id="home-text">
        <h1>Willkommen bei Omnicloud!</h1>
        <h2>Ihrer ultimativen Lösung für cloudbasierte virtuelle Maschinen</h2><br>
        <p>Entfesseln Sie die Kraft der Cloud mit Omnicloud und erleben Sie eine neue Dimension der Flexibilität und Leistung.<br>
            Unsere hochmodernen, cloudbasierten VMs bieten Ihnen die Freiheit, Ihre IT-Ressourcen nach Bedarf zu skalieren,<br>
            ohne sich Gedanken über Hardwarebeschränkungen machen zu müssen.</p>
    </div>






    <br><br>
    <form class="main_form" action="Formular\test.php" method=post>
        <div>
            <p>Konfigurieren Sie Ihre Virtuelle Maschine:</p>
        </div>

        <fieldset id="Kunden">

            <label for="k_id">Geben Sie ihre Kunden ID ein:</label><br>
            <input type="text" name="k_id" id="k_id" placeholder="123" required><br>

        </fieldset>

        <fieldset class="spez">
            <label for="cpu">Bitte Anzahl CPU-Cores auswählen:</label> <br>
            <select name="cpu" id="cpu" class="sel">
                <option value="1">1 (5 CHF)</option>
                <option value="2">2 (10 CHF)</option>
                <option value="4">4 (18 CHF)</option>
                <option value="8">8 (30 CHF)</option>
                <option value="16">16 (45 CHF)</option>
            </select>
        </fieldset>
        <fieldset class="spez">
            <label for="ram">Bitte Arbeitsspeicher (MB) auswählen:</label> <br>
            <select name="ram" id="ram" class="sel">
                <option value="512">512 (5 CHF)</option>
                <option value="1024">1024 (10 CHF)</option>
                <option value="2048">2048 (20 CHF)</option>
                <option value="4096">4096 (40 CHF)</option>
                <option value="8192">8192 (80 CHF)</option>
                <option value="16384">16384 (160 CHF)</option>
                <option value="32768">32768 (320 CHF)</option>
            </select>
        </fieldset>
        <fieldset class="spez">
            <label for="ssd">Bitte SSD-Speicherplatz (GB) auswählen:</label> <br>
            <select name="ssd" id="ssd" class="sel">
                <option value="10">10 (5 CHF)</option>
                <option value="20">20 (10 CHF)</option>
                <option value="40">40 (20 CHF)</option>
                <option value="80">80 (40 CHF)</option>
                <option value="240">240 (80 CHF)</option>
                <option value="500">500 (160 CHF)</option>
                <option value="1000">1000 (320 CHF)</option>
            </select>
        </fieldset>
        <fieldset id="sub">
            <input type="submit" name="absenden" value="Kaufen">
        </fieldset>
    </form>

    <hr>


    <form class="main_form" action="Formular\updateVM.php" method=post>

        <div id="change-abo">
            <p>Ändern Sie Ihre aktuelle Konfiguration:</p>
        </div>

        <fieldset id="Kunden">

            <label for="k_id">Geben Sie ihre Kunden ID ein:</label><br>
            <input type="text" name="k_id" id="k_id" placeholder="123" required><br>

        </fieldset>

        <fieldset class="spez">
            <label for="cpu">Bitte Anzahl CPU-Cores auswählen:</label> <br>
            <select name="cpu" id="cpu" class="sel">
                <option value="1">1 (5 CHF)</option>
                <option value="2">2 (10 CHF)</option>
                <option value="4">4 (18 CHF)</option>
                <option value="8">8 (30 CHF)</option>
                <option value="16">16 (45 CHF)</option>
            </select>
        </fieldset>
        <fieldset class="spez">
            <label for="ram">Bitte Arbeitsspeicher (MB) auswählen:</label> <br>
            <select name="ram" id="ram" class="sel">
                <option value="512">512 (5 CHF)</option>
                <option value="1024">1024 (10 CHF)</option>
                <option value="2048">2048 (20 CHF)</option>
                <option value="4096">4096 (40 CHF)</option>
                <option value="8192">8192 (80 CHF)</option>
                <option value="16384">16384 (160 CHF)</option>
                <option value="32768">32768 (320 CHF)</option>
            </select>
        </fieldset>
        <fieldset class="spez">
            <label for="ssd">Bitte SSD-Speicherplatz (GB) auswählen:</label> <br>
            <select name="ssd" id="ssd" class="sel">
                <option value="10">10 (5 CHF)</option>
                <option value="20">20 (10 CHF)</option>
                <option value="40">40 (20 CHF)</option>
                <option value="80">80 (40 CHF)</option>
                <option value="240">240 (80 CHF)</option>
                <option value="500">500 (160 CHF)</option>
                <option value="1000">1000 (320 CHF)</option>
            </select>
        </fieldset>
        <fieldset id="sub">
            <input type="submit" name="absenden" value="Ändern">
        </fieldset>
    </form>

    <hr>

    <form class="main_form2" action="Formular\deleteVM.php" method=post>

        <div id="change-abo2">
            <p>Löschen Sie Ihre Konfiguration:</p>
        </div>

        <fieldset id="Kunden2">

            <label for="k_id">Geben Sie ihre Kunden ID ein:</label><br>
            <input type="text" name="k_id" id="k_id" placeholder="123" required><br>

        </fieldset>

        <fieldset id="sub2">
            <input type="submit" name="absenden" value="Löschen">
        </fieldset>
    </form>




    <footer>
        <div class="footer-content">
            <p>&copy; 2023 OmniCloud. All rights reserved.<br>Contact: info@omnicloud.com</p>
        </div>
    </footer>

</body>

</html>