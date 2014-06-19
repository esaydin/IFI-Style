<?php
session_start();

if (empty($_SESSION['id']) || empty($_SESSION['benutzername'])) {
    header('Location: index.php');
}
?>

<?php include_once 'student_header.php'; ?>
<div id='cssmenu'> 
    <ul> 
        <li ><a href='page_student.php'><span>Start</span></a></li> 
        <li><a href='profil_student.php'><span>Profil</span></a></li>
        <li class='last'><a href='sucheprojekt.php'><span>Suche Projekt</span></a>
        </li> 
    </ul> 
</div>

<!--Textausgabe, wenn man  sich als Student eingeloggt hat-->
<div id="inhalt"> 
    <div id="profilDaten">
        <h1 class="h4">Gefundene Projekte:</h1>     
        <?php
        if (empty($_POST['skill'])) {
            header('Location: index.php');
        }

        include_once 'db_connection.php';
        $db = new DbConnection();
        $var = $_POST['skill'];


        $s = array();
        $condition = join(',', $_POST['skill']); // bsp: html, php, bla
        $skillanzahl = count($_POST['skill']);

// Und verknüpfung,alle ausgesuchten skills müssen im Projekt sein
        if (isset($_POST['verknuepfung'])) {
            $sql = "SELECT group_concat(tmp.id SEPARATOR ', ') As ids"//, tmp.titel, tmp.beschreibung, tmp.skills
                    . " FROM (
                    SELECT p.id, p.titel, p.beschreibung, group_concat(skill SEPARATOR ', ') As skills, count(p.titel) AS cnt
                    FROM projekt p
                    LEFT JOIN projektskillzuordnung psz ON psz.idprojekt = p.id
                    LEFT JOIN skill s ON s.id = psz.idskill
                    WHERE psz.idskill IN (" . $condition . ")
                    GROUP BY p.titel ORDER BY cnt DESC) As tmp
                    WHERE tmp.cnt = '$skillanzahl';";
        } else {
            //nicht alle asugewählten skills mussen in ein Projekt vorkommen, es reicht auch wenn nur eins dabei ist
            $sql = "SELECT group_concat(tmp.id SEPARATOR ', ') AS ids"
                    . " FROM (SELECT p.id"
                    . "   FROM projekt p"
                    . "   LEFT JOIN projektskillzuordnung psz ON psz.idprojekt = p.id"
                    . "   LEFT JOIN skill s ON s.id = psz.idskill"
                    . "   WHERE psz.idskill IN (" . $condition . ")"
                    . "   GROUP BY p.titel) As tmp";
        }

        $result = $db->connection($sql);

        $ids = $result[0];
        $sql2 = "SELECT projekt.titel, projekt.beschreibung, group_concat(skill.skill SEPARATOR ', ') AS skills"
                . " FROM `projektskillzuordnung`"
                . " LEFT JOIN skill ON skill.id = projektskillzuordnung.idskill"
                . " LEFT JOIN projekt ON projekt.id = projektskillzuordnung.idprojekt"
                . " WHERE idprojekt in (" . $ids["ids"] . ")"
                . " GROUP BY projekt.titel";
        $result = $db->connection($sql2);
//wernn result nicht leer ist werden die projekte angezeigt
        if (!empty($result)) {
            foreach ($result as $value) {
                ?>
                <br> Titel: <?php echo $value["titel"]; ?>
                <br> Beschreibung: <?php echo $value["beschreibung"]; ?>
                <br> Skills in Projekte: <?php echo $value["skills"]; ?>
                <br>
                <form action="projekt_teilnehmen_hinzufuegen.php" method="post">
                    <input name="proname" value="<?php echo $value["titel"]; ?>" hidden>
                    <button id="teilnehmen" name="add">Teilnehmen</button>
                </form>
                <br>
                <?php
            }
        } else {
            echo 'Es wurden keine zu treffenden Projekte gefunden.';
        }
        ?>
    </div>
</div>
 <?php include_once 'info.php'; ?>   
<!--Inkludieren vom Fussbereich-->
<?php include_once 'footer.php'; ?>