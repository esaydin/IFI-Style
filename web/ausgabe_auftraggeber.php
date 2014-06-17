<!--Diese Klasse stellt die Seite für den Auftraggeber dar. Wenn man sich als Auftraggeber eingeloggt hat, wird man auf diese Seite weitergeleitet-->
<?php
//Sitzung wird gestartet, damit man weiss ob das Einloggen erfolt hat oder nicht
session_start();
if (empty($_SESSION['id']) || empty($_SESSION['benutzername'])) {
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php include_once 'header.php'; ?>
            <!--Navigationsbereich-->
 <div id='cssmenu'> 
    <ul> 
        <li class='active'><a href='page_auftraggeber.php.'><span>Start</span></a></li> 
        <li><a href='profil_auftraggeber.php'><span>Profil</span></a></li>
        <li><a href='suchestudenten.php'><span>Suche Student</span></a></li>
        <li><a href='suchestudenten.php'><span>Projekt Anlegen</span></a></li>
        <li class='last'><a href='projekte_auftraggeber.php'><span>Meine Projekte</span></a>
        </li>
    </ul> 
</div>

            <!-- Der Contentbereich-->
            <div id="inhalt">
                  <div id="InhaltHöhe">
                <h1>Gefundene Studenten:</h1>     
                <?php
                //Speichervariable
                if (empty($_POST['skill'])) {
                    header('Location: index.php');
                }
                //Datenbankverbindung wird hergestellt
                include_once 'db_connection.php';
                $db = new DbConnection();
                $var = $_POST['skill'];
                

                $s = array();
                $condition = join(',', $_POST['skill']); // bsp: html, php, bla
                $skillanzahl = count($_POST['skill']);

                // Und verknüpfung,alle ausgesuchten skills müssen im Projekt sein
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
                    // oder verknüpfung, wenn nur eine Eigenschaft im Projekt vorhanden ist, reicht es zur Ausgabe
                    $sql = "SELECT group_concat(tmp.id SEPARATOR ', ') AS ids"
                            . " FROM (SELECT b.id"
                            . "   FROM benutzer b"
                            . "   LEFT JOIN benutzerskillzuordnung bsz ON bsz.idbenutzer = b.id"
                            . "   LEFT JOIN skill s ON s.id = bsz.idskill"
                            . "   WHERE bsz.idskill IN (" . $condition . ")"
                            . "   GROUP BY b.benutzername) As tmp";
                }

                //echo $sql;
                $result = $db->connection($sql);


                $ids = $result[0];
                $sql2 = "SELECT benutzer.benutzername, group_concat(skill.skill SEPARATOR ', ') AS skills"
                        . " FROM `benutzerskillzuordnung`"
                        . " LEFT JOIN skill ON skill.id = benutzerskillzuordnung.idskill"
                        . " LEFT JOIN benutzer ON benutzer.id = benutzerskillzuordnung.idbenutzer"
                        . " WHERE idbenutzer in (" . $ids["ids"] . ")"
                        . " GROUP BY benutzer.benutzername";

                $result = $db->connection($sql2);

                //Gibt die Skills mit den zugehörigen Benutzern aus.
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
                  </div></div>
            <div id="info">
                <div id = "InhaltHöhe ">
                
                <?php
                //
                echo "<br>eingeloggt als: " . $_SESSION["benutzername"] . "<br>";
                echo "<a href=\"logout.php\">Logout</a>";
                ?>
                </br>
                <a href="suchestudenten.php">Zurück</a> </div>
            </div>           
        </div>
       <?php include_once 'footer.php'; ?>
