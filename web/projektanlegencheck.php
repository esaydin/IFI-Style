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
<!--Inkludieren von Header für den Kopfbereich-->
<?php include_once 'auftraggeber_header.php'; ?>

<!--Navigationsbereich mit den Punkten Start, Profil, Student suchen und Projekt anlegen-->
<div id='cssmenu'> 
      <ul> 
        <li class='active'><a href='page_auftraggeber.php.'><span>Start</span></a></li> 
        <li><a href='profil_auftraggeber.php'><span>Profil</span></a></li>
        <li><a href='suchestudenten.php'><span>Suche Student</span></a></li>
        <li><a href='projektanlegen.php'><span>Projekt Anlegen</span></a></li>
        <li class='last'><a href='projekte_auftraggeber.php'><span>Meine Projekte</span></a>
        </li>
    </ul>
</div>
<div id="inhalt">
    <div id="InhaltHöhe">
        <div id="profilDaten">
            <?php
            //wenn projekt angelegt true liefert wird die ausgabe gemacht das es erfolgreich war
            if ($projektAngelegt) {
                echo "Projekt wurde veröffentlicht!";
                echo "<br><br>" . "Titel: " . $_POST["titel"] . "<br>" . "Beschreibung: " . $_POST["projektbeschreibung"] . "<br>";
            } else {
                echo "Projekt konnte nicht veröffentlicht werden!";
            }
            ?>
            <br><a href="projektanlegen.php"> Zurück </a>  
        </div>
    </div>
</div>

<?php include_once 'info.php'; ?>
<!--Inkludieren vom Fussbereich-->
<?php include_once 'footer.php'; ?>
