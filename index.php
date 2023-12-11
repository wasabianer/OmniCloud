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






    <br><br>
    <form id="main_form" action="Formular\test.php" method=post>
        <!-- <form action="Formular\formular.php" method=post>-->

        <fieldset id="Kunden">

            <label for="k_id">Geben Sie ihre Kunden ID ein:</label><br>
            <input type="text" name="k_id" id="k_id" placeholder="123456" required><br>

        </fieldset>
        <div>
            <p>Test</p>
        </div>
        <fieldset class="spez">
            <label for="cpu">Bitte Cpuanzahl auswählen:</label> <br>
            <select name="cpu" id="cpu" class="sel">
                <option value="1">1 (5 CHF)</option>
                <option value="2">2 (10 CHF)</option>
                <option value="4">4 (18 CHF)</option>
                <option value="8">8 (30 CHF)</option>
                <option value="16">16 (45 CHF)</option>
            </select>
        </fieldset>
        <fieldset class="spez">
            <label for="ram">Bitte Arbeitsspeicher auswählen:</label> <br>
            <select name="ram" id="ram" class="sel">
                <option value="512">512 (5 CHF)</option>
                <option value="1024">1024 (10 CHF)</option>
                <option value="2048">2048 (20 CHF)</option>
                <option value="4096">4096 (40 CHF)</option>
                <option value="8192">8192 (80 CHF)</option>
                <option value="16384">16384 (160 CHF)</option>
                <option value="32768">32768 (320)</option>
            </select>
        </fieldset>
        <fieldset class="spez">
            <label for="ssd">Bitte Speicherplatz(SSD) auswählen:</label> <br>
            <select name="ssd" id="ssd" class="sel">
                <option value="10">10 (5 CHF)</option>
                <option value="20">20 (10 CHF)</option>
                <option value="40">40 (20 CHF)</option>
                <option value="80">80 (40 CHF)</option>
                <option value="240">240 (80 CHF)</option>
                <option value="500">500 (160 CHF)</option>
                <option value="1000">1000 (320)</option>
            </select>
        </fieldset>
        <fieldset id="sub">
            <input type="submit" name="absenden" value="Send">
        </fieldset>
    </form>

    <footer>
        <div class="footer-content">
            <p>&copy; 2023 OmniCloud. All rights reserved.<br>Contact: info@omnicloud.com</p>
        </div>
    </footer>

</body>

</html>
