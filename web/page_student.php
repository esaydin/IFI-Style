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

<!--Textausgabe, wenn man  sich als Student eingeloggt hat-->
<div id="inhalt">
    <div id="InhaltHöhe"> <h2 class="studh2">Sie sind als Student eingeloggt</h2>
        <p class="textstud">Als Student haben Sie die Möglichkeiten Skills die Sie besitzen über das Profil zu speichern.<br/>
            Diese Informationen werden dafür genutzt, dass eventuell ein Auftraggeber<br> Sie für sein Projekt finden kann.<br/>
            Selber können Sie unter "Suche Projekte" präziese Projekte filtern,<br> die für Sie interessant sein könnten.</p>
    </div>
</div>

<?php include_once 'info.php'; ?>
<!--Inkludieren vom Fussbereich-->
<?php include_once 'footer.php'; ?>
