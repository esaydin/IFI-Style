<?php
session_start();

include_once 'db_connection.php';
$db = new DbConnection();
#
if (!empty($_POST["benutzername"]) && !empty($_POST["kennwort"])) {

    $sql = "SELECT id, benutzername, vorname, nachname, email, idbenutzertyp FROM benutzer WHERE benutzername = '" . $_POST["benutzername"] . "'"
            . " AND kennwort = '" . md5($_POST["kennwort"]) . "'";

    $result = $db->connection($sql);

    if (!empty($result)) {
        foreach ($result as $key => $value) {
            $_SESSION['id'] = $value['id'];
            $_SESSION['benutzername'] = $value['benutzername'];
            $_SESSION['vorname'] = $value['vorname'];
            $_SESSION['email'] = $value['email'];
                
                    

            $page = "";
            if ($value['idbenutzertyp'] == 1) {
                //echo "student";
                $page = "page_student.php";
            }
            if ($value['idbenutzertyp'] == 2) {
                //echo "Auftraggeber";
                $page = "page_auftraggeber.php";
            }
            header('Location: ' . $page);

            //echo "<br>" . "Eingeloggt als: " . $value["vorname"] . "<br>";
            //echo "<a href=\"logout.php\">Logout</a>";
        }
    } else {

        //echo "<br>" . "Kein passender Login gefunden.";
        //echo "<br><a href=\"index.php\"> Zurück </a>";
    }
} else {

    //echo "<br>" . "Logindaten nicht vollständig";
    //echo "<br>" . "<a href=\"index.php\"> Zurück </a>";
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
            



            <div id="inhalt">
                
             
                <h1 class="studh2">  Willkommen!</h1>
                  <p class="textstart">  Die Seite steht jedem als eine Austauschplattform zur verfügung
                und <br>ermöglicht Projekte zu suchen oder eigene zu veröffentlichen!</p>
                 

            </div>

            <div id="info">
               
            <div id="login">
                <h2 class="anmelden"> Anmelden</h1>
                    <form method="post" action="index.php">
                        <table id="tabelleLogin">
                            <tr>
                                <td><input type="text" name="benutzername" placeholder="benutzername" value="" /></td>
                            </tr> 
                            <tr>
                                <td><input type="password" name="kennwort" placeholder="kennwort" value="" /></td>
                              <td><input type="submit"  name="anmelden" style="background-color: #B2CCE5" value="Anmelden"/></td>
                            </tr>
                            <tr>
                               
                                    
                                </td>
                            </tr>
                            

                        </table>
                    </form>
                <h4 class="reg"> Neu bei Search ProStud?<br> Registriere Dich!</h4>  
                       <td colspan="2" align="right">
                           <a href="registrieren.php" id="registrieren1">
                               <button style="background-color: #FFCC7F ">  Registrieren</button></a>  </td><br />
                </div>

            </div>


            <div id="fussbereich">
                &copy; 2014 SearchProStud
            </div>

        </div>
    </body>
</html>
