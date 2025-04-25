<?php
// Titre par défaut
$title = "Cinéma 2025";

// Initialisation de la page courante (accueil par défaut)
if (!isset($_SESSION['page'])) {
    $_SESSION['page'] = "accueil.php";
}
if (isset($_GET['page'])) {
    $_SESSION['page'] = $_GET['page'];
}

// Gestion des titres + SEO selon la page
switch ($_SESSION['page']) {
    case "accueil.php":
        $title = "Accueil - Cinéma 2025";
        break;
    case "accueil_admin.php":
        $title = "Tableau de bord - Cinéma 2025";
        break;
    case "films.php":
        $title = "Nos Films - Cinéma 2025";
        break;
    case "seances.php":
        $title = "Nos séances - Cinéma 2025";
        break;
    case "ajouter_seance.php":
        $title = "Ajout séances - Cinéma 2025";
        break;
    case "modifier_seance.php":
        $title = "Gestion séances - Cinéma 2025";
        break;
    case "reservations.php":
        $title = "Gestion réservations - Cinéma 2025";
        break;
}

// Vérifier que la page existe
if (!file_exists('content/' . $_SESSION['page'])) {
    $_SESSION['page'] = 'page404.php';
    $title = "Page introuvable - Cinéma 2025";
}
?>

