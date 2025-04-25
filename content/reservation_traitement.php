<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_seance = $_POST['id_seance'];
    $nom = trim($_POST['nom']);
    $email = trim($_POST['email']);

    if ($id_seance && $nom && $email) {
        $reservation = new ReservationDAO($cnx);
        $result = $reservation->addReservation($nom, $email, $id_seance);

        $_SESSION['message_type'] = $result != -1 ? "success" : "error";
    } else {
        $_SESSION['message_type'] = "error";
    }

    header("Location: index_.php?page=reservation_confirmation.php&id=$id_seance");
    exit;
}
