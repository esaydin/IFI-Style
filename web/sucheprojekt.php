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
        <li class='active'><a href='page_student.php'><span>Start</span></a></li> 
        <li><a href='profil_student.php'><span>Profil</span></a></li>
        <li class='last'><a href='sucheprojekt.php'><span>Suche Projekt</span></a>
        </li> 
    </ul> 
</div>

<!--Textausgabe, wenn man  sich als Student eingeloggt hat-->
<div id="inhalt">
    <div id="InhaltHöhe"> 
        <div id="text">

            <h2>Hier können Sie nach Projekten suchen</h2>
            <form  method="post" action="ausgabe_student.php">
                <!--und verknüpfung damit alle ausgewählten skills im projekt vorhanden sind-->
                <p id="und">Und</p>
                <input id="verknuepfung" name="verknuepfung" type="checkbox">
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
            </form>
        </div>
    </div>
</div>

<div id="info">
    <div id="InhaltArt">
         <?php
    echo "<br>eingeloggt als: " . $_SESSION["benutzername"] . "<br>";
    echo "<a href=\"logout.php\">Logout</a>";
    ?>
    </br>
    <a href="page_student.php">Startseite</a>
    </div>
</div>
<!--Inkludieren vom Fussbereich-->
<?php include_once 'footer.php'; ?>
