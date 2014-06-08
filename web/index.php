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





            <div id="inhalt">


                <h2 class="start" > Text...</h2>

            </div>






            <div id="info">
                <div id="login">
                    <form method="post" action="index.php">
                        <table id="tabelleLogin">
                            <tr>
                                <td><input type="text" name="benutzername" placeholder="benutzername" value="" /></td>
                            </tr> 
                            <tr>
                                <td><input type="password" name="kennwort" placeholder="kennwort" value="" /></td>
                            </tr>
                            <tr>
                                <td colspan="2" align="right" id="anmelden">
                                    <input type="submit" name="anmelden" value="Anmelden">
                                </td>
                            </tr>
                            <tr>

                                <td colspan="2" align="right" id="registrieren">
                                    <a href="registrieren.php">Neu Registrieren</a>
                                </td>
                                <td>

                                </td>
                            </tr>
                        </table>
                    </form>
                </div>

            </div>


            <div id="fussbereich">
                &copy; 2014 IFI-Style
            </div>

        </div>
    </body>
</html>
