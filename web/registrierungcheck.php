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
        <link rel="stylesheet" type="text/css" href="css/main.css">
    
    </head>
      
    <body>
       
        <div id="seite"> 
            <div id="kopfbereich"> 
               
                <img id="hsLogo" src="bilder/hsLogo.png"/>
                 <img id="prostud" src="bilder/prostud.png"/>
              
            </div>



            <div id="inhalt">
            
                
                   <?php
        if (!empty($_POST["benutzername"]) && !empty($_POST["kennwort"]) && !empty($_POST["kennwortwdhl"]) && !empty($_POST["vorname"]) && !empty($_POST["nachname"]) && !empty($_POST["email"])) {

            $sql = "SELECT email FROM benutzer WHERE email = '" . $_POST["email"] . "';";
            $result = $db->connection($sql);
            if (!empty($result)) {
                echo "Registrirung mit der angegebenen E-Mail existiert bereits.";
                exit();
            }


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

            </div>

            <div id="info">
               
 
            </div>


            <div id="fussbereich">
                &copy; 2014 IFI-Style
            </div>

        </div>
    </body>
</html>
