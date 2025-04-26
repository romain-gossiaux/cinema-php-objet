<?php
$film = new FilmDAO($cnx);
$films = $film->getFilms();
?>

<div class="container mt-4">
    <h2 class="mb-3">Films disponibles</h2>
    <div class="col-4 mb-5">
        <input type="text" id="search-film" class="form-control" placeholder="Rechercher un film...">
    </div>
    <div class="row g-4" id="films-list">
    </div>
</div>