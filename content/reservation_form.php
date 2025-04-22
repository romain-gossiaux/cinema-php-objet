<?php
$id_seance = $_GET['id'] ?? null;

if (!$id_seance) {
    echo "<div class='alert alert-danger'>ID séance manquant.</div>";
    exit;
}
$vue_seances_films = new Vue_seances_filmsDAO($cnx);
$seance = $vue_seances_films->getSeanceById($id_seance);
?>

<div class="container my-5 text-light">
    <div class="card bg-dark text-light mx-auto shadow-lg" style="max-width: 900px; border: 1px solid #ffc107;">
        <div class="row g-0">
            <!-- Affiche du film -->
            <div class="col-md-4">
                <img src="admin/assets/images/<?= htmlspecialchars($seance->getAffiche()) ?>"
                     alt="Affiche du film"
                     class="img-fluid rounded-start"
                     style="height: 100%; object-fit: cover;">
            </div>

            <!-- Détails et formulaire -->
            <div class="col-md-8">
                <div class="card-body">
                    <h3 class="card-title text-warning mb-3">🎟 Réserver pour <span class="text-light"><?= $seance->getTitre() ?></span></h3>
                    <p class="card-text"><strong>📅 Date :</strong> <?= date("d/m/Y à H:i", strtotime($seance->getDateHeure())) ?></p>
                    <p class="card-text"><strong>⏱ Durée :</strong> <?= $seance->getDuree() ?> min</p>

                    <!-- Formulaire -->
                    <form action="index_.php?page=reservation_traitement.php" method="post" class="mt-4">
                        <input type="hidden" name="id_seance" value="<?= $id_seance ?>">

                        <div class="mb-3">
                            <label for="nom" class="form-label">Nom</label>
                            <input type="text" name="nom" id="nom" class="form-control bg-dark text-light border-secondary" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Adresse e-mail</label>
                            <input type="email" name="email" id="email" class="form-control bg-dark text-light border-secondary" required>
                        </div>

                        <button type="submit" class="btn btn-warning w-100 mt-3">✅ Réserver ma place</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

