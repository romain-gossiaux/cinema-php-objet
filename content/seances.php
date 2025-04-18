<?php
$seance = new SeanceDAO($cnx);
$seances = $seance->getSeance();

if (is_null($seances)) {
    print "<br>Pas de séances disponibles";
}
else {
    print "Séances disponibles:<br>";
    foreach ($seances as $seance) {
        echo $seance->id_film . " -> " . $seance->date_heure;
    }
}