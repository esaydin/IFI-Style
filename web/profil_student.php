<?php
session_start();
if (empty($_SESSION['id']) || empty($_SESSION['benutzername'])) {
    header('Location: index.php');
}

include_once 'db_connection.php';
$connection = new DbConnection();

//==============================================================================
$skillsAngelegt = false;
//wenn man auf senden klickt wird erst alles gelöscht
if (isset($_POST['senden'])) {
    $sql = "DELETE FROM benutzerskillzuordnung"
            . " WHERE idbenutzer = '" . $_SESSION["id"] . "';";
    $connection->connection($sql);
    //wenn skills ausgewählt wurde werden diese in die datenbank gespeichert
    //ind die tabelle benutzerskillzuornung
    if (!empty($_POST["skill"])) {
      
        foreach ($_POST["skill"] as $key => $value) {
            $sql = "INSERT INTO benutzerskillzuordnung (idbenutzer, idskill)"
                    . " SELECT " . $_SESSION["id"] . ", $value"
                    . " FROM DUAL"
                    . " WHERE NOT EXISTS ("
                    . "   SELECT 1"
                    . "   FROM benutzerskillzuordnung"
                    . "   WHERE idbenutzer = '" . $_SESSION["id"] . "' AND idskill = '$value'"
                    . " );";
            $connection->connection($sql);
        }
        //wenn die daten gespeichert werden wird skillsAngelegt auf true gesetzt
        $skillsAngelegt = true;
    }
}

//==============================================================================
$sql = "SELECT * FROM benutzerskillzuordnung"
        . " WHERE idbenutzer = '" . $_SESSION['id'] . "';";
$result = $connection->connection($sql);
$ids = "";
if (!is_bool($result)) {
    foreach ($result as $value) {
        if (count($ids) == 0) {
            $ids .= $value["idskill"];
        } else {
            $ids .= "," . $value["idskill"];
        }
    }
}
//==============================================================================
?>

<?php include_once 'student_header.php'; ?>

            <div id='cssmenu'> 
                <ul> <li class='active'><a href='page_student.php'><span>Start</span></a></li> 
                    <li><a href='profil_student.php'><span>Profil</span></a></li>
                    <li class='last'><a href='sucheprojekt.php'><span>Suche Projekt</span></a>
                    </li> 
                </ul> 
            </div>

            <div id="inhalt">
                 
                      <h4 class="h4">Persönliche Daten</h4>
                       <div id="profilDaten">
                <?php
                //Daten von der eingeloggten person werden von der Session geholt
                echo "Benutzername: " . $_SESSION["benutzername"] . "<br>"
                   . "Vorname:      " . $_SESSION["vorname"] . "<br>"
                   . "Nachname:     " . $_SESSION["nachname"] . "<br>"
                   . "E-Mail:       " . $_SESSION["email"] . "<br>"
                   . "<hr>";
                ?>

                <form  method="post">

                    <?php
                    //die liste der skills wird von der Datenbank geholt und mit checkbox versehen
                    //wenn schon   skills vorhanden sind, sind sie markiert   
    
                    echo "<br>";
                    $sql = "SELECT * FROM skill";
                    $result = $connection->connection($sql);
                    if (!is_bool($result)) {
                        foreach ($result as $key => $value) {
                            ?>
                            <input id="skill" type="checkbox" name="skill[]" value="<?php echo $value['id']; ?>"
                             
                            <?php if (!is_bool(strpos($ids, $value['id']))) echo "checked"; ?>
                                   > <?php echo $value['skill']; ?><br>
                               <?php } ?>
                           <?php } ?>
                    <input id="senden" type="submit" name="senden" value="Senden" id="senden">
                </form>
               
                  </div></div>

            <div id="info">
                <div id="InhaltArt">
                <?php
                echo "<br>Eingeloggt als: " . $_SESSION["benutzername"] . "<br>";
                echo "<a href=\"logout.php\">Abmelden</a>";
                ?>
                </div></div>
    <?php include_once 'footer.php'; ?>
