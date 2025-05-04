<?php
$vue_seances_films = new Vue_seances_filmsDAO($cnx);
$seances = $vue_seances_films->getAllSeance();
?>

<div class="container mt-4">
    <h2 class="mb-4">Séances disponibles</h2>

    <?php if (!empty($seances)): ?>
        <div class="row g-4">
            <?php foreach ($seances as $seance): ?>
                <div class="col-md-6">
                    <div class="card public-seance-card h-100 shadow">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="admin/assets/images/<?= $seance->getAffiche() ?>" class="img-fluid rounded-start public-seance-img" alt="<?= $seance->getTitre() ?>">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title public-seance-title"><?= $seance->getTitre() ?></h5>
                                    <p class="card-text"><strong>Date :</strong> <?= date("d/m/Y", strtotime($seance->getDateHeure())) ?></p>
                                    <p class="card-text"><strong>Heure :</strong> <?= date("H:i", strtotime($seance->getDateHeure())) ?></p>
                                    <p class="card-text"><strong>Durée :</strong> <?= $seance->getDuree() ?> min</p>
                                    <a href="index_.php?page=reservation_form.php&id=<?= $seance->getIdSeance() ?>" class="btn public-btn-reserver mt-2">Réserver</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <div class="col-4 mx-auto">
            <div class="alert alert-warning text-center" role="alert">
                Aucune séance disponible pour le moment.
            </div>
        </div>
    <?php endif; ?>
</div>

