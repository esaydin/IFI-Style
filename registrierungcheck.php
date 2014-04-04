<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // titel und projektbeschreibung darf nicht leer sein
        if (!empty($_POST["login"]) && !empty($_POST["kennwort"]) && !empty($_POST["kennwortwdhl"]) && !empty($_POST["vorname"]) && !empty($_POST["nachname"]) && !empty($_POST["email"])) {

            //DATENBAnk
            $link = mysqli_connect("localhost", "root", "", "projektverwaltung") or die("Error " . mysqli_error($link));

//consultation:

             $sql = "INSERT INTO benutzer"
                    . " (id, login, kennwort, vorname, nachname, strasse, hausnummer, plz, stadt, email)"
                    . " VALUES"
                    . " (null,"
                    . " '" . $_POST["login"] . "',"
                    . " '" . $_POST["kennwort"] . "',"
                    . " '" . $_POST["vorname"] . "',"
                    . " '" . $_POST["nachname"] . "',"
                    . " '" . $_POST["strasse"] . "',"
                    . " '" . $_POST["hausnummer"] . "',"
                    . " '" . $_POST["plz"] . "',"
                    . " '" . $_POST["stadt"] . "',"
                    . " '" . $_POST["email"] . "');";

//execute the query.
            //echo "<br>$sql";

            if ($result = $link->query($sql)) {

//display information:
                
                echo 'Daten gespeichert';
            }
        } else {
            echo "FEHLER 123: Pflichtfelder nicht gefüllt.";
            echo "<br><a href=\"registrieren.php\"> Zurück </a>";
        }
        ?>
    </body>
</html>
