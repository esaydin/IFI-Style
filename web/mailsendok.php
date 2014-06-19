

<?php
session_start();
if (empty($_SESSION['id']) || empty($_SESSION['benutzername'])) {
    header('Location: index.php');
}

include_once 'db_connection.php';
$db = new DbConnection();
?>
<?php include_once 'student_header.php'; ?>
<div id='cssmenu'> 
    <ul> 
        <li><a href='page_student.php'><span>Start</span></a></li> 
        <li><a href='profil_student.php'><span>Profil</span></a></li>
        <li class='last'><a href='sucheprojekt.php'><span>Suche Projekt</span></a>
        </li> 
    </ul> 
</div>

<!--Textausgabe, wenn die mail versenet wurde-->
<div id="inhalt">
    <div id="InhaltHöhe">
        <div id="profilDaten">
            <p>Ihre Nachricht wurde versendet! Sie werden bezüglich der Teilnahme benachrichtigt.</p> 
            <a href="page_student.php">Zurück zur Startseite</a>
        </div>
    </div>
</div>

<?php include_once 'info.php'; ?>

<!--Inkludieren vom Fussbereich-->
<?php include_once 'footer.php'; ?>


