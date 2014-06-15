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
               <!-- <img id="header" src="Header.jpg"/>-->
                <img id="hsLogo" src="bilder/hsLogo.png"/>
                <img id="prostud" src="bilder/prostud.png"/>
            </div>



            <div id='cssmenu'> 
                <ul> 
                    <li class='active'><a href='page_student.php.'><span>Start</span></a></li> 
                    <li><a href='profil_student.php'><span>Profil</span></a></li>
                    <li class='last'><a href='sucheprojekt.php'><span>Suche Projekt</span></a>
                    </li> 
                </ul> 
            </div>

            <div id="inhalt">
                <h2 class="studh2">Sie sind als Student eingeloggt</h2><br/>
                <p class="textstud">Als Student haben Sie die Möglichkeiten Skills die Sie besitzen über das Profil zu speichern.<br/>
                    Diese Informationen werden dafür genutzt,<br/>dass eventuell ein Auftraggeber Sie für sein Projekt finden kann.<br/>
                    Selber können Sie unter "Suche Projekte" präziese Projekte filtern, die für Sie interessant sein könnten.</p>
            </div>

            <div id="info">
                <?php
                //echo $_SESSION['benutzername'] ;                 

                echo "<br>eingeloggt als: " . $_SESSION["benutzername"] . "<br>";
                echo "<a href=\"logout.php\">Logout</a>";
                ?>

            </div>

            <div id="fussbereich">
                &copy; 2014 IFI-Style
            </div>
        </div>
    </body>
</html>
