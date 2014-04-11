
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Formular</title>
        <link rel="stylesheet" type="text/css" href="indexCSS.css">
    </head>
    <body>
             <form method="post" action="logincheck.php">
                <table id="tabelleLogin">
                    <tr>
                        <td><input type="text" name="login" placeholder="benutzername" value="" /></td>
                    </tr> 
                    <tr>
                        <td><input type="password" name="kennwort" placeholder="kennwort" value="" /></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="right" id="anmelden">
                            <input type="submit" name="anmelden" value="Anmelden">
                        </td>
                    </tr>
                   
                    <tr>
                        <td colspan="2" align="right" id="registrieren">
                            <a href="registrieren.php">Neu Registrieren</a>
                        </td>
                        <td>

                        </td>
                    </tr>
                </table>
            </form>
    </body>
</html>
