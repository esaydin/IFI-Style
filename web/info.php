<div id="info">
       <div id="InhaltArt">

    <?php               
    //Textausgabe, je nach eingeloggter Benutzer
    echo "<br>Eingeloggt als: " . $_SESSION["vorname"] . " " . $_SESSION["nachname"] . " >> ";
    //Link zum Logout
    echo "<a href=\"logout.php\">Abmelden</a>";
    ?>
           <div id="kalender">
    <?PHP 
  $strBuildMonth = '<table><tr>'; 

  // Tag der Woche 0 (fuer Sonntag) - 6 (fuer Samstag) 
  $iDayOfWeek = date ( 'w', mktime ( 0, 0, 0, date ( 'n' ), 1, 
                       date ( 'Y' ) ) ); 

  if ( !$iDayOfWeek ) 
  { 
    // Woche beginnt mit Montag, deshalb Sonntag 
    // Wochentag 7 statt 0 zuweisen. 
    $iDayOfWeek = 7; 
  } 

  // Tabellenkopf der Monatsansicht. Zum Beispiel: 
  // 
  //   April 
  // M D M D F S S 
  // 
  $strBuildMonth .= '<table style="border: 2px solid #bcbcbc; background' . 
                    '-color: #fff;"><tr><td colspan="7" style="text-' . 
                    'align: center;">' . date ( 'F', mktime ( 0, 0, 0, 
                    date ( 'n' ), 1, date ( 'Y' ) ) ) . '</td></tr><tr>' . 
                    '<td>M</td><td>D</td><td>M</td><td>D</td><td>F</td>' . 
                    '<td>S</td><td>S</td></tr><tr>'; 

  $iLimit = date ( 't', mktime ( 0, 0, 0, date ( 'n' ), 1, 
                   date ( 'Y' ) ) ); 

  for ( $i = 1; $i <= ( $iLimit + $iDayOfWeek - 1 ); $i++ ) 
  { 
    $iDayOfMonth = $i - $iDayOfWeek + 1; 

    if ( $i < $iDayOfWeek ) 
    { 
      // Leerzellen schreiben, bis Monatsanfang 
      // auf den richtigen Tag der Woche fällt. 
      $strBuildMonth .= '<td>&nbsp;</td>'; 
    }  
    elseif ( $iDayOfMonth == date ( 'd' ) ) 
    { 
      // Heutigen Tag, hervorheben. 
      $strBuildMonth .= '<td style="background-color: #889fca; ' . 
                        'font-weight: bold;">' . $iDayOfMonth . '</td>'; 
    } 
    else 
    { 
      $strBuildMonth .= '<td>' . $iDayOfMonth . '</td>'; 
    } 

    if ( !( $i % 7 ) ) 
    { 
      // Am Ende eines jeden 7. Durchlaufs die Tabelle umbrechen. 
      $strBuildMonth .= '</tr><tr>'; 
    } 
  } 

  $strBuildMonth .= '</tr></table>'; 

  // Anwendungsbeispiel 
  print ( $strBuildMonth ); 
?>
               </div>
           
      </div></div>