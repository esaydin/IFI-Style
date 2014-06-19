<?php include_once 'header.php'; ?>

<div id="inhalt">
    <div id="InhaltHöhe">
        <h1 class="regtext1">Konto erstellen</h1>
        <p class="textstud">Auf nur einer Seite richten sie in einpaar Schritten Ihr Konto bei</br> 
            SearchProStud ein und erhalten Zugriff auf die Austauschplattform.</p>
        <!-- Formular für Registrierung,verweist auf Registrierungcheck-->
        <form method="post" action="registrierungcheck.php" id="formular">
            <table>
                <tr>
                    <td>
                        <?php
                        $sql = "SELECT * FROM benutzer_typ";
                        //Verbindung zur Datenbank
                        include_once "db_connection.php";
                        $db = new DbConnection();

                        $result = $db->connection($sql);
                        if ($result) {
                            ?>
                            <!--ComboBox für die Auswahl ob Student oder Auftraggeber-->
                            <select id="combo" name="benutzer_typ">
                                <?php
                                foreach ($result as $value) {
                                    ?>
                                    <!--Jeder Benutzer wird je nach ID zu Auftraggeber oder Student in der Datenbank zugeordnet-->
                                    <option value = "<?php echo $value["id"] ?>"><?php echo $value["name"] ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        <?php }
                        ?>
                    </td>
                    <td></td>
                </tr> 
                <tr>
                    <td>
                        <!--EIngabefelder mit Hinweisen für Registrierungsformular mit Vorname, Nachname, Benutzername, Kennwort,
                        Kennwortwdhl, Strasse, Hausnummer, PLZ, Ort und Email
                        Onkeyup-Funktion überprüft bei Eingabe auf regulären Ausdrücke-->
                        <br><input type="text" id="vorname" name="vorname" placeholder="*Vorname" value="" onKeyUp="validate()"/><br><br>
                    </td>
         
                    <td> 
                        <br><input type="text" id="nachname" name="nachname" placeholder="*Nachname" value="" onKeyUp="validate()"/><br><br>
                    </td>
                </tr>
            </table>
            <table id="daten"
                   <tr>
                    <td>
                        <input type="text" id="benutzername" name="benutzername" placeholder="*Benutzername" value="" onKeyUp="validate()"/><br><br>
                    </td>
                   

                </tr>
                <tr>
                    <td>
                        <input type="text" id="email" name="email" placeholder="*Email" value="" onKeyUP="validate()"/><br><br>
                    </td>

                </tr>
                <tr>
                    <td>
                        <input type="password" id="kennwort" name="kennwort" placeholder="*Kennwort" value="" onKeyUp="validate()"/><br /><br />
                    </td>

                </tr>
                <tr>
                    <td>
                        <input type="password" id="kennwortwdhl" name="kennwortwdhl" placeholder="*Kennwort erneut" value="" onKeyUp="validate()"/><br /><br />
                    </td>

                    <td id="passmsg"></td>
                </tr>
                <tr>
                    <td>
                        <input type="text" id="strasse" name="strasse" placeholder=" Strasse" value="" onKeyUp="validate()"/><br /><br />
                    </td>

                </tr>
                <tr>
                    <td>
                        <input type="text" id="hausnr" name="hausnr" placeholder=" Hausnummer" value="" onKeyUp="validate()"/><br /><br />
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="text" id="plz" name="plz" placeholder=" PLZ" value="" onKeyUp="validate()" /><br /><br />
                    </td>

                </tr>
                <tr>
                    <td>
                        <input type="text" id="ort" name="ort" placeholder=" Ort" value="" onKeyUp="validate()"/><br /><br />
                    </td>

                </tr>


                <tr>

                    <!--Button für das Registrieren, bei nicht Erfdüllung der Pflichtfelder ist der Button gesperrt-->
                    <td colspan="2" align="right">
                        <input type="submit" name="registrieren" value="Registrieren" id="registrierung" disabled>
                    </td>
                </tr> <br />
                <br></br>
            </table>
        </form>
    </div>
</div>

<div id="info">
    <div id="InhaltHöhe">
        <p class="zuruckStart" >  <a id="zuruckButton" href="index.php">Zurück zur Startseite</a></p>
    </div>
</div>
<!--Footer mit Angabe von Gruppenname und Datum-->
<?php include_once 'footer.php'; ?>