<?php include_once 'header.php'; ?>

            <div id="inhalt">
                <!-- Formular für Registrierung,verweist auf Registrierungcheck-->
                <form method="post" action="registrierungcheck.php" id="formular">
                    <table>
                        <td>
                            <!--EIngabefelder mit Hinweisen für Registrierungsformular mit Vorname, Nachname, Benutzername, Kennwort,
                            Kennwortwdhl, Strasse, Hausnummer, PLZ, Ort und Email
                            Onkeyup-Funktion überprüfut bei Eingabe auf regulären Ausdrücke-->
                            <input type="text" id="vorname" name="vorname" placeholder="*Vorname" value="" onKeyUp="validate()"/><br /> 
                        </td><td id="hinweis">Zeichenkette darf nur Buchstaben und Umlaute enthalten.</td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" id="nachname" name="nachname" placeholder="*Nachname" value="" onKeyUp="validate()"/><br />
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" id="benutzername" name="benutzername" placeholder="*Benutzername" value="" onKeyUp="validate()"/><br />
                            </td>
                            <td id="hinweis">Zeichenkette darf nur Buchstaben und Ziffern enthalten</td>
                        </tr>
                        <tr>
                            <td>
                                <input type="password" id="kennwort" name="kennwort" placeholder="*Kennwort" value="" onKeyUp="validate()"/><br />
                            </td>
                            <td id="hinweis">Zeichenkette darf nur Buchstaben und Ziffern enthalten</td>
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
                            </td>
                            <td id="hinweis">Zeichenkette darf nur Buchstaben,Umlaute und Sonderzeichen(-| ) enthalten</td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" id="hausnr" name="hausnr" placeholder=" Hausnummer" value="" onKeyUp="validate()"/><br />
                            </td><td id="hinweis">Zeichenkette darf nur Ziffern und Buchstaben enthalten</td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" id="plz" name="plz" placeholder=" PLZ" value="" onKeyUp="validate()" /><br />
                            </td><td id="hinweis">Zeichenkette darf nur Ziffern enthalten</td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" id="ort" name="ort" placeholder=" Ort" value="" onKeyUp="validate()"/>
                            </td><td id="hinweis">Zeichenkette darf nur Buchstaben enthalten</td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" id="email" name="email" placeholder="*Email" value="" onKeyUP="validate()"/><br />
                            </td><td id="hinweis">Zeichenkette darf nur Buchstaben, Ziffern, Bindestrich (-) und Unterstrich (_) enthalten</td>
                        </tr>
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

                            </td><td></td>
                        </tr>
                        <tr>
                            <td>

                            </td>
                            <!--Button für das Registrieren, bei nicht Erfdüllung der Pflichtfelder ist der Button gesperrt-->
                            <td colspan="2" align="right">
                                <input type="submit" name="registrieren" value="Registrieren" id="registrierung" disabled>
                            </td>
                        </tr> <br />
                        <tr>
                            <td>

                            </td>
                            <!--Link zur Startseite-->
                            <td colspan="2" align="right">
                                <a href="http://localhost/IFI-Style/web/index.php">Zurück zur Startseite</a>
                            </td>
                        </tr> <br />

                        <br></br>
                    </table>
                </form>
            </div>
            <div id="info">
            </div>
            <!--Footer mit Angabe von Gruppenname und Datum-->
          <?php include_once 'footer.php'; ?>