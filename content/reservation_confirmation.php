<?php
if (!isset($_GET['id'])) {
    echo "<p class='text-light'>Aucune séance spécifiée.</p>";
    exit;
}
$id_seance = (int) $_GET['id'];

$seanceDAO = new Vue_seances_filmsDAO($cnx);
$seance = $seanceDAO->getSeanceById($id_seance);
if (isset($_SESSION['message_type'])) {
    $message_type = $_SESSION['message_type'];
    unset($_SESSION['message_type']);
}
?>

<?php if ($seance and $message_type == 'success'): ?>
    <div class="container my-5">
        <div class="text-center text-light mb-4">
            <h2 class="display-5 text-warning">🎟 Réservation confirmée !</h2>
            <p class="lead">Voici les détails de votre séance :</p>
        </div>

        <div class="card bg-dark text-light mx-auto shadow-lg" style="max-width: 800px; border: 1px solid #ffc107;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="admin/assets/images/<?= $seance->getAffiche() ?>"
                         alt="Affiche du film"
                         class="img-fluid rounded-start"
                         style="height: 100%; object-fit: cover;">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h4 class="card-title text-warning"><?= $seance->getTitre() ?></h4>
                        <p class="card-text mb-1"><strong>Date :</strong> <?= date("d/m/Y à H:i", strtotime($seance->getDateHeure())) ?></p>
                        <p class="card-text"><strong>Durée :</strong> <?= $seance->getDuree() ?> minutes</p>
                        <a href="index_.php?page=accueil.php" class="btn btn-outline-warning mt-3">Retour à l'accueil</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php else: ?>
    <div class="text-center text-light">
        <h2>Séance introuvable.</h2>
        <a href="index_.php?page=accueil.php" class="btn btn-outline-light mt-3">Retour à l'accueil</a>
    </div>
<?php endif; ?>
