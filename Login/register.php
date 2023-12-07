<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrierung</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            color: #333;
            margin: 0;
            padding: 0;
        }

        form {
            max-width: 400px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: white;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        p {
            margin-top: 20px;
        }

        p.error {
            color: red;
        }

        p.success {
            color: green;
        }
    </style>
</head>

<body>
    <form action="register.php" method="post">
        <label for="vname">Vorname:</label>
        <input type="text" name="vname" id="vname" required>
        <br>
        <label for="nname">Nachname:</label>
        <input type="text" name="nname" id="nname" required>
        <br>
        <input type="submit" value="Registrieren">
    </form>

    <?php
    if (isset($_POST["vname"]) && isset($_POST["nname"])) {
        $vname = $_POST["vname"];
        $nname = $_POST["nname"];

        if (file_exists($dateiname)) {
            if (userExists($vname, $nname, $dateiname)) {
                echo "<p class='error'>Benutzer mit demselben Namen und Nachnamen existiert bereits!</p>";
            } else {
                file_put_contents($dateiname, $vname . ";" . $nname . ";" . $benutzerID . "\n", FILE_APPEND);
                echo "<p class='success'>Sie haben sich erfolgreich registriert!<br>Ihre Benutzer-ID lautet: $benutzerID</p>";
            }
        } else {
            $benutzerDatei = fopen($dateiname, "w") or die("Unable to open file!");
            if (userExists($vname, $nname, $dateiname)) {
                echo "<p class='error'>Benutzer mit demselben Namen und Nachnamen existiert bereits!</p>";
            } else {
                file_put_contents($dateiname, $vname . ";" . $nname . ";" . $benutzerID . "\n", FILE_APPEND);
                echo "<p class='success'>Sie haben sich erfolgreich registriert!<br>Ihre Benutzer-ID lautet: $benutzerID</p>";
            }
        }
    }
    ?>
</body>

</html>
