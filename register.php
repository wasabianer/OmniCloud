<?php
    $vname = "";
    $nname = "";
    $dateiname = "benuter.txt";
    $benutzerID = rand(99, 1000);

    function userExists($vname, $nname, $dateiname) {
        if (file_exists($dateiname)) {
            $fileContents = file_get_contents($dateiname);
            $users = explode("\n", $fileContents);
            foreach ($users as $user) {
                $userData = explode(";", $user);
                if (count($userData) >= 2 && $userData[0] == $vname && $userData[1] == $nname) {
                    return true;
                }
            }
        }
        return false;
    }
    ?>

    <!DOCTYPE html>
    <html lang="de">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>

    <body>
        <form action=register.php method=post>
            <label for="vname">Vorname:</label>
            <input type="text" name="vname" id="vname" required>
            <br>
            <label for="nname">Nachname:</label>
            <input type="text" name="nname" id="nname" required>
            <br>
            <input type="submit" value="Register">
        </form>

        <?php
            if (isset($_POST["vname"]) && isset($_POST["nname"])) {            
                $vname = $_POST["vname"];
                $nname = $_POST["nname"];

                if (file_exists($dateiname)) {
                    if(userExists($vname, $nname, $dateiname)) {
                        echo "<p style='color:red;'>Benutzer mit demselben Namen und Nachnamen existiert bereits!</p>";
                    } else {
                        file_put_contents($dateiname, $vname . ";" . $nname . ";" . $benutzerID . "\n", FILE_APPEND);
                        echo "<p style='color:green;'>Sie haben sich erfolgreich registriert!<br>Ihre Benutzer-ID lautet: $benutzerID</p>";
                    }
                } else {
                    $benutzerDatei = fopen($dateiname, "w") or die("Unable to open file!");
                    if (userExists($vname, $nname, $dateiname)) {
                        echo "<p style='color:red;'>Benutzer mit demselben Namen und Nachnamen existiert bereits!</p>";
                    } else {
                        file_put_contents($dateiname, $vname . ";" . $nname . ";" . $benutzerID . "\n", FILE_APPEND);
                        echo "<p style='color:green;'>Sie haben sich erfolgreich registriert!<br>Ihre Benutzer-ID lautet: $benutzerID</p>";
                    }
                }
            }
        ?>

    </body>

    </html>