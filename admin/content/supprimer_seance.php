<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $dao = new SeanceDAO($cnx);

    if ($dao->deleteSeance($id)) {
        $_SESSION['success'] = "La séance a bien été supprimée." . $id;
    } else {
        $_SESSION['error'] = "Erreur lors de la suppression de la séance." . $id;
    }
} else {
    $_SESSION['error'] = "ID de séance invalide.";
}

// Redirection vers la page de gestion
header("Location: index_.php?page=modifier_seance.php");
exit;