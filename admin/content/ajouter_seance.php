<?php
$seance = new SeanceDAO($cnx);
$film = new FilmDAO($cnx);
$films = $film->getFilm();

if (isset($_POST['ajouter_seance'])) {
    $idFilm = $_POST['id_film'];
    $dateHeure = $_POST['date_heure'];

    $id = $seance->addSeance($idFilm, $dateHeure);

    if ($id > 0) {
        $message = "Séance ajoutée avec succès.";
    } else {
        $message = "Erreur: cette séance existe déjà ou les données sont invalides.";
    }
}
?>

<div class="container mt-4">
    <h2>Ajouter une séance</h2>
    <form action="index_.php?page=seances_admin.php" method="post">
        <div class="mb-3">
            <label for="film" class="form-label">Film</label>
            <select class="form-select" id="film" name="id_film" required>
                <option value="" selected disabled>Choisissez un film</option>
                <?php foreach ($films as $film): ?>
                    <option value="<?= $film->id ?>"><?= $film->titre ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="date_heure" class="form-label">Date et heure</label>
            <input type="datetime-local" class="form-control" id="date_heure" name="date_heure" required>
        </div>
        <button type="submit" class="btn btn-warning" name="ajouter_seance">Ajouter la séance</button>
    </form>
</div>
