<?php
$vue_seances_films = new Vue_seances_filmsDAO($cnx);
$next_seance = $vue_seances_films->getNextSeance();
$films_a_l_affiche = $vue_seances_films->getFilmsALAffiche(3);
?>

<div class="container mt-5">
    <div class="text-center text-light">
        <h1>Bienvenue au Cinéma</h1>
        <p class="lead">Découvrez les derniers films, réservez vos places, vivez une expérience inoubliable.</p>
        <a href="index_.php?page=films.php" class="btn btn-warning btn-lg mt-3">Voir les films</a>
    </div>

    <hr class="my-5">

    <?php if ($films_a_l_affiche): ?>
    <h2 class="text-light mb-4">À l'affiche</h2>
    <div class="row justify-content-center">
        <div id="carouselFilmsAffiche" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner rounded shadow">
                <?php foreach ($films_a_l_affiche as $index => $film): ?>
                    <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
                        <div class="row g-4 align-items-center bg-dark text-white p-4 rounded">
                            <div class="col-md-5 text-center">
                                <img src="admin/assets/images/<?= $film['affiche'] ?>" class="img-fluid rounded shadow" alt="<?= $film['titre'] ?>" id="carousel-img">
                            </div>
                            <div class="col-md-7">
                                <h3 class="text-warning mb-3"><?= $film['titre'] ?></h3>
                                <p><strong>Durée :</strong> <?= $film['duree'] ?> minutes</p>
                                <p><strong>Prochaine séance :</strong> <?= date("d/m/Y à H:i", strtotime($film['date_heure'])) ?></p>
                                <a href="index_.php?page=seances.php" class="btn btn-warning mt-3">Voir les séances</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#carouselFilmsAffiche" data-bs-slide="prev">
                <span class="carousel-control-prev-icon bg-dark rounded-circle p-3" aria-hidden="true"></span>
                <span class="visually-hidden">Précédent</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselFilmsAffiche" data-bs-slide="next">
                <span class="carousel-control-next-icon bg-dark rounded-circle p-3" aria-hidden="true"></span>
                <span class="visually-hidden">Suivant</span>
            </button>
        </div>
    </div>
    <?php endif; ?>
    <hr class="my-5">

    <?php if ($next_seance->getIdSeance() != NULL):?>
        <div class="next-seance-box my-4 p-3 bg-dark text-white rounded shadow">
            <h4 class="mb-3">🎬 Prochaine Séance</h4>
            <div class="d-flex align-items-center">
                <img src="admin/assets/images/<?= $next_seance->getAffiche() ?>" alt="Affiche" class="me-3 next-seance-img">
                <div>
                    <h5 class="next-seance-title"><?= $next_seance->getTitre() ?></h5>
                    <p><strong>Date :</strong> <?= date("d/m/Y à H:i", strtotime($next_seance->getDateHeure())) ?></p>
                    <a href="index_.php?page=seances.php" class="btn btn-warning btn-sm mt-2 next-seance-btn">Voir les séances</a>
                </div>
            </div>
        </div>
    <?php endif; ?>

</div>
