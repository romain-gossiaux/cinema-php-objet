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

<div class="imdb-form-container">
    <h2 class="imdb-form-title">Ajouter une séance</h2>
    <form action="index_.php?page=ajouter_seance.php" method="post" class="imdb-form" id="form-ajout-seance">
        <div class="form-group">
            <label for="film">🎬 Film</label>
            <select id="film" name="id_film" required>
                <option value="" selected disabled>Choisissez un film</option>
                <?php foreach ($films as $film): ?>
                    <option value="<?= $film->id ?>"><?= $film->titre ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group imdb-datetime-wrapper">
            <label for="imdb-datetime">📅 Date et heure</label>
            <input type="text" id="imdb-datetime" class="imdb-datetime" name="date_heure" required>
        </div>

        <button type="submit" class="btn-submit" name="ajouter_seance">➕ Ajouter la séance</button>
    </form>
</div>
