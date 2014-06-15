<?php

session_start();

unset($_SESSION['id']);
unset($_SESSION['benutzername']);
header('Location: index.php'); // wie <a href="">linkname</a>
?>

