function toggleForm(id) {
    const $form = $('#form-' + id);
    $form.toggle();
}

$(document).ready(function () {
    // Fonction générique de confirmation de suppression
    function attachDeleteHandler(selector, message) {
        $(selector).on('click', function (e) {
            e.preventDefault(); // Empêche le lien de rediriger immédiatement

            const url = $(this).attr('href');
            const confirmDelete = confirm(message);

            if (confirmDelete) {
                console.log(`Suppression confirmée pour : ${url}`);
                window.location.href = url;
            }
        });
    }

    // Appliquer la fonction à différents boutons
    attachDeleteHandler('.delete-seance', 'Confirmer la suppression de cette séance ?');
    attachDeleteHandler('.delete-reservation', 'Confirmer la suppression de cette réservation ?');
});
