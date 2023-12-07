<!DOCTYPE html>
<html lang="de">

<head>
    <title>OmniCloud</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <header>
        <h1>OmniCloud</h1>
        <h3>Ihr Serverhost des Vertrauens</h3>

        <nav>

            <ul>
                <li><a href="#home">Home</a></li>
                <li><a href="#news">News</a></li>
                <li><a href="#contact">Contact</a></li>
                <li style="float:right"><a class="active" href="#about">About</a></li>
            </ul>
        </nav>
    </header>
    <br><br>
    <form action="file.php" method=post>
        <fieldset>
            <legend>Angaben zum Server ausfüllen</legend>
            <label for="anzahlcpu">Bitte Cpuanzahl auswählen:</label> <br>
            <select name="anzahlcpu" id="anzahlcpu">
                <option value="1">1 (5 CHF)</option>
                <option value="2">2 (10 CHF)</option>
                <option value="4">4 (18 CHF)</option>
                <option value="8">8 (30 CHF)</option>
                <option value="16">16 (45 CHF)</option>
            </select>
        </fieldset>
        <fieldset>
            <label for="arbeitsspeicher">Bitte Arbeitsspeicher auswählen:</label> <br>
            <select name="arbeitsspeicher" id="arbeitsspeicher">
                <option value="512">512 (5 CHF)</option>
                <option value="1024">1024 (10 CHF)</option>
                <option value="2048">2048 (20 CHF)</option>
                <option value="4096">4096 (40 CHF)</option>
                <option value="8192">8192 (80 CHF)</option>
                <option value="16384">16384 (160 CHF)</option>
                <option value="32768">32768 (320)</option>
            </select>
        </fieldset>
        <fieldset>
            <label for="speicherplatzssd">Bitte Speicherplatz(SSD) auswählen:</label> <br>
            <select name="speicherplatzssd" id="speicherplatzssd">
                <option value="10">10 (5 CHF)</option>
                <option value="20">20 (10 CHF)</option>
                <option value="40">40 (20 CHF)</option>
                <option value="80">80 (40 CHF)</option>
                <option value="240">240 (80 CHF)</option>
                <option value="500">500 (160 CHF)</option>
                <option value="1000">1000 (320)</option>
            </select>
        </fieldset>
        <fieldset>
            <input type="submit" name="absenden" value="Send">
        </fieldset>
    </form>





    <footer>


    </footer>



</body>

</html>