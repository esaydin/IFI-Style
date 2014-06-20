<?php
include_once 'db_connection.php';
$db = new DbConnection();
?>
<!--Import der Klasse header.php  -->
<?php include_once 'header.php'; ?>
<!--Inhalte der Startseite -->
<div id="inhalt">
    <div id = "InhaltHöhe">
        <div id="profilDaten">
            <?php
            //Pflichtfelder
            if (!empty($_POST["benutzername"]) && !empty($_POST["kennwort"]) && !empty($_POST["kennwortwdhl"]) && !empty($_POST["vorname"]) && !empty($_POST["nachname"]) && !empty($_POST["email"])) {
                //Da die Email Adresse in der DB unique ist, darf es nur einmal existieren, in diesem Abschnitt wird das überprüft
                //Falls die Adresse vorhanden ist wird es abgebrochen
                $sql = "SELECT email FROM benutzer WHERE email = '" . $_POST["email"] . "';";
                $result = $db->connection($sql);
                if (!empty($result)) {
                    echo "Die E-Mail Adresse existiert bereits.";
                    echo "<br><a href=\"registrieren.php\"> Zurück </a>";
                    exit();
                }
                //Da der Benutzername in der DB unique ist darf es nur einmal existieren, in diesem Abschnitt wird das überprüft
                //Falls der Benutzername vorhanden ist wird es abgebrochen
                $sql = "SELECT benutzername FROM benutzer WHERE benutzername = '" . $_POST["benutzername"] . "';";
                $result = $db->connection($sql);
                if (!empty($result)) {
                    echo "der Benutzername existiert bereits.";
                    echo "<br><a href=\"registrieren.php\"> Zurück </a>";
                     exit();
                }
                

                //Die Daten von Formularfeldern, die über POST gekommen sind werden in einzelne neue Variablen gespeichert
                //Durch md5 wird das Passwort in der Datenbank verschlüsselt
                $pass = md5($_POST['kennwort']);
                $vorname = $_POST["vorname"];
                $nachname = $_POST["nachname"];
                $benutzername = $_POST["benutzername"];
                $email = $_POST["email"];
                $strasse = $_POST["strasse"];
                $hausnr = $_POST["hausnr"];
                $plz = $_POST["plz"];
                $ort = $_POST["ort"];
                $benutzertyp = $_POST["benutzer_typ"];

                // Fügt einen Benutzer mit den angegebenen Informationen hinzu
                $sql = "INSERT INTO benutzer"
                        . " ( id, vorname, nachname, benutzername, kennwort, email, strasse, hausnr, plz, ort, idbenutzertyp)"
                        . " VALUES"
                        . " (null,"
                        . " '" . $vorname . "',"
                        . " '" . $nachname . "',"
                        . " '" . $benutzername . "',"
                        . " '" . $pass . "',"
                        . " '" . $email . "',"
                        . " '" . $strasse . "',"
                        . " '" . $hausnr . "',"
                        . " '" . $plz . "',"
                        . " '" . $ort . "',"
                        . " '" . $benutzertyp . "');";

                //Datenbankverbindung, um die SQL Befehle auszuführen
                $result = $db->connection($sql);
                if ($result) {
                    //Willkommengruß nach der Registrierung
                    echo "<div id=\"willkommen\">Herzlich Willkommen bei SearchProStud!</div>";
                    echo " <br><div id=\"textcheck\">Sie haben sich erfolgreich registriert.<br>
                 Klicken Sie auf Los gehts, um sich einzuloggen.</div>";
                    //Link zur Startseite für die Anmeldung nach der Registrierung


                    echo "<input type=\"submit\" value=\"Los gehts\" id=\"los\" onclick=\"location.href='index.php';\"></input>";
                    //echo "<br><a href=\"index.php\"></a>";
                } else {
                    //Fehlermeldung, falls die Daten nicht gespeichert werden können
                    echo "<br> Daten konnten nicht gespeichert werden.";
                    echo "<br><a href=\"registrieren.php\"> Zurück </a>";
                }
            } else {
                //Fehlermeldung falls nicht alle Felder nicht ganz gefüllt werden können
                echo "Pflichfelder nicht ganz gefüllt.";
                echo "<br><a href=\"registrieren.php\"> Zurück </a>";
            }
            ?>
        </div>
        
    </div>
</div>

<!-- -->
<div id="info">   
    <div id = "InhaltHöhe">

    </div>
</div>

<?php include_once 'footer.php'; ?>
