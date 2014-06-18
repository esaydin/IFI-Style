<?php
session_start();
if (empty($_SESSION['id']) || empty($_SESSION['benutzername'])) {
    header('Location: index.php');
}

include_once 'db_connection.php';
$connection = new DbConnection();
?>
<!--Inkludieren von Header für den Kopfbereich-->
<?php include_once 'header.php'; ?>

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
        
         

                <h1>Hier können Sie nach mehreren Studenten suchen:</h1>
                <div id="text">
                    <form  method="post" action="ausgabe_auftraggeber.php">
                        <p id="und">Und</p>
                        <input id="verknuepfung" name="verknuepfung" type="checkbox">
                        <?php
                        echo "<br>";
                        $sql = "SELECT * FROM skill";
                        $result = $connection->connection($sql);

                        foreach ($result as $key => $value) {
                            ?>
                            <input id="skill" type="checkbox" name="skill[]" value="<?php echo $value['id']; ?>"> <?php echo $value['skill']; ?><br>
                        <?php }
                        ?>
                        <input id="senden" type="submit" name="senden" value="Senden" id="senden">
                    </form>
                </div>
                  </div>
        
    </div>
    
   
</div>

<div id="info">
      <div id="InhaltHöhe">
 <?php
                //echo $_SESSION['benutzername'] ;                 

                echo "<br>eingeloggt als: " . $_SESSION["benutzername"] . "<br>";
                echo "<a href=\"logout.php\">Logout</a>";
                ?>
                </br>
                <a href="page_auftraggeber.php">Startseite</a>
      </div></div>
<!--Inkludieren vom Fussbereich-->
<?php include_once 'footer.php'; ?>
