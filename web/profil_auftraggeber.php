<?php
session_start();
if (empty($_SESSION['id']) || empty($_SESSION['benutzername'])) {
    header('Location: index.php');
}

include_once 'db_connection.php';
$connection = new DbConnection();


?>

<?php include_once 'auftraggeber_header.php'; ?>

<div id='cssmenu'> 
    <ul> 
        <li><a href='page_auftraggeber.php.'><span>Start</span></a></li> 
        <li><a href='profil_auftraggeber.php'><span>Profil</span></a></li>
        <li><a href='suchestudenten.php'><span>Suche Student</span></a></li>
        <li><a href='projektanlegen.php'><span>Projekt Anlegen</span></a></li>
        <li class='last'><a href='projekte_auftraggeber.php'><span>Meine Projekte</span></a>
        </li>
    </ul> 
</div>

            <div id="inhalt">
                  <div id="InhaltHöhe">
                        <h4 class="h4">Persönliche Daten</h4>
                        <div id="profilDaten">

                          <?php
                echo "<table id= 'profiltabelle' >";
                echo "<tr>";
                echo "<td>" . 'Benutzername: ' . "</td>";
                echo "<td >" . $_SESSION["benutzername"] .  " </td>" . "<br>" ;
                echo "</tr>";
                echo "<tr>";
                echo "<td>" . 'Vorname: ' . "</td>";
                echo "<td >" . $_SESSION["vorname"] .  " </td>" . "<br>" ;
                echo "</tr>";
                echo "<tr>";
                echo "<td>" . 'Nachname: ' . "</td>";
                echo "<td >" . $_SESSION["nachname"] .  " </td>" . "<br>" ;
                echo "</tr>";
                echo "<tr>";
                echo "<td>" . 'Email: ' . "</td>";
                echo "<td >" . $_SESSION["email"] .  " </td>" . "<br>" ;
                echo "</tr>";
                echo "</table>";
                
                ?> 
                <br>           
                <hr>

                </div>
                  </div></div>
            <div id="info">
                  <div id="InhaltArt">
                <?php
                //anzeige wer eingeloggt ist und logout
                echo "<br>Eingeloggt als: " . $_SESSION["vorname"] . " " . $_SESSION["nachname"] . " >> ";
                echo "<a href=\"logout.php\">Abmelden</a>";
                ?>
                  
                  </div></div>
                
    <?php include_once 'footer.php'; ?>

