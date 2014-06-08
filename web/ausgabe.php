 
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
$condition = join(',', $_POST['skill']);
  //  echo "<br>" . $_POST['skill'][$i] . "<br>";

    $sql = //"SELECT idprojet, idskill FROM projektskillzuordnung"
            // . " LEFT JOIN projekt ON projekt.id = projektskillzuordnung.idprojekt"
            // ." WHERE idskill='" . $_POST['skill'][$i]. "'";
            "SELECT p.titel, p.beschreibung, s.skill FROM projektskillzuordnung" .
            " LEFT JOIN projekt p ON p.id = projektskillzuordnung.idprojekt" .
            " LEFT JOIN skill s ON s.id =  projektskillzuordnung.idskill" .
            " WHERE idskill IN (".$condition.")";

  //  echo "<br>" . $sql;
    $result = $db->connection($sql);

    if(!empty($result)) {
         echo "<br><br>" . "Titel: " . $result[0]['titel']."<br>" . "Beschreibung: ". $result[0]['beschreibung'];
        echo "<br>Skills: ";
         foreach ($result as $key => $value) {
            echo $value['skill'] . ",";
        }
    
    }
    else{echo "Projekte mit dem ausgewählten skills nicht vorhanden";}

?>
                
                
     </div>
    
    
    
    <div id="info"> <a href="sucheprojekt.php">Zurück</a></div>

         
             <div id="fussbereich">
                 &copy; 2014 IFI-Style
            </div>
 </div>
</body>
</html>