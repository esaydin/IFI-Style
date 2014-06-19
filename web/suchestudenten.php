<?php
session_start();
if (empty($_SESSION['id']) || empty($_SESSION['benutzername'])) {
    header('Location: index.php');
}

include_once 'db_connection.php';
$connection = new DbConnection();
?>
<!--Inkludieren von Header für den Kopfbereich-->
<?php include_once 'auftraggeber_header.php'; ?>

<!--Navigationsbereich mit den Punkten Start, Profil, Student suchen und Projekt anlegen-->
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
        
         

                <h1 class="h4">Hier können Sie nach mehreren Studenten suchen:</h1>
                
                <div id="text">
                  <div id="profilDaten">
                       <p>Wählen Sie mindestens ein Skill, um geeigneten Studenten für das Projekt zu filtern. </p>
                    <form  method="post" action="ausgabe_auftraggeber.php">
                       
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
                         <p id="und">Zusätzlich anklicken:<br> Für Studenten, die alle ausgewählten Skills besitzen.</p>
                        <input id="verknuepfung" name="verknuepfung" type="checkbox">
                    </form>
                        </div>
                </div>
                  </div>
        
    </div>
    
   
</div>

<div id="info">
      <div id="InhaltArt">
 <?php
                //echo $_SESSION['benutzername'] ;                 

               echo "<br>Eingeloggt als: " . $_SESSION["vorname"] . " " . $_SESSION["nachname"] . " >> ";
                echo "<a href=\"logout.php\">Abmelden</a>";
                ?>
                </br>
              
      </div></div>
<!--Inkludieren vom Fussbereich-->
<?php include_once 'footer.php'; ?>
