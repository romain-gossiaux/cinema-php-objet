function toggleForm(id) {
    const $form = $('#form-' + id);
    $form.toggle();
}

function handleDeleteClick(className) {
    $(className).on('click', function (e) {
        e.preventDefault();
        const url = $(this).attr('href');

        $("#dialog-confirm").dialog({
            resizable: false,
            modal: true,
            draggable: false,
            buttons: [
                {
                    text: "🗑️ Supprimer",
                    class: "btn-confirm",
                    click: function () {
                        window.location.href = url;
                    }
                },
                {
                    text: "❌ Annuler",
                    class: "btn-cancel",
                    click: function () {
                        $(this).dialog("close");
                    }
                }
            ]
        });
    });
}

$(document).ready(function () {
    handleDeleteClick('.delete-seance');
    handleDeleteClick('.delete-reservation');
});
