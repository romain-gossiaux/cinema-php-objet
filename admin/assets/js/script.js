function toggleForm(id) {
    const $form = $('#form-' + id);
    $form.toggle();
}

$(document).ready(function() {
    // Quand le document est entièrement chargé...
    $('.delete-seance').on('click', function(e) {
        e.preventDefault(); // Empêche le comportement par défaut du lien (qui est de rediriger)

        const url = $(this).attr('href'); // Récupère l'URL du lien
        const confirmDelete = confirm('Confirmer la suppression de cette séance ?'); // Affiche une boîte de confirmation

        if (confirmDelete) {
            console.log(url);
            window.location.href = url; // Si l'utilisateur confirme, on redirige vers l'URL (c'est-à-dire supprimer la séance)
        }
    });
});
