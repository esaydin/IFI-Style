<?php

session_start();
if (empty($_SESSION['id']) || empty($_SESSION['benutzername'])) {
    header('Location: index.php');
}


include_once 'db_connection.php';
$connection = new DbConnection();


?>

<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//print_r($_POST);

$from_add = "nrhn_koc@hotmail.de";

$to_add = "nrhn_koc@hotmail.de"; //<-- put your yahoo/gmail email address here

$subject = "Test Subject";
$message = "Test Message";

$headers = "From: $from_add \r\n";
$headers .= "Reply-To: $from_add \r\n";
$headers .= "Return-Path: $from_add\r\n";
$headers .= "X-Mailer: PHP \r\n";

//consultation:


if (mail($to_add, $subject, $message, $headers)) {
    echo "Gesendet von: " . $_SESSION["email"];
    echo "<br/>";
    echo "Bemerkung: " . $_POST["Bemerkungen"];
    echo "<br/>";
    echo "<br/>";
    $msg = "Mail sent OK";
} else {
    $msg = "Error sending email!";
}
echo $msg;
?>
