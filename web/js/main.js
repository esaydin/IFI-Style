function $(obj) {
    return document.getElementById(obj);
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
                pattern = /^[a-zA-ZüÜöÖäÄß]+[- ]?[a-zA-ZüÜöÖäÄß]+$/;
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
        $('registrierung').setAttribute('disabled', 'disabled');
        $('registrierung').style.borderColor = "#FF0000";
    }
    if ($('kennwort').value == $('kennwortwdhl').value && validation)
    {
        $('kennwortwdhl').style.borderColor = "";
        $('passmsg').innerHTML = "";
        $('registrierung').removeAttribute("disabled");
        $('registrierung').style.borderColor = "";
    }
    if ($('kennwortwdhl').value.length == 0 && $('kennwort').value == 0) {
        $('kennwortwdhl').style.borderColor = "";
        $('passmsg').innerHTML = "";
        $('registrierung').setAttribute('disabled', 'disabled');
        $('registrierung').style.borderColor = "#FF0000";
    }



}


							//Javascript für das Datum und Uhrzeit
						
								//Funktion für die Monate
								function gMon() {
 									this[0] = 'Januar';
 									this[1] = 'Februar';
  									this[2] = 'März';
  									this[3] = 'April';
 									this[4] = 'Mai';
 									this[5] = 'Juni';
									this[6] = 'Juli';
  									this[7] = 'August';
  									this[8] = 'September';
									this[9] = 'Oktober';
 									this[10] = 'November';
  									this[11] = 'Dezember';
								}
								//FUnktion für die Tage
								var monNames = new gMon();
								var dayNames = new Array('Sonntag', 'Montag', 'Dienstag', 'Mittwoch', 'Donnerstag', 'Freitag', 'Samstag');
								function t4(y) {
  									return(y < 1000?  y + 1900:y);
								}
								//Funktion für die Stunden und Minuten
 								var now = new Date();
 								var Stunden = now.getHours();
								var Minuten = now.getMinutes();
								var NachVoll = ((Minuten < 10) ? ":0" : ":");
						
								//Ausgabe für den Text
								document.write('Heute ist ', dayNames[now.getDay()]);
 								document.write(', der ', now.getDate());
  								document.write('. ', monNames[now.getMonth()]);
 								document.write(' ', t4(now.getYear()));
 								document.write(".Wir haben  " + Stunden + NachVoll + Minuten + " Uhr<\/b>");
 							
 							



