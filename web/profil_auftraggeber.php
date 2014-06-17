<?php
session_start();
if (empty($_SESSION['id']) || empty($_SESSION['benutzername'])) {
    header('Location: index.php');
}

include_once 'db_connection.php';
$connection = new DbConnection();


?>

<?php include_once 'header.php'; ?>

<div id='cssmenu'> 
    <ul> 
        <li class='active'><a href='page_auftraggeber.php.'><span>Start</span></a></li> 
        <li><a href='profil_auftraggeber.php'><span>Profil</span></a></li>
        <li><a href='suchestudenten.php'><span>Suche Student</span></a></li>
        <li><a href='suchestudenten.php'><span>Projekt Anlegen</span></a></li>
        <li class='last'><a href='projekte_auftraggeber.php'><span>Meine Projekte</span></a>
        </li>
    </ul> 
</div>

            <div id="inhalt">

                <?php
                //Daten von der eingeloggten person werden von der Session geholt
                echo "Benutzername: " . $_SESSION["benutzername"] . "<br>"
                . "Vorname: " . $_SESSION["vorname"] . "<br>"
                . "Nachname: " . $_SESSION["nachname"] . "<br>"
                . "E-Mail: " . $_SESSION["email"] . "<br>"
                . "<hr>";
                ?>

                
            </div>
            <div id="info">
                <?php
                //anzeige wer eingeloggt ist und logout
                echo "<br>eingeloggt als: " . $_SESSION["benutzername"] . "<br>";
                echo "<a href=\"logout.php\">Logout</a>";
                ?>
            </div>
    <?php include_once 'footer.php'; ?>

