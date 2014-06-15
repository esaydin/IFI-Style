<?php
session_start();
if( empty($_SESSION['id']) || empty($_SESSION['benutzername']) ){
    //header('Location: index.php');
}

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
        <link rel="stylesheet" type="text/css" href="indexCSS.css">
    
    </head>
      
    <body>
       
        <div id="seite"> 
            <div id="kopfbereich"> 
            
                <img id="hsLogo" src="hsLogo.png"/>
                 <img id="prostud" src="prostud.png"/>
            </div>

<div id='cssmenu'> 
    <ul> <li class='active'>
            <a href='page_auftraggeber.php.'><span>Start</span></a></li> 
        <li><a href=''><span>Profil</span></a></li>
        <li><a href='suchestudenten.php'><span>Student suchen</span></a></li>
        <li class='last'><a href='projektanlegen.php'><span>Projekt Anlegen</span></a>
        </li> </ul> 
</div>

            <div id="inhalt">
            
                           
    <h1>Gefundene Studenten:</h1>     
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
//echo $sql;
                $result = $db->connection($sql);

                //print_r($result);

                $ids = $result[0];
                $sql2 = "SELECT benutzer.benutzername, group_concat(skill.skill SEPARATOR ', ') AS skills"
                        . " FROM `benutzerskillzuordnung`"
                        . " LEFT JOIN skill ON skill.id = benutzerskillzuordnung.idskill"
                        . " LEFT JOIN benutzer ON benutzer.id = benutzerskillzuordnung.idbenutzer"
                        . " WHERE idbenutzer in (" . $ids["ids"] . ")"
                        . " GROUP BY benutzer.benutzername";
                $result = $db->connection($sql2);
                //print_r($result);

                if (!empty($result)) {
                    foreach ($result as $value) {
                        ?>
                        <br> Benutzer: <?php echo $value["benutzername"]; ?>
                        
                        <br> Skills: <?php echo $value["skills"]; ?>
                        <br>
                        
                       
                        <?php
                    }
                }
                ?>
                 

            </div>

            <div id="info">
               
         <?php //echo $_SESSION['benutzername'] ;                 

                    echo "<br>eingeloggt als: " . $_SESSION["benutzername"] . "<br>";
                    echo "<a href=\"logout.php\">Logout</a>";
                   
              ?>
                </br>
                <a href="suchestudenten.php">Zurück</a></div>
            </div>


            <div id="fussbereich">
                &copy; 2014 IFI-Style
            </div>

        </div>
    </body>
</html>
