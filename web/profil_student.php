<?php
session_start();
if( empty($_SESSION['id']) || empty($_SESSION['benutzername']) ){
    //header('Location: index.php');
}

     include_once 'db_connection.php';
             $connection = new DbConnection();
             
             
             
             
             
             
             
    

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
    <ul> <li class='active'>
            <a href='page_student.php.'><span>Start</span></a></li> 
        <li><a href='profil_student.php'><span>Profil</span></a></li>
        <li class='last'><a href='sucheprojekt.php'><span>Suche Projekt</span></a>
        </li> </ul> 
</div>
            
            

            <div id="inhalt">
                <form  method="post" >
                       
                        
                        <?php
                          
                        echo "<br>";
                        $sql = "SELECT * FROM skill";
                        $result = $connection->connection($sql);
                        
                        
                        foreach ($result as $key => $value) {
                            ?>
                       
                            <input id="skill" type="checkbox" name="skill[]" value="<?php echo $value['id']; ?>"> <?php echo $value['skill']; ?><br>
                        <?php } ?>
                        <input id="senden" type="submit" name="senden" value="Senden" id="senden">
                    </form>
                       
            </div>

            <div id="info">
               
           <?php //echo $_SESSION['benutzername'] ;                 

                    echo "<br>eingeloggt als: " . $_SESSION["benutzername"] . "<br>";
                    echo "<a href=\"logout.php\">Logout</a>";
                   
              ?>
                
                <?php
                     $skillsAngelegt = false;        
             
             
    if (!empty($_POST["skill"])) {
    // Projekt speichern
   
   
    
        // projektskills speichern
        foreach ($_POST["skill"] as $key => $value) {
            $sql2 = "INSERT INTO benutzerskillzuordnung"
                    . " VALUES ( (SELECT id FROM benutzer WHERE benutzername = '" . $_SESSION["benutzername"] . "'), '" . $value . "' )";
            $connection->connection($sql2);
        }

        $skillsAngelegt = true;
        echo '</br>';
        echo '</br>';
        echo '</br>';
        echo '</br>';
        echo"<span style ='font-family:sans-serif'>Daten wurden gespeichert</span>";
        
    }
                    ?>

            </div>


            <div id="fussbereich">
                &copy; 2014 IFI-Style
            </div>

        </div>
    </body>
</html>
