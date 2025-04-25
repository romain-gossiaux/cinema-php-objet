<?php
$reservation = new ReservationDAO($cnx);
$reservations = $reservation->getReservations();

$vue_seances_filmsDAO = new Vue_seances_filmsDAO($cnx);

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

<div class="container my-5 text-light">
    <h2 class="text-center mb-4">Gestion des Réservations</h2>
    <div class="row">
        <?php if ($reservations): ?>
            <?php foreach ($reservations as $reservation):
                $seance = $vue_seances_filmsDAO->getSeanceById($reservation->id_seance); ?>
                <div class="col-md-4 mb-4">
                    <div class="card text-light reservation-card" data-id-seance="<?=$reservation->id_seance?>">
                        <div class="card-body">
                            <h5 class="card-title text-warning"><?= $seance->getTitre() ?></h5>
                            <p class="card-text">
                                <strong>Nom :</strong> <?= $reservation->nom ?><br>
                                <strong>Email :</strong> <?= $reservation->email ?><br>
                                <strong>Séance :</strong> <?= date("d/m/Y à H:i", strtotime($seance->getDateHeure())) ?>
                            </p>
                            <div class="reservation-poster-container">
                                <img src="" alt="Affiche du film" class="reservation-poster">
                            </div>
                            <a href="index_.php?page=reservation_supprimer.php&id=<?= $reservation->id ?>" class="btn btn-danger delete-reservation">
                                Supprimer
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="col-12">
                <div class="alert alert-warning text-center" role="alert">
                    Aucune réservation trouvée.
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>
<div id="dialog-confirm" title="Confirmation" style="display: none;">
    <p>Voulez-vous vraiment supprimer cette réservation ?</p>
</div>




