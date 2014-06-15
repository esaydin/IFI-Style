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
                    <li><a href='profil_student.php'><span>Profil</span></a></li>
                    <li class='last'><a href='sucheprojekt.php'><span>Suche Projekt</span></a>
                    </li> 
                </ul> 
            </div>

            <!--Textausgabe, wenn man sich als Student eingeloggt hat-->
            <div id="inhalt">
                <h2 class="studh2">Sie sind als Student eingeloggt</h2><br/>
                <p class="textstud">Als Student haben Sie die Möglichkeiten Skills die Sie besitzen über das Profil zu speichern.<br/>
                    Diese Informationen werden dafür genutzt,<br/>dass eventuell ein Auftraggeber Sie für sein Projekt finden kann.<br/>
                    Selber können Sie unter "Suche Projekte" präziese Projekte filtern, die für Sie interessant sein könnten.</p>
            </div>

            <div id="info">
                <?php                
                //Textausgabe, je nach eingeloggter Benutzer
                echo "<br>eingeloggt als: " . $_SESSION["benutzername"] . "<br>";
                //Link zum Logout
                echo "<a href=\"logout.php\">Logout</a>";
                ?>

            </div>
       <!--Inkludieren vom Fussbereich-->
       <?php include_once 'footer.php'; ?>
