<?php
session_start();
if (empty($_SESSION['id']) || empty($_SESSION['benutzername'])) {
    //header('Location: index.php');
}

include_once 'db_connection.php';
$db = new DbConnection();
?>
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
        if (!empty($_POST["benutzername"]) && !empty($_POST["kennwort"]) && !empty($_POST["kennwortwdhl"]) && !empty($_POST["vorname"]) && !empty($_POST["nachname"]) && !empty($_POST["email"])) {

            $sql = "SELECT email FROM benutzer WHERE email = '" . $_POST["email"] . "';";
            $result = $db->connection($sql);
            if (!empty($result)) {
                echo "Registrirung mit der angegebenen E-Mail existiert bereits.";
                exit();
            }


            $pass = md5($_POST['kennwort']);
            $sql = "INSERT INTO benutzer"
                    . " ( id, vorname, nachname, benutzername, kennwort, email, strasse, hausnr, plz, ort, idbenutzertyp)"
                    . " VALUES"
                    . " (null,"
                    . " '" . $_POST["vorname"] . "',"
                    . " '" . $_POST["nachname"] . "',"
                    . " '" . $_POST["benutzername"] . "',"
                    . " '" . $pass . "',"
                    . " '" . $_POST["email"] . "',"
                    . " '" . $_POST["strasse"] . "',"
                    . " '" . $_POST["hausnr"] . "',"
                    . " '" . $_POST["plz"] . "',"
                    . " '" . $_POST["ort"] . "',"
                    . " '" . $_POST["benutzer_typ"] . "');";


            //echo "<br> " .$sql;
            $result = $db->connection($sql);
            if ($result) {
                echo 'Herzlich Willkommen bei SearchProStud.<br> '
                .    'Sie haben sich erfolgreich registriert.<br>'
                        . ' Klicken Sie auf Los gehts, um sich einzuloggen.' ;
                 echo "<br><a href=\"index.php\"> Los gehts </a>";
                
            } else {
                echo "<br> Daten konnten nicht gespeichert werden.";
                echo "<br><a href=\"registrieren.php\"> Zurück </a>";
            }
        } else {
            echo "Pflichfelder nicht ganz gefüllt.";
            echo "<br><a href=\"registrieren.php\"> Zurück </a>";
        }
        ?>
    </body>
</html>
