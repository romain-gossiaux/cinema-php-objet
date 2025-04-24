<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    var_dump($id);
    $seance = new SeanceDAO($cnx);
    if ($seance->deleteSeance($id)) {
        $_SESSION['message'] = "La séance a été supprimée avec succès.";
        $_SESSION['message_type'] = "success"; // Succès
    } else {
        $_SESSION['message'] = "Une erreur est survenue lors de la suppression.";
        $_SESSION['message_type'] = "error"; // Erreur
    }
} else {
    $_SESSION['message'] = "ID de séance manquant.";
    $_SESSION['message_type'] = "error";
}


// Redirection vers la page de gestion
header("Location: index_.php?page=modifier_seance.php");
exit;