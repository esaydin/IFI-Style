<!--Klasse zum Erstellen des Footers-->
<div id="fussbereich">
    <p>&copy; 2014 SearchProStud</p>
    
    <?php
    //Funktion für das Datum für die Ausgabe im Fussbereich-->
    $tage = array("Sonntag", "Montag", "Dienstag", "Mittwoch", "Donnerstag", "Freitag", "Samstag");
    $tag = date("w");
    echo $tage[$tag] . ", " . date("d.m.Y");
    ?>
</div>
</div>
</body>
</html>

