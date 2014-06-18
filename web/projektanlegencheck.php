<?php
session_start();
if (empty($_SESSION['id']) || empty($_SESSION['benutzername'])) {
    header('Location: index.php');
}

include_once 'db_connection.php';
$connection = new DbConnection();

$projektAngelegt = false;

//wenn die felder gefüllt sind wird es ind tabelle projekt gespeicher
if (!empty($_POST["titel"]) && !empty($_POST["projektbeschreibung"]) && !empty($_POST["skill"])) {
    // Projekt speichern
    $sql = "INSERT INTO projekt"
            . " VALUES"
            . " (null, '" . $_POST["titel"] . "', '" . $_POST["projektbeschreibung"] . "');";
    $result = $connection->connection($sql);
    //wenn die daten in die tabelle projekt gespeichert werden konnten,
    if ($result) {
        // werden die skills für den projekt mit dem projekt idind projektskillzuordnung gespeichert
        foreach ($_POST["skill"] as $key => $value) {
            $sql2 = "INSERT INTO projektskillzuordnung"
                    . " VALUES ( (SELECT id FROM projekt WHERE titel = '" . $_POST["titel"] . "'), '" . $value . "' )";
            $result = $connection->connection($sql2);
        }
        //am ende werden die daten in Projektbenutzerzuordnung gespeicher, damit man sehen kann wem das Projekt gehort
         $sql3 = "INSERT INTO projektbenutzerzuordnung"
                    . " VALUES ( (SELECT id FROM projekt WHERE titel = '" . $_POST["titel"] . "'), '" . $_SESSION['id'] . "', '" . $_SESSION['idbenutzertyp'] . "' )";
           $connection->connection($sql3);

        $projektAngelegt = true;
    }
}
?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php include_once 'header.php'; ?>

            <div id='cssmenu'> 
                <ul> 
                    <li class='active'><a href='page_auftraggeber.php'><span>Start</span></a></li> 
                    <li><a href='profil_auftraggeber.php'><span>Profil</span></a></li>
                    <li><a href='projektanlegen.php'><span>Suche Student</span></a></li>
                    <li class='last'><a href='projektanlegen.php'><span>Projekt Anlegen</span></a>
                    </li> 
                </ul> 
            </div>

            <div id="inhalt">
                  <div id="InhaltHöhe">
                <?php
                //wenn projekt angelegt true liefert wird die ausgabe gemacht das es erfolgreich war
                if ($projektAngelegt) {
                    echo "Projekt wurde angelegt!";
                    echo "<br><br>" . "Titel: " . $_POST["titel"] . "<br>" . "Beschreibung: " . $_POST["projektbeschreibung"] . "<br>";

                } else {
                    echo "Projekt konnte nicht angelegt werden!";
                }
                ?>
                <br><a href="projektanlegen.php"> Zurück </a>  
                  </div></div>
            <div id="info">
                  <div id="InhaltHöhe">
                <?php
                        
                echo "<br>eingeloggt als: " . $_SESSION["benutzername"] . "<br>";
                echo "<a href=\"logout.php\">Logout</a>";
                ?>
                </br>
                <a href="projektanlegen.php"/>
                  </div></div>

          <?php include_once 'footer.php'; ?>
