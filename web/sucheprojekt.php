<?php
include_once 'db_connection.php';
$connection = new DbConnection();
?>

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
                </div>
            </div>
            
            <div>
                        <ul id="Navigation">
                             <li><a href="#Beispiel">Profil&nbsp;</a></li>
                            <li><a href="sucheprojekt.php">Suche Projekt&nbsp;</a></li>
                            <li><a href="#Beispiel">Meine Projekte&nbsp;</a></li>
                            
                            
                        </ul>
                    </div>
            
             <div id="inhalt">
                
                 <h1>Hier können Sie nach mehreren Projekten suchen:</h1>
 
             
                <div id="text">
              
                    
                        <form  method="post" action="ausgabe.php">
                         
                             
                            <?php
                            
                                echo "<br>";
                                $sql = "SELECT skill.id, skill.skill FROM skill";
                                $result = $connection->connection($sql);
                                foreach ($result as $key => $value) {
                                    ?>
                    
                            <input id="skill" type="checkbox" name="skill[]" value="<?php echo $value['id']; ?>"> <?php echo $value['skill']; ?><br>
                                <?php } ?>
                                    <input id="senden" type="submit" name="senden" value="Senden" id="senden">
                            </form>
                  
                    </div>
              
              
            </div>
            
            
            <div id="info">
               
                <a href="page_student.php">Startseite</a>
            </div>
            
           
            <div id="fussbereich">
                 &copy; 2014 IFI-Style
            </div>
            
        </div>
    </body>
</html>



