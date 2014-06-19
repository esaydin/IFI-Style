<?php
session_start();
if (empty($_SESSION['id']) || empty($_SESSION['benutzername'])) {
    header('Location: index.php');
}
//Inkludieren von db_connection für die Datenbankverbindung
include_once 'db_connection.php';
$db = new DbConnection();
?>
<!--Inkludieren von Header für den Kopfbereich-->
<?php include_once 'auftraggeber_header.php'; ?>

<!--Navigationsbereich mit den Punkten Start, Profil, Student suchen und Projekt anlegen-->
<div id='cssmenu'> 
    <ul> 
        <li class='active'><a href='page_auftraggeber.php.'><span>Start</span></a></li> 
        <li><a href='profil_auftraggeber.php'><span>Profil</span></a></li>
        <li><a href='suchestudenten.php'><span>Suche Student</span></a></li>
        <li><a href='projektanlegen.php'><span>Projekt Anlegen</span></a></li>
        <li class='last'><a href='projekte_auftraggeber.php'><span>Meine Projekte</span></a>
        </li>
    </ul> 
</div>
<div id="inhalt">
      <div id="InhaltHöhe">

    <!--Textausgabe bei der Anmeldung als Auftraggeber-->
    <h2 class="studh2"> Sie Sind als Auftraggeber eingeloggt</h2><br/>
    <p class="textstud">Als Auftraggeber haben Sie die Möglichkeiten Studenten für ihr Projekt zu finden, die Ihren Ansprüchen entspricht.
        Selber können Sie unter "Projekt anlegen" Projekte veröffentlichen, die von allen Studenten sichtbar werden.</p>
      </div></div>

<div id="info">
       <div id="InhaltArt">

    <?php               
    //Textausgabe, je nach eingeloggter Benutzer
    echo "<br>Eingeloggt als: " . $_SESSION["vorname"] . " " . $_SESSION["nachname"] . " >> ";
    //Link zum Logout
    echo "<a href=\"logout.php\">Abmelden</a>";
    ?>
      </div></div>
<!--Inkludieren vom Fussbereich-->
<?php include_once 'footer.php'; ?>
