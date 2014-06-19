<?php
session_start();
if (empty($_SESSION['id']) || empty($_SESSION['benutzername'])) {
    header('Location: index.php');
}

include_once 'db_connection.php';
$db = new DbConnection();
?>

<?php include_once 'student_header.php'; ?>
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
                    
                    <h1 class="h4">Projektteilnahme beantragen</h1>
                <form action="formmail.php" method="post">
                    <table id="projekthinzufuegen">
                        <tr>
                            <td>
                                <!-- Hier die eigentlichen Formularfelder eintragen. Die folgenden sind Beispielangaben. -->
                                <dl> Titel: <?php if (isset($_POST["proname"])) echo $_POST["proname"]; ?> </dl><!--titel wom Projekt wird gesetzt-->
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p><label>Betreff:<br><input id="projektteilnehmenbetreff"type="text" name="Betreff"></label></p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p><label>Bemerkungen:<br>
                                        <textarea id="projektteilnehmenbemerken"name="Nachricht" cols="50" rows="8"></textarea></label></p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>
                                    <input type="submit" value="Senden" />
                                    <input type="reset" value="Zurücksetzen" />
                                </p>
                            </td>
                        </tr>
                </form>
                </table>
                </div>
            </div>

            <div id="info">
                <div id="InhaltArt">
               <?php
              
                echo "<br>eingeloggt als: " . $_SESSION["benutzername"] . "<br>";
                echo "<a href=\"logout.php\">Logout</a>";
                ?>
                </br>
                <a href="sucheprojekt.php"/>
            </div>
            </div>
       <!--Inkludieren vom Fussbereich-->
       <?php include_once 'footer.php'; ?>
