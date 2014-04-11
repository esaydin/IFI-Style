
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Logincheck</title>
        <link rel="stylesheet" type="text/css" href="indexCSS.css">
    </head>
    <body>

         <?php
        session_start();
         $username= $_POST['login']; 
         $password=$_POST['kennwort'];
         $password = md5($_POST['kennwort']);
         echo $password;
        if (!empty($_POST["login"]) && !empty($_POST["kennwort"])) {
     
           // echo "LOGIN: " . $_POST["login"] . "<br>" . "KENNWORT: " . $_POST["kennwort"];

            //DATENBANK
            $link = mysqli_connect("localhost", "root", "", "projektverwaltung") or die("Error " . mysqli_error($link));
             
//consultation:

            $sql = "SELECT vorname FROM benutzer WHERE login = '" . $_POST["login"] . "'"
                    . " AND kennwort = '" . $_POST["kennwort"] . "'";
           
           
           
             
           
//execute the query.
            //echo "<br>$sql";

            if ($result = $link->query($sql)) {

//display information:

                   while ($row = mysqli_fetch_assoc($result)) {
                   if($_SESSION["login"] = $username AND isset($_POST['login']));
                   echo "<br>eingeloggt als: " . $row["vorname"] . "<br>";
                   echo"<br><a href=\"login.php\"> <button type='submit' name='abmelden'>Abmelden</button> </a>";
                   exit();
                   }
                
            
              
                   if(!$_SESSION["login"] = $username AND isset($_POST['login']));
                   echo "Falscher Benutzername und/oder Passwort!";
                   echo "<br><a href=\"login.php\"> <button type='submit' name='zuruck'>Zurück</button> </a>"; 
                   exit();
              }

          }
                        
             
           
           
               //echo "<br>SQL Fehler";
                
            ?>
       
       
    </body>
</html>
