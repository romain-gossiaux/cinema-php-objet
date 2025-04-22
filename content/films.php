<?php
$film = new FilmDAO($cnx);
$films = $film->getFilm();
?>

<div class="container mt-4">
    <h2 class="mb-4">Films disponibles</h2>
    <div class="row g-4">
        <?php foreach ($films as $film): ?>
            <div class="col-md-4">
                <div class="card film-card h-100 shadow">
                    <img src="admin/assets/images/<?= $film->affiche ?>" class="card-img-top" alt="<?= $film->titre ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?= $film->titre ?></h5>
                        <p class="card-text"><strong>Réalisateur :</strong> <?= $film->realisateur ?></p>
                        <p class="card-text"><strong>Durée :</strong> <?= $film->duree ?> min</p>
                        <p class="card-text"><strong>Synopsis :</strong> <?= $film->description ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>