<?php
session_start();
if (empty($_SESSION['id']) || empty($_SESSION['benutzername'])) {
    //header('Location: index.php');
}

include_once 'db_connection.php';
$connection = new DbConnection();

//==============================================================================
$skillsAngelegt = false;

if (isset($_POST['senden'])) {
    $sql = "DELETE FROM benutzerskillzuordnung"
            . " WHERE idbenutzer = '" . $_SESSION["id"] . "';";
    $connection->connection($sql);
    if (!empty($_POST["skill"])) {
        // Projekt speichern
        // projektskills speicher
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
        $skillsAngelegt = true;
    }
}

//hhh==============================================================================
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

<?php include_once 'header.php'; ?>

            <div id='cssmenu'> 
                <ul> <li class='active'><a href='page_student.php.'><span>Start</span></a></li> 
                    <li><a href='profil_student.php'><span>Profil</span></a></li>
                    <li class='last'><a href='sucheprojekt.php'><span>Suche Projekt</span></a>
                    </li> 
                </ul> 
            </div>

            <div id="inhalt">

                <?php
                echo "Benutzername: " . $_SESSION["benutzername"] . "<br>"
                . "Vorname: " . $_SESSION["vorname"] . "<br>"
                . "Nachname: " . $_SESSION["nachname"] . "<br>"
                . "E-Mail: " . $_SESSION["email"] . "<br>"
                . "<hr>";
                ?>

                <form  method="post">

                    <?php
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
            </div>
            <div id="info">
                <?php
                echo "<br>eingeloggt als: " . $_SESSION["benutzername"] . "<br>";
                echo "<a href=\"logout.php\">Logout</a>";
                ?>
            </div>
    <?php include_once 'footer.php'; ?>
