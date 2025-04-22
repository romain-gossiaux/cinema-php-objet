<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $reservation = new ReservationDAO($cnx);
}
if ($reservation->deleteReservation($id)) {
    $_SESSION['message'] = "La réservation a été supprimée avec succès.";
    $_SESSION['message_type'] = "success"; // Succès
} else {
    $_SESSION['message'] = "Une erreur est survenue lors de la suppression.";
    $_SESSION['message_type'] = "error"; // Erreur
}

// Redirection vers la page de gestion
header("Location: index_.php?page=reservations.php");
exit;