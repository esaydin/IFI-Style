
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

            <!--textausgabe wenn die mail nicht versendet werden kann-->
            <div id="inhalt">
                  <div id="InhaltHöhe">
                       <div id="profilDaten">
                    
              <p>Leider ist ein Fehler aufgetreten, und Ihre Formular konnten nicht an uns gesendet werden.</p>
                 <a href="page_student.php">Zurück zur Startseite</a>
                  </div></div> </div>

            <div id="info">
                      <div id="InhaltArt">
                <?php                
                //Textausgabe, je nach eingeloggter Benutzer
                echo "<br>eingeloggt als: " . $_SESSION["benutzername"] . "<br>";
                //Link zum Logout
                echo "<a href=\"logout.php\">Logout</a>";
                ?>

                  </div></div> 
       <!--Inkludieren vom Fussbereich-->
       <?php include_once 'footer.php'; ?>



