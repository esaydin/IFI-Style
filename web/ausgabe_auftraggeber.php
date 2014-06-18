<?php
session_start();
if (empty($_SESSION['id']) || empty($_SESSION['benutzername'])) {
    header('Location: index.php');
}
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
    <div id="InhaltHöhe">
         <h1>Gefundene Studenten:</h1>     
        <?php
        if (empty($_POST['skill'])) {
            header('Location: index.php');
        }

        include_once 'db_connection.php';
        $db = new DbConnection();

        $var = $_POST['skill'];


        $s = array();
        $condition = join(',', $_POST['skill']); // bsp: html, php, bla
        $skillanzahl = count($_POST['skill']);

        if (isset($_POST['verknuepfung'])) {
            $sql = "SELECT group_concat(tmp.id SEPARATOR ', ') As ids"//, tmp.titel, tmp.beschreibung, tmp.skills
                    . " FROM (
                        SELECT b.id, b.benutzername, group_concat(skill SEPARATOR ', ') As skills, count(b.benutzername) AS cnt
                        FROM benutzer b
                        LEFT JOIN benutzerskillzuordnung bsz ON bsz.idbenutzer = b.id
                        LEFT JOIN skill s ON s.id = bsz.idskill
                        WHERE bsz.idskill IN (" . $condition . ")
                        GROUP BY b.benutzername ORDER BY cnt DESC) As tmp
                        WHERE tmp.cnt = '$skillanzahl';";
        } else {

            $sql = "SELECT group_concat(tmp.id SEPARATOR ', ') AS ids"
                    . " FROM (SELECT b.id"
                    . "   FROM benutzer b"
                    . "   LEFT JOIN benutzerskillzuordnung bsz ON bsz.idbenutzer = b.id"
                    . "   LEFT JOIN skill s ON s.id = bsz.idskill"
                    . "   WHERE bsz.idskill IN (" . $condition . ")"
                    . "   GROUP BY b.benutzername) As tmp";
        }

        $result = $db->connection($sql);

        $ids = $result[0];
        $sql2 = "SELECT benutzer.benutzername, group_concat(skill.skill SEPARATOR ', ') AS skills"
                . " FROM `benutzerskillzuordnung`"
                . " LEFT JOIN skill ON skill.id = benutzerskillzuordnung.idskill"
                . " LEFT JOIN benutzer ON benutzer.id = benutzerskillzuordnung.idbenutzer"
                . " WHERE idbenutzer in (" . $ids["ids"] . ")"
                . " GROUP BY benutzer.benutzername";

        $result = $db->connection($sql2);




        if (!empty($result)) {
            foreach ($result as $value) {
                ?>
                </br> Benutzer: <?php echo $value["benutzername"]; ?>
                </br> Skills: <?php echo $value["skills"]; ?>
                </br>
                <?php
            }
        }
        ?>


    </div>
    
   
</div>

<div id="info">
      <div id="InhaltHöhe">

    <?php
//
        echo "<br>eingeloggt als: " . $_SESSION["benutzername"] . "<br>";
        echo "<a href=\"logout.php\">Logout</a>";
        ?>
        </br>
        <a href="suchestudenten.php">Zurück</a>
      </div>
</div>
<!--Inkludieren vom Fussbereich-->
<?php include_once 'footer.php'; ?>
