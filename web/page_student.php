<?php
session_start();
if( empty($_SESSION['id']) || empty($_SESSION['benutzername']) ){
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
        <link rel="stylesheet" type="text/css" href="indexCSS.css">
    </head>
    <body>
        
        <div id="seite">
            <div id="kopfbereich">
                <div id="logo">
                    <img id="hsLogo" src="hsLogo.png"/>
                    <img id="prostud" src="prostud.png"/>
                    <div>
                        <ul id="navigation">
                            
                        </ul>
                    </div>
                </div>
            </div> 
        
   <ul id="Navigation">
         <li><a href="#Beispiel">Profil&nbsp;</a></li>
         <li><a href="sucheprojekt.php">Suche Projekt&nbsp;</a></li>
         <li><a href="#Beispiel">Meine Projekte&nbsp;</a></li>
   
  </ul>
            
            
            
            <div id="inhalt">
                <div id="text">
                    <h2> start </h2>
                </div>
            </div>
            
            
            
            
          <div id="info"> 
              <?php //echo $_SESSION['benutzername'] ;                 

                    echo "<br>eingeloggt als: " . $_SESSION["vorname"] . "<br>";
                    echo "<a href=\"logout.php\">Logout</a>";
                   
              ?>
          </div>
        
        
      <div id="fussbereich">
                 &copy; 2014 IFI-Style
            </div>   

    </body>
</html>
