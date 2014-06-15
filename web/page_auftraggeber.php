<?php
session_start();
if( empty($_SESSION['id']) || empty($_SESSION['benutzername']) ){
    //header('Location: index.php');
}

include_once 'db_connection.php';
$db = new DbConnection();
?>
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
    <ul> <li class='active'>
            <a href='page_auftraggeber.php.'><span>Start</span></a></li> 
        <li><a href=''><span>Profil</span></a></li>
        <li><a href='suchestudenten.php'><span>Student suchen</span></a></li>
        <li class='last'><a href='projektanlegen.php'><span>Projekt Anlegen</span></a>
        </li> </ul> 
</div>
            <div id="inhalt">
            
                      <h2> Sie Sind als Auftraggeber eingeloggt</h2><br/>
                       <p class="textstud">Als Auftraggeber haben Sie die Möglichkeiten Studenten für ihr Projekt zu finden, die Ihren Ansprüchen entspricht.<br/>
                    
                   Selber können Sie unter "Projekt anlegen" Projekte veröffentlichen, die von allen Studenten sichtbar werden.</p>
                 

            </div>

            <div id="info">
               
         <?php //echo $_SESSION['benutzername'] ;                 

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
