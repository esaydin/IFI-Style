<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href="suche.css">
    </head>
    <body>
       
        
        
        <div id="seite">
            <div id="kopfbereich">
                
                <h1>Herzlich Willkommen zu unserem Suchportal!<h1/>
                    <img id="BildLupe" src="LupeHS.png"/>
                
            </div>
            
           
        <?php
        if (!empty($_POST["myinputprojekte"])) {
            $a = $_POST['myinputprojekte'];
        //    echo $_POST['myinputprojekte'];
            echo "<br>";
            //conection:
            $link = mysqli_connect("localhost", "root", "", "projektverwaltung") or die("Error " . mysqli_error($link));

//consultation:
            $list = explode(",", $a);
            for ($i = 0; $i < count($list); $i++) {
             //   echo "" . $list[$i] . "<br>";

                $query = "SELECT s.skill, p.name, p.beschreibung FROM skillprojekte s"
                        . " LEFT JOIN projekte p ON p.id = s.keyprojekte"
                        . " WHERE skill='" . trim($list[$i]) . "'";



//execute the query.

                $result = $link->query($query);

//display information:
                
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "Gefundene Projekte: "."<br>"."<br>";
                       // echo $row["name"] . " : " . $row["beschreibung"] . "<br>gefundene skills: " . $row["skill"] . "<br>";
                       echo "Projektname: " . $row["name"] ."<br>". "Projektbeschreibugn: " . $row["beschreibung"] . "<br>Erwartete Skills: " . $row["skill"]."<br>"."<br>";
                    }
                } else {
                    echo "<br>Fehler";
                }
            }
                
                       
        } else {
            ?>
                        
                 <table  border="0" id="Tabelle1">
                     <tr>
                         <th>Hier kann man nach einen geeigneten Projekt für sich suchen,<br/> indem man seine Skills in die Suchleiste schreibt.</th>
                      
                     </tr>
                     
                     <tr>  
                         <td><form method="post" action="index.php" id="suchekasten1"> 
                         <input type="text" name="myinputprojekte" value="" placeholder=" nach Projekte suchen " id="suchbegriff"> <br>
                         <input type="submit" name="senden" value="Senden" id="senden"> </td>
                    </tr> 
                      </table>
            </form>
               
           
<?php } ?>

        <?php
        if (!empty($_POST["myinputbenutzer"])) {
            $b = $_POST['myinputbenutzer'];
          //  echo "benutzer: " . $_POST['myinputbenutzer'];
            echo "<br>";
            //conection:
           $link = mysqli_connect("localhost", "root", "", "projektverwaltung") or die("Error " . mysqli_error($link));



            $list1 = explode(",", $b);
            for ($i = 0; $i < count($list1); $i++) {
             //   echo "" . $list1[$i] . "<br>";

                $query = "SELECT sb.skill, be.login, be.nachname, be.vorname FROM skillbenutzer sb"
                        . " LEFT JOIN benutzer be ON be.id = sb.keybenutzer"
                        . " WHERE skill='" . trim($list1[$i]) . "'";

//echo "$query";
                $result1 = $link->query($query);

//display information:

                if (mysqli_num_rows($result1) > 0) {
                    while ($row = mysqli_fetch_assoc($result1)) {
                         echo "Gefundene Studente: "."<br>"."<br>";
                       echo "Benutzername: " . $row["login"] ."<br>". "Name: " . $row["nachname"] . "<br>". "Vorname: " . $row["vorname"]."<br>Skills: " . $row["skill"]."<br>"."<br>";
                    }
                } else {
                    echo "<br>Benutzer Fehler";
                }
            }
        } else {
            ?>
                             <table  border="0" id="Tabelle2">
                     <tr>
                         <th>Hier kann man ein geigneten Student für ein Projekt suchen, <br/> indem man die erwarteten Skills in die Suchleiste schreibt.</th>
                      
                     </tr>
                     
                     <tr>
                         <td>   <form method="post" action="index.php" id="suchekasten2"> 
                <input type="text" name="myinputbenutzer" value="" placeholder=" nach Student suchen " id="suchbegriff"> <br>
                <input type="submit" name="senden" value="Senden" id="senden"></td> 
            </form>
                     </tr>
                    
                     

         </table>
<?php } ?>
             </div>
        </div>
    </body>
</html>
