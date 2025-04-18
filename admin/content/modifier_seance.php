<?php
$vue_seances_films = new Vue_seances_filmsDAO($cnx);
$seances = $vue_seances_films->getAllSeance();
?>
<div class="container">
    <h2 class="my-4">Liste des Séances</h2>
    <?php foreach ($seances as $seance): ?>
        <div class="seance-card">
            <div class="d-flex align-items-center">
                <img src="assets/images/<?= $seance->getAffiche() ?>" alt="Affiche">
                <div class="seance-info">
                    <h5><?= $seance->getTitre() ?></h5>
                    <p><strong>Durée :</strong> <?= $seance->getDuree() ?> min</p>
                    <p><strong>Séance :</strong> <?= date("d/m/Y H:i", strtotime($seance->getDateHeure())) ?></p>
                </div>
            </div>
            <div class="d-flex flex-column gap-2">
                <a href="index_.php?page=modifier_seance_form.php&id=<?= $seance->getIdSeance() ?>" class="btn btn-modifier">Modifier</a>
                <a href="index_.php?page=supprimer_seance.php&id=<?= $seance->getIdSeance() ?>"
                   class="btn btn-supprimer"
                   onclick="return confirm('Confirmer la suppression de cette séance ?');">
                    Supprimer
                </a>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<?php if (isset($_SESSION['success'])): ?>
    <div class="alert alert-success"><?= $_SESSION['success']; unset($_SESSION['success']); ?></div>
<?php endif; ?>

<?php if (isset($_SESSION['error'])): ?>
    <div class="alert alert-danger"><?= $_SESSION['error']; unset($_SESSION['error']); ?></div>
<?php endif; ?>

