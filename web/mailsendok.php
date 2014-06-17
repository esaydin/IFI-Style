

<?php
session_start();
if (empty($_SESSION['id']) || empty($_SESSION['benutzername'])) {
    header('Location: index.php');
}

include_once 'db_connection.php';
$db = new DbConnection();
?>

<?php include_once 'header.php'; ?>
            <div id='cssmenu'> 
                <ul> 
                    <li class='active'><a href='page_student.php'><span>Start</span></a></li> 
                    <li><a href='profil_student.php'><span>Profil</span></a></li>
                    <li class='last'><a href='sucheprojekt.php'><span>Suche Projekt</span></a>
                    </li> 
                </ul> 
            </div>

            <!--Textausgabe, wenn die mail versenet wurde-->
            <div id="inhalt">
               <p>Ihre Nachricht wurde versendet! Sie werden bezüglich der Teilnahme benachrichtigt.</p> 
               <a href="page_student.php">Zurück zur Startseite</a>
               
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


