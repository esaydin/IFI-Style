<?php
session_start();
if (empty($_SESSION['id']) || empty($_SESSION['benutzername'])) {
    header('Location: index.php');
}

include_once 'db_connection.php';
$connection = new DbConnection();
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php include_once 'header.php'; ?>

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
                <form method="post" action="projektanlegencheck.php">
                    <table id="projektanlegen">
                        <tr>
                            <td>
                                <input type="text" name="titel" placeholder="*Titel" value="" /><br />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <textarea name="projektbeschreibung"  placeholder="*Beschreibung" id="projektbeschreibung" rows="10" cols="40">
                                </textarea><br />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>Kreuzen Sie die gew&uuml;nschten Skills an:</p>
                                <p>
                                    <?php
                                    //liste der skills wird von der db geholt um auszuwählen welche skills man für dieses projekt braucht
                                    echo "<br>";
                                    $sql = "SELECT * FROM skill";
                                    $result = $connection->connection($sql);
                                    foreach ($result as $key => $value) {
                                        ?>

                                        <input type="checkbox" name="skill[]" value="<?php echo $value['id']; ?>"> <?php echo $value['skill']; ?><br>
                                    <?php } ?>
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" align="right">
                                <input type="submit" name="registrieren" value="Registrieren">
                            </td>
                        </tr>
                    </table>
                </form>
                  </div></div>

            <div id="info">
                  <div id="InhaltHöhe">
                <?php
                //echo $_SESSION['benutzername'] ;                 

                echo "<br>eingeloggt als: " . $_SESSION["benutzername"] . "<br>";
                echo "<a href=\"logout.php\">Logout</a>";
                ?>
                </br>
                <a href="page_auftraggeber.php">Zurück</a></div>
            </div> </div>
<?php include_once 'footer.php'; ?>
