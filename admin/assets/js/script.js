$(document).ready(function () {
    handleDeleteClick('.delete-seance');
    handleDeleteClick('.delete-reservation');
});

$(function () {
    $('#imdb-datetime').datetimepicker({
        dateFormat: 'yy-mm-dd',
        timeFormat: 'HH:mm',
        stepMinute: 30,
        controlType: 'select',
        showButtonPanel: true
    });
});

$('#form-ajout-seance').on('submit', function(e) {
    const now = new Date();
    now.setSeconds(0, 0);
    const selected = new Date($('#imdb-datetime').val());

    if (selected <= now) {
        e.preventDefault();
        alert("La séance doit être prévue dans le futur.");
    }
});

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
