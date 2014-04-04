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
    </head>
    <body>

         <?php
        // titel und projektbeschreibung darf nicht leer sein
        if (!empty($_POST["login"]) && !empty($_POST["kennwort"])) {

           // echo "LOGIN: " . $_POST["login"] . "<br>" . "KENNWORT: " . $_POST["kennwort"];

            //DATENBAnk
            $link = mysqli_connect("localhost", "root", "", "projektverwaltung") or die("Error " . mysqli_error($link));

//consultation:

            $sql = "SELECT vorname FROM benutzer WHERE login = '" . $_POST["login"] . "'"
                    . " AND kennwort = '" . $_POST["kennwort"] . "'";

//execute the query.
            //echo "<br>$sql";

            if ($result = $link->query($sql)) {

//display information:

                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<br>eingeloggt als: " . $row["vorname"] . "<br>";
                }
            }else{
                echo "<br>SQL Fehler";
                echo "<br><a href=\"index.php\"> Zurück </a>";
            }
        } else {
        }?>
    </body>
</html>
