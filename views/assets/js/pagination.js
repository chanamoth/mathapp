document.addEventListener('DOMContentLoaded', function () {
    let currentPage = 1;
    const perPage = 10;

    // Función para cargar combinaciones
    function loadCombinations(page) {
        $.ajax({
            url: 'controllers/home.controller.php',
            type: 'POST',
            data: {
                action: 'ajax',
                page: page,
                perPage: perPage,
                numRows: $('#numRows').val() // Este valor debe ser el número de filas ingresado por el usuario
            },
            beforeSend: function () {
                // Mostrar loader si es necesario
                $('#loader').show();
            },
            success: function (data) {
                $('#combinations-container').html(data);
                currentPage = page;
            },
            complete: function () {
                $('#loader').hide();
            }
        });
    }

    // Llamada inicial para cargar combinaciones
    loadCombinations(currentPage);

    // Scroll infinito
    $(window).scroll(function () {
        if ($(window).scrollTop() + $(window).height() >= $(document).height() - 10) {
            currentPage++;
            loadCombinations(currentPage);
        }
    });
});
