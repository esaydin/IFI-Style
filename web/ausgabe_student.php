<?php
session_start();
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

            <div id='cssmenu'> 
                <ul> 
                    <li class='active'><a href='page_student.php.'><span>Start</span></a></li> 
                    <li><a href=''><span>Profil</span></a></li>
                    <li class='last'><a href='sucheprojekt.php'><span>Suche Projekt</span></a>
                    </li> 
                </ul> 
            </div>

            <div id="inhalt">
                <h1>Gefundene Projekte:</h1>     
                <?php
                if (empty($_POST['skill'])) {
                    header('Location: index.php');
                }

                include_once 'db_connection.php';
                $db = new DbConnection();
                $var = $_POST['skill'];
//print_r($var);

                $s = array();
                $condition = join(',', $_POST['skill']); // bsp: html, php, bla
                $skillanzahl = count($_POST['skill']);

// gruppen ids
                if (isset($_POST['verknuepfung'])) {
                    $sql = "SELECT group_concat(tmp.id SEPARATOR ', ') As ids"//, tmp.titel, tmp.beschreibung, tmp.skills
                            . " FROM (
                    SELECT p.id, p.titel, p.beschreibung, group_concat(skill SEPARATOR ', ') As skills, count(p.titel) AS cnt
                    FROM projekt p
                    LEFT JOIN projektskillzuordnung psz ON psz.idprojekt = p.id
                    LEFT JOIN skill s ON s.id = psz.idskill
                    WHERE psz.idskill IN (" . $condition . ")
                    GROUP BY p.titel ORDER BY cnt DESC) As tmp
                    WHERE tmp.cnt = '$skillanzahl';";
                } else {
                    $sql = "SELECT group_concat(tmp.id SEPARATOR ', ') AS ids"
                            . " FROM (SELECT p.id"
                            . "   FROM projekt p"
                            . "   LEFT JOIN projektskillzuordnung psz ON psz.idprojekt = p.id"
                            . "   LEFT JOIN skill s ON s.id = psz.idskill"
                            . "   WHERE psz.idskill IN (" . $condition . ")"
                            . "   GROUP BY p.titel) As tmp";
                }
//echo $sql;
                $result = $db->connection($sql);

//print_r($result);

                $ids = $result[0];
                $sql2 = "SELECT projekt.titel, projekt.beschreibung, group_concat(skill.skill SEPARATOR ', ') AS skills"
                        . " FROM `projektskillzuordnung`"
                        . " LEFT JOIN skill ON skill.id = projektskillzuordnung.idskill"
                        . " LEFT JOIN projekt ON projekt.id = projektskillzuordnung.idprojekt"
                        . " WHERE idprojekt in (" . $ids["ids"] . ")"
                        . " GROUP BY projekt.titel";
                $result = $db->connection($sql2);
//print_r($result);

                if (!empty($result)) {
                    foreach ($result as $value) {
                        ?>
                        <br> Titel: <?php echo $value["titel"]; ?>
                        <br> Beschreibung: <?php echo $value["beschreibung"]; ?>
                        <br> Skills in Projekte: <?php echo $value["skills"]; ?>
                        <br>
                        <form action="projekt_teilnehmen_hinzufuegen.php" method="post">
                            <input name="proname" value="<?php echo $value["titel"]; ?>" hidden>
                            <button id="teilnehmen" name="add">Teilnehmen</button>
                        </form>
                        <br>
                        <?php
                    }
                }
                ?>
            </div>

            <div id="info">
                <?php
//echo $_SESSION['benutzername'] ;                 

                echo "<br>eingeloggt als: " . $_SESSION["benutzername"] . "<br>";
                echo "<a href=\"logout.php\">Logout</a>";
                ?>
                </br>
                <a href="sucheprojekt.php">Zurück</a>

            </div>
            <div id="fussbereich">
                &copy; 2014 IFI-Style
            </div>

        </div>
    </body>
</html>
