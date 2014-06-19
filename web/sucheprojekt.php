<?php
session_start();
if (empty($_SESSION['id']) || empty($_SESSION['benutzername'])) {
    header('Location: index.php');
}


include_once 'db_connection.php';
$connection = new DbConnection();
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
    <div id="InhaltHöhe"> 
        <div id="profilDaten">

            <h4 class="h4">Hier können Sie nach Projekten suchen</h4>
            <p>Wählen Sie mindestens ein Skill, um Projekte zu filtern. </p>
            <form  method="post" action="ausgabe_student.php">
               
                <?php
                echo "<br>";
                //liste der skills wid von der datenbank geholt
                $sql = "SELECT * FROM skill";
                $result = $connection->connection($sql);

                foreach ($result as $key => $value) {
                    ?>
                    <input id="skill" type="checkbox" name="skill[]" value="<?php echo $value['id']; ?>"> <?php echo $value['skill']; ?><br>
                <?php } ?>
                <input id="senden" type="submit" name="senden" value="Senden" id="senden">
                 <!--und verknüpfung damit alle ausgewählten skills im projekt vorhanden sind-->
                 <p id="und">Zusätzlich anklicken:<br> wenn alle ausgewählten Skills im Projekt vorhanden sein sollen.</p>
                <input id="verknuepfung" name="verknuepfung" type="checkbox">
            </form>
        </div>
    </div>
</div>

<div id="info">
    <div id="InhaltArt">
         <?php
     echo "<br>Eingeloggt als: " . $_SESSION["vorname"] . " " . $_SESSION["nachname"] . " >> ";
    echo "<a href=\"logout.php\">Abmelden</a>";
    ?>
       
    </div>
</div>
<!--Inkludieren vom Fussbereich-->
<?php include_once 'footer.php'; ?>
