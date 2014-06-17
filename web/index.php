<?php
//Sitzung wird gestartet
session_start();
//Importieren der Datenbankverbindung
include_once 'db_connection.php';
//Datenbankobjekt wird erstellt
$db = new DbConnection();

//In diesem Abschnitt wird ein Loginversuch ausgeführt
//Nach dem Füllen des Loginbereichs werden die Logindaten über die Postvaribale abgefangen
if (!empty($_POST["benutzername"]) && !empty($_POST["kennwort"])) {

    $sql = "SELECT id, benutzername, vorname, nachname, email, idbenutzertyp FROM benutzer WHERE benutzername = '" . $_POST["benutzername"] . "'"
            . " AND kennwort = '" . md5($_POST["kennwort"]) . "'";
    //Ergebnisse von $sql werden in result gespeichert
    $result = $db->connection($sql);

    //Überprüfung, ob result leer oder nicht leer ist
    if (!empty($result)) {
        //foreach geht die Zeile durch
        //Bei einem erfolgreichen Login werden die Daten aus der Datenbank in die Session gespeichert, über Session kann mann
        //kontrollieren, ob man eingeloggt ist oder nicht
        foreach ($result as $key => $value) {// über value hat man Zugriff auf die Spalten
            $_SESSION['id'] = $value['id'];
            $_SESSION['benutzername'] = $value['benutzername'];
            $_SESSION['vorname'] = $value['vorname'];
            $_SESSION['nachname'] = $value['nachname'];
            $_SESSION['email'] = $value['email'];
            $_SESSION['idbenutzertyp'] = $value['idbenutzertyp'];

            //Wenn idbenutzertyp = 1 dann wird er auf page_student geleitet
            $page = "";
            if ($value['idbenutzertyp'] == 1) {
                $page = "page_student.php";
            }
            //Wenn idbenutzertyp = 2 dann wird er auf auftraggeber geleitet
            if ($value['idbenutzertyp'] == 2) {
                $page = "page_auftraggeber.php";
            }
            //Seitenwechsel
            header('Location: ' . $page);
        }
        
    }
    
}
?>
<!--Import der Klasse header.php  -->
<?php include_once 'header.php'; ?>
<!--Inhalte der Startseite -->
<div id="inhalt">
    <h1 class="studh2">  Willkommen!</h1>
    <p class="textstart">  Die Seite steht jedem als eine Austauschplattform zur verfügung
        und <br>ermöglicht Projekte zu suchen oder eigene zu veröffentlichen!</p>
    
    
    <div id ="slideshow">
<?php
# Diashow mit PHP und JavaScript

# Verzeichnis der Bilder
$verzeichnis = "bilderslide/";

# Geschwindigkeit in Millisekunden
# 3000 = 3 Sekunden
$peed = 1000;

echo "
<div style='text-align: center;'><img id='dummy' src='#'></div>

<script type='text/javascript'>
var bild = new Array();
var i = 0;
";

$ordner = openDir($verzeichnis);
$by = 0;
while ($file = readDir($ordner)) {
 if($file != "." && $file != "..") {
  echo "bild[$by]='$verzeichnis$file';\n";
  $by++;
 }
}
closeDir($ordner);

echo "
function anzeigen() {
 if (i < bild.length) {
  document.getElementById('dummy').src=bild[i];
  i++;
 }
 else {
  i = 0;
 }
  setTimeout('anzeigen()', $peed);
}
anzeigen();
</script>
";
?>
</div>
    
    
</div>
<!-- -->
<div id="info">   
    <!-- Loginbereich -->
    <div id="login">
        <h2 class="anmelden"> Anmelden</h1>
            <!--Formular für den Loginbereich, mit Benutzername und verschlüsstem Passwort -->
            <form method="post" action="index.php">
                <table id="tabelleLogin">
                    <tr>
                        <td><input type="text" name="benutzername" placeholder="benutzername" value="" /></td>
                    </tr> 
                    <tr>
                        <td><input type="password" name="kennwort" placeholder="kennwort" value="" /></td>
                        <td><input type="submit"  name="anmelden" style="background-color: #B2CCE5" value="Anmelden"/></td>
                    </tr>
                </table>
            </form>
            <h4 class="reg"> Neu bei Search ProStud?<br> Registriere Dich!</h4>  
            
                <a href="registrieren.php" id="registrierung" value="Neu Registrieren" style="margin-left: 50px"></a>
            <br />
            
            
    </div>
</div>




<?php include_once 'footer.php'; ?>
