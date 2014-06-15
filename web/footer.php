<div id="fussbereich">
    &copy; 2014 SearchProStud
    <?php
    $tage = array("Sonntag", "Montag", "Dienstag", "Mittwoch", "Donnerstag", "Freitag", "Samstag");
    $tag = date("w");
    echo $tage[$tag] . ", " . date("d.m.Y");
    ?>
</div>
</div>
</body>
</html>

