<?php
session_start();

include_once 'db_connection.php';
$connection = new DbConnection();
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>   
        <link rel="stylesheet" type="text/css" href="css/main.css">

    </head>

    <body>

        <div id="seite"> 
            <div id="kopfbereich"> 

                <img id="hsLogo" src="bilder/hsLogo.png"/>
                <img id="prostud" src="bilder/prostud.png"/>
            </div>

            <div id='cssmenu'> 
                <ul> 
                    <li class='active'><a href='page_auftraggeber.php.'><span>Start</span></a></li> 
                    <li><a href=''><span>Profil</span></a></li>
                    <li><a href='suchestudenten.php'><span>Student suchen</span></a></li>
                    <li class='last'><a href='projektanlegen.php'><span>Projekt Anlegen</span></a>
                    </li> </ul> 
            </div>

            <div id="inhalt">
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
            </div>

            <div id="info">
                <?php
                //echo $_SESSION['benutzername'] ;                 

                echo "<br>eingeloggt als: " . $_SESSION["benutzername"] . "<br>";
                echo "<a href=\"logout.php\">Logout</a>";
                ?>
                </br>
                <a href="page_auftraggeber.php">Zurück</a></div>
        </div>

        <div id="fussbereich">
            &copy; 2014 IFI-Style
        </div>
    </div>
</body>
</html>
