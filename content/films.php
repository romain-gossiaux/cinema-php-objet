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
        <?php foreach ($films as $film) { ?>
            <div class="col-md-4">
                <div class="card film-card h-100 shadow">
                    <img src="admin/assets/images/<?=$film->affiche?>" class="card-img-top" alt="<?=$film->affiche?>">
                    <div class="card-body">
                        <h5 class="card-title"><?=$film->titre?></h5>
                        <p class="card-text"><strong>Réalisateur :</strong><?=$film->realisateur?></p>
                        <p class="card-text"><strong>Durée :</strong><?=$film->duree?> min</p>
                        <p class="card-text"><strong>Synopsis :</strong><?=$film->description?></p>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>