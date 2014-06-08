<?php
session_start();
if (empty($_SESSION['id']) || empty($_SESSION['benutzername'])) {
    //header('Location: index.php');
}
#
?>

<style>
    input, select {
        color: #696969;
    }
    td, input {
        font-size: 13px;
        font-family: Verdana,sans-serif;
        font-weight: bold;
    }

</style>

<script>

    function $(obj) {
        return document.getElementById(obj);
    }

    function test(obj, regextyp) {

        /*
         if (obj.name == 'kennwortwdhl') {
         if (document.getElementById('pass1').value != obj.value)
         {
         //obj.value = obj.value.substring(0, obj.value.length - 1);
         obj.style.borderColor = "#FF0000";
         document.getElementById('passmsg').innerHTML = "Passwörter stimmen nicht überein";
         } else {
         obj.style.borderColor = "";
         document.getElementById('passmsg').innerHTML = "";
         }
         if (obj.value.length == 0) {
         obj.style.borderColor = "";
         document.getElementById('passmsg').innerHTML = "";
         }
         return;
         }
         
         var pattern = /^[a-zA-Z]+$/;
         
         switch (regextyp) {
         
         case "alpha":
         pattern = /^[a-zA-ZüÜöÖäÄß]+$/;
         break;
         case "alphaspecial":
         pattern = /^[a-zA-ZüÜöÖäÄß-]+$/;
         break;
         case "alphanumeric":
         pattern = /^[a-zA-Z0-9]+$/;
         break;
         case "alphanumericspecial":
         pattern = /^[a-zA-Z0-9-\*\+]+$/;
         break;
         case "numeric":
         pattern = /^[0-9]+$/;
         break;
         case "hausnr":
         pattern = /^[1-9][0-9]{0,2}[a-zA-Z]{0,2}$/;
         break;
         case "email":
         pattern = /^[a-zA-Z0-9-_]+@[a-zA-Z-]+[.][a-z]+$/;
         break;
         }
         
         
         if (!pattern.test(obj.value)) {
         //obj.value = obj.value.substring(0, obj.value.length - 1);
         obj.style.borderColor = "#FF0000";
         } else {
         obj.style.borderColor = "";
         }
         
         if (obj.value.length == 0) {
         obj.style.borderColor = "";
         }
         */
        validate();

    }


    function validate() {
        var field = {
            "vorname": false,
            "nachname": false,
            "benutzername": false,
            "kennwort": false,
            "kennwortwdhl": false,
            "strasse": true,
            "hausnr": true,
            "plz": true,
            "ort": true,
            "email": false
        };

        //alert("sd: "+ Object.keys(field).length);
        for (var key in field) {

            regextyp = key;
            switch (regextyp) {
                case "vorname":
                case "nachname":
                    pattern = /^[a-zA-Z]+[- ]?[a-zA-Z]+$/;
                    break;
                case "benutzername":
                    pattern = /^[a-zA-Z0-9]+$/;
                    break;
                case "kennwort":
                case "kennwortwdhl":
                    pattern = /^[a-zA-Z0-9]+$/;
                    break;
                case "strasse":
                    pattern = /^$|^[a-zA-ZüÜöÖäÄß]+[- ]?[a-zA-ZüÜöÖäÄß]+$/;
                    break;
                case "hausnr":
                    pattern = /^$|^[1-9][0-9]{0,2}[a-zA-Z]{0,2}$/;
                    break;
                case "plz":
                    pattern = /^$|^[0-9]+$/;
                    break;
                case "ort":
                    pattern = /^$|^[a-zA-ZüÜöÖäÄß]+$/;
                    break;
                case "email":
                    pattern = /^[a-zA-Z0-9-_]+@[a-zA-Z-]+[.][a-z]+$/;
                    break;
            }


            //alert(key + " " + $(key).value);
            if (!pattern.test($(key).value)) {
                field[key] = false;
                $(key).style.borderColor = "#FF0000";
            } else {
                field[key] = true;
                $(key).style.borderColor = "";
            }
        }

        validation = true;
        for (var key in field) {
            if (field[key] == false) {
                validation = false;
            }
        }

        if (validation == true) {
            //alert("ok");
            $('registrierung').removeAttribute("disabled");
            $('registrierung').style.borderColor = "";
        } else {
            //alert("no");
            $('registrierung').setAttribute('disabled', 'disabled');
            $('registrierung').style.borderColor = "#FF0000";
        }



// passwort
        if ($('kennwort').value != $('kennwortwdhl').value)
        {
            $('kennwortwdhl').style.borderColor = "#FF0000";
            $('passmsg').innerHTML = "Passwörter stimmen nicht überein";
        } else {
            $('kennwortwdhl').style.borderColor = "";
            $('passmsg').innerHTML = "";
        }
        if ($('kennwortwdhl').value.length == 0) {
            $('kennwortwdhl').style.borderColor = "";
            $('passmsg').innerHTML = "";
        }

    }

</script>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href="indexCSS.css">
    </head>
    <body>
        <form method="post" action="registrierungcheck.php" id="formular">
            <table>
                <tr>
                    <td>
                        <input type="text" id="vorname" name="vorname" placeholder="*Vorname" value="" onKeyUp="validate()"/><br />
                    </td><td></td>
                </tr>
                <tr>
                    <td>
                        <input type="text" id="nachname" name="nachname" placeholder="*Nachname" value="" onKeyUp="validate()"/><br />
                    </td><td></td>
                </tr>
                <tr>
                    <td>
                        <input type="text" id="benutzername" name="benutzername" placeholder="*Benutzername" value="" onKeyUp="validate()"/><br />
                    </td><td></td>
                </tr>
                <tr>
                    <td>
                        <input type="password" id="kennwort" name="kennwort" placeholder="*Kennwort" value="" onKeyUp="validate()"/><br />
                    </td><td></td>
                </tr>
                <tr>
                    <td>
                        <input type="password" id="kennwortwdhl" name="kennwortwdhl" placeholder="*Kennwort erneut" value="" onKeyUp="validate()"/><br />
                    </td>
                    <td id="passmsg"></td>
                </tr>
                <tr>
                    <td>
                        <input type="text" id="strasse" name="strasse" placeholder=" Strasse" value="" onKeyUp="validate()"/><br />
                    </td><td></td>
                </tr>
                <tr>
                    <td>
                        <input type="text" id="hausnr" name="hausnr" placeholder=" Hausnummer" value="" onKeyUp="validate()"/><br />
                    </td><td></td>
                </tr>
                <tr>
                    <td>
                        <input type="text" id="plz" name="plz" placeholder=" PLZ" value="" onKeyUp="validate()" /><br />
                    </td><td></td>
                </tr>
                <tr>
                    <td>
                        <input type="text" id="ort" name="ort" placeholder=" Ort" value="" onKeyUp="validate()"/>
                    </td><td></td>
                </tr>
                <tr>
                    <td>
                        <input type="text" id="email" name="email" placeholder="*Email" value="" onKeyUP="validate()"/><br />
                    </td><td></td>
                </tr>
                <tr>
                    <td>
                        <?php
                        $sql = "SELECT * FROM benutzer_typ";
                        include_once "db_connection.php";
                        $db = new DbConnection();

                        $result = $db->connection($sql);
                        if ($result) {
                            ?>
                            <select name="benutzer_typ">
                                <?php
                                foreach ($result as $value) {
                                    ?>
                                    <option value = "<?php echo $value["id"] ?>"><?php echo $value["name"] ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        <?php }
                        ?>

                    </td><td></td>
                </tr>
                <tr>
                    <td>

                    </td>
                    <td colspan="2" align="right">
                        <input type="submit" name="registrieren" value="Registrieren" id="registrierung" disabled>
                    </td>
                </tr> <br />
                <tr>
                    <td>

                    </td>
                    <td colspan="2" align="right">
                        <a href="http://localhost/ifiStyleNew/index.php">Zurück zur Startseite</a>
                    </td>
                </tr> <br />

                <br></br>
            </table>
        </form>


        <script>
            validate();
        </script>
    </body>

</html>
