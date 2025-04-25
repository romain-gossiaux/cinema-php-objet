$(document).ready(function () {
    handleDeleteClick('.delete-seance');
    handleDeleteClick('.delete-reservation');
});

$('#form-ajout-seance').on('submit', function(e) {
    const now = new Date();
    now.setSeconds(0, 0);
    const selected = new Date($('#imdb-datetime').val());

    if (selected <= now) {
        e.preventDefault();
        $("#dialog-error").dialog({
            resizable: false,
            modal: true,
            draggable: false,
            buttons: [
                {
                    text: "OK",
                    class: "btn-cancel",
                    click: function () {
                        $(this).dialog("close");
                    }
                }
                ]
        });
    }
});

$('.reservation-card').hover(
    function () {
        const card = $(this);
        const idSeance = card.data('id-seance');
        const reservationPosterContainer = card.find('.reservation-poster-container');

        $.ajax({
            url: 'src/php/ajax/ajax_get_poster.php',
            type: 'GET',
            dataType: 'json',
            data: { id_seance: idSeance },
            success: function (data) {
                reservationPosterContainer.find('img').attr('src', 'assets/images/' + data);
                reservationPosterContainer.stop(true, true).fadeIn(200);
            },
            error: function () {
                console.log('Erreur AJAX récupération affiche');
            }
        });
    },
    function () {
        const container = $(this).find('.reservation-poster-container').stop(true, true).fadeOut(200);
    }
);

$(function () {
    $('#imdb-datetime').datetimepicker({
        dateFormat: 'yy-mm-dd',
        timeFormat: 'HH:mm',
        stepMinute: 30,
        controlType: 'select',
        showButtonPanel: true
    });
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
