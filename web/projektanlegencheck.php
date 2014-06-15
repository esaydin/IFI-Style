<?php

session_start();
if( empty($_SESSION['id']) || empty($_SESSION['benutzername']) ){
    //header('Location: index.php');
}

include_once 'db_connection.php';
$connection = new DbConnection();

$projektAngelegt = false;

if (!empty($_POST["titel"]) && !empty($_POST["projektbeschreibung"]) && !empty($_POST["skill"])) {
    // Projekt speichern
    $sql = "INSERT INTO projekt"
            . " VALUES"
            . " (null, '" . $_POST["titel"] . "', '" . $_POST["projektbeschreibung"] . "');";
    $result = $connection->connection($sql);
    if ($result) {
        // projektskills speichern
        foreach ($_POST["skill"] as $key => $value) {
            $sql2 = "INSERT INTO projektskillzuordnung"
                    . " VALUES ( (SELECT id FROM projekt WHERE titel = '" . $_POST["titel"] . "'), '" . $value . "' )";
            $result = $connection->connection($sql2);
        }

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
    <ul> <li class='active'>
            <a href='page_auftraggeber.php.'><span>Start</span></a></li> 
        <li><a href=''><span>Profil</span></a></li>
        <li><a href='suchestudenten.php'><span>Suche Student</span></a></li>
        <li class='last'><a href='projektanlegen.php'><span>Projekt Anlegen</span></a>
        </li> </ul> 
</div>

            <div id="inhalt">
             <?php
                if ($projektAngelegt) {
                    echo "Projekt angelegt";
                    echo "<br><br>" . "Titel: " . $_POST["titel"] . "<br>" . "Beschreibung: " . $_POST["projektbeschreibung"] . "<br>";

                    echo "Skills: ";
                    $sk = "";
                    foreach ($_POST["skill"] as $key => $value) {
                        $sk .= $value . ", ";
                    }
                    //$sk = rtrim($string, ", ");
                    echo substr($sk, 0, -2);
                } else {
                    echo "Projekt nicht angelegt";
                }
                ?>
                <br><a href="projektanlegen.php"> Zurück </a>  

       
            </div>

            <div id="info">
               
          <?php //echo $_SESSION['benutzername'] ;                 

                    echo "<br>eingeloggt als: " . $_SESSION["benutzername"] . "<br>";
                    echo "<a href=\"logout.php\">Logout</a>";
                   
              ?>
                </br>
                <a href="projektanlegen.php"/>

            </div>


            <div id="fussbereich">
                &copy; 2014 IFI-Style
            </div>

        </div>
    </body>
</html>
