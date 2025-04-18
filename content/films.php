<?php
$film = new FilmDAO($cnx);
$liste = $film->getFilm();

if (is_null($liste)) {
    print "<br>Pas de films disponibles";
}
else {
    print "Films disponibles:<br>";
    foreach ($liste as $film) {
        echo "<img src='./admin/assets/images/" . $film->affiche . "'><br>";
    }
}