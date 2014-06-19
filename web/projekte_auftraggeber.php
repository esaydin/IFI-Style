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
        <li ><a href='page_auftraggeber.php.'><span>Start</span></a></li> 
        <li><a href='profil_auftraggeber.php'><span>Profil</span></a></li>
        <li><a href='suchestudenten.php'><span>Suche Student</span></a></li>
        <li><a href='projektanlegen.php'><span>Projekt Anlegen</span></a></li>
        <li class='last'><a href='projekte_auftraggeber.php'><span>Meine Projekte</span></a>
        </li>
    </ul> 
</div>
<div id="inhalt">
    <div id="InhaltHöhe"></div>
    
   
</div>

<?php include_once 'info.php'; ?>
<!--Inkludieren vom Fussbereich-->
<?php include_once 'footer.php'; ?>
