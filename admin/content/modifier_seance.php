<?php
$vue_seances_films = new Vue_seances_filmsDAO($cnx);
$seances = $vue_seances_films->getAllSeance();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_seance = $_POST['id_seance'];
    $date_heure = $_POST['date_heure'];
    $success = $vue_seances_films->updateSeance($id_seance, $date_heure);

    if ($success) {
        $_SESSION['message'] = "La séance a bien été modifiée.";
        $_SESSION['message_type'] = "success";
    } else {
        $_SESSION['message'] = "Erreur lors de la modification.";
        $_SESSION['message_type'] = "error";
    }
    header('Location: index_.php?page=modifier_seance.php');
    exit;
}

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
                <button class="btn btn-modifier" onclick="toggleForm(<?= $seance->getIdSeance() ?>)">Modifier</button>
                <a href="index_.php?page=supprimer_seance.php&id=<?= $seance->getIdSeance() ?>"
                   class="btn btn-supprimer delete-seance">
                    Supprimer
                </a>
                <div id="form-<?= $seance->getIdSeance() ?>" class="mt-3" style="display: none;">
                    <form method="post" action="index_.php?page=modifier_seance.php">
                        <input type="hidden" name="id_seance" value="<?= $seance->getIdSeance() ?>">

                        <div class="mb-2">
                            <label class="form-label">Date et heure</label>
                            <input type="datetime-local" class="form-control" name="date_heure"
                                   value="<?= date('Y-m-d\TH:i', strtotime($seance->getDateHeure())) ?>" required>
                        </div>
                        <button type="submit" class="btn btn-warning">Enregistrer</button>
                    </form>
                </div>

            </div>
        </div>
    <?php endforeach; }?>
</div>

