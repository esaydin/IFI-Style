<?php
session_start();
if (empty($_SESSION['id']) || empty($_SESSION['benutzername'])) {
    header('Location: index.php');
}
//Inkludieren von db_connection für die Datenbankverbindung
include_once 'db_connection.php';
$db = new DbConnection();
?>
<!--Inkludieren von Header für den Kopfbereich-->
<?php include_once 'header.php'; ?>

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
    <div id="InhaltHöhe"></div>
    <div id="profilDaten">


        <h4 class="h4">Meine Projekte: </h4>
        <?php
        $sql = "SELECT projekt. * , group_concat( skill.skill ) AS skills 
            FROM (SELECT projekt. *
            FROM projektbenutzerzuordnung
            LEFT JOIN projekt ON projekt.id = projektbenutzerzuordnung.idprojekt
            WHERE idbenutzertyp = " . $_SESSION['idbenutzertyp'] . "
            AND idbenutzer = " . $_SESSION['id'] . ") AS projekt
            LEFT JOIN projektskillzuordnung ON projektskillzuordnung.idprojekt = projekt.id
            LEFT JOIN skill ON skill.id = projektskillzuordnung.idskill
            GROUP BY projekt.titel";


        $result = $db->connection($sql);

        if ($result) {
            foreach ($result as $value) {

                echo "<font size=\"4\">Titel: </font>" . $value["titel"] . "<br>". "<br>"
                . "<font size=\"4\">Beschreibung: </font>" . $value["beschreibung"] . "<br>"
                . "<font size=\"4\">Skills: </font>" . $value["skills"] . "<br><br><br>";
            }
        }
        ?>

    </div>
</div>

        <?php include_once 'info.php'; ?>
<!--Inkludieren vom Fussbereich-->
        <?php include_once 'footer.php'; ?>
