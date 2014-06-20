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
        <div id="profilDaten">
            <h1 class="h4">Projekte veröffentlichen:</h1>

            <form method="post" action="projektanlegencheck.php">
                <table id="projektanlegen">
                    <tr>
                        <td>
                            <input type="text" name="titel" placeholder="*Titel" value="" /><br />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <textarea name="projektbeschreibung"  placeholder="*Beschreibung" id="projektbeschreibung" value="" rows="10" cols="40">
                            </textarea><br />
                        </td>
                    </tr>
                    <tr>
                        <td><br>
                            <p>Kreuzen Sie die gew&uuml;nschten Skills an:</p>
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
                        <td colspan="2" align="left"><br>
                            <input type="submit" name="veröffentlichen" value="Veröffentlichen">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>

<?php include_once 'info.php'; ?>
<!--Inkludieren vom Fussbereich-->
<?php include_once 'footer.php'; ?>
