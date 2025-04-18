<?php
$vue_seances_films = new Vue_seances_filmsDAO($cnx);
$seances = $vue_seances_films->getAllSeance();

if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
    $message_type = $_SESSION['message_type'];
    unset($_SESSION['message']);
    unset($_SESSION['message_type']);

    $alert_class = ($message_type == 'success') ? 'alert-success' : 'alert-danger';
    ?>

    <div class="alert <?php echo $alert_class; ?> alert-dismissible fade show mx-auto mt-4" style="max-width: 600px" role="alert">
        <?php echo $message; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php } ?>
<div class="container">
    <h2 class="my-4">Liste des Séances</h2>
    <?php
    if (!is_null($seances)){
    foreach ($seances as $seance):
        ?>
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
    <?php endforeach; }?>
</div>

