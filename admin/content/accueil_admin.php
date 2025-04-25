<?php
$filmDAO = new FilmDAO($cnx);
$seanceDAO = new SeanceDAO($cnx);
$reservationDAO = new ReservationDAO($cnx)
?>
<div class="admin-dashboard-bg">
<div class="container py-5">
    <h1 class="admin-dashboard-title text-center mb-4">Bonjour <?= $_SESSION['admin'] ?> 👋</h1>
    <p class="text-center admin-dashboard-subtitle">Bienvenue sur le panneau d'administration du cinéma</p>

    <div class="row text-center my-5">
        <div class="col-md-4">
            <div class="card admin-dashboard-card">
                <div class="card-body">
                    <h5 class="admin-dashboard-card-title">🎬 Films</h5>
                    <p class="card-text"><?= $filmDAO->countAll() ?> films enregistrés</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card admin-dashboard-card">
                <div class="card-body">
                    <h5 class="admin-dashboard-card-title">🕒 Séances</h5>
                    <p class="card-text"><?= $seanceDAO->countAll() ?> à venir</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card admin-dashboard-card">
                <div class="card-body">
                    <h5 class="admin-dashboard-card-title">📅 Réservations</h5>
                    <p class="card-text"><?= $reservationDAO->countAll() ?> au total</p>
                </div>
            </div>
        </div>
    </div>

    <div class="text-center mb-5">
        <a href="index_.php?page=ajouter_seance.php" class="btn admin-dashboard-btn me-2">Ajouter une Séance</a>
        <a href="index_.php?page=modifier_seance.php" class="btn admin-dashboard-btn me-2">Gérer les séances</a>
        <a href="index_.php?page=reservations.php" class="btn admin-dashboard-btn me-2">Gérer les Réservations</a>
    </div>
</div>