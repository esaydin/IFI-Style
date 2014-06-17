<?php
session_start();
if (empty($_SESSION['id']) || empty($_SESSION['benutzername'])) {
    header('Location: index.php');
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
<?php include_once 'header.php'; ?>

            <div id='cssmenu'> 
                <ul> 
                    <li class='active'><a href='page_student.php'><span>Start</span></a></li> 
                    <li><a href=''><span>Profil</span></a></li>
                    <li class='last'><a href='sucheprojekt.php'><span>Suche Projekt</span></a>
                    </li> 
                </ul> 
            </div>

            <div id="inhalt">
                
                <h1>Feedback</h1>
                <h1>Projektteilnahme beantragen</h1>
                <form action="formmail.php" method="post">
                    <table id="projekthinzufuegen">
                        <tr>
                            <td>
                                <!-- Hier die eigentlichen Formularfelder eintragen. Die folgenden sind Beispielangaben. -->
                                <dl> Titel: <?php if (isset($_POST["proname"])) echo $_POST["proname"]; ?> </dl>
                            </td>
                        </tr>
                        <tr>
                            <td>
                               <p><label>Betreff:<br><input type="text" name="Betreff"></label></p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p><label>Bemerkungen:<br>
                                    <textarea name="Nachricht" cols="50" rows="8"></textarea></label></p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>
                                    <input type="submit" value="Senden" />
                                    <input type="reset" value="Zurücksetzen" />
                                </p>
                            </td>
                        </tr>
                </form>
                </table>
            </div>
            <div id="info">
                <?php
                //echo $_SESSION['benutzername'] ;                 

                echo "<br>eingeloggt als: " . $_SESSION["benutzername"] . "<br>";
                echo "<a href=\"logout.php\">Logout</a>";
                ?>
                </br>
                <a href="sucheprojekt.php"/>
            </div>
          <?php include_once 'footer.php'; ?>