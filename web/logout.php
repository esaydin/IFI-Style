<!--Klasse für das Logout, alle Inhalte der Werte wird gelöscht und dadurch ist man ausgeloggt-->
<?php

session_start();

unset($_SESSION['id']);
unset($_SESSION['benutzername']);
header('Location: index.php'); // wie <a href="">linkname</a>
?>

