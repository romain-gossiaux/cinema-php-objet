<?php
$film = new FilmDAO($cnx);
$films = $film->getFilm();

if (is_null($films)) {
    print "<br>Pas de films disponibles";
}
else {
    print "Films disponibles:<br>";
    foreach ($films as $film) {
        echo "<img src='./admin/assets/images/" . $film->affiche . "'><br>";
    }
}