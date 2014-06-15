<?php
//Klasse zur Herstellung der Verbindung zur Datenbank
class DbConnection {

    public function connection($sql) {
        $link = mysqli_connect("localhost", "root", "", "hsverwaltung");

        $result = $link->query($sql);
        if ($result) {

            if (is_bool($result)) {
                return true;
            }

            $resultarray = array();
            while ($row = mysqli_fetch_assoc($result)) {
                $resultarray[] = $row;
            }

            if (empty($resultarray)) {
                return false;
            } else {
                return $resultarray;
            }
        } else {
            return false;
        }
    }

}
