$("#projects").on('click', () => {

    $.getJSON("php/proyectos/list.php")
        .done(function (data, textStatus, jqXHR) {
            var html = "";
            data.forEach((project, index) => {
                if (index % 3 === 0) {
                    html += '<div class="row">';
                }

                console.log(project.titulo);

                html += '<div class="col-md-3">' +
                    '   <h3>Titulo: ' + project.titulo + '</h3>' +
                    '   <img src="">' +
                    '   <p>Descripción: </p>' +
                    ' </div>';

                if (index % 3 === 0) {
                    html += '</div>';
                }
            });

            $("#project-list").html(html);

        })
});


/*
//llamada a presupuestos
$('#navbarsupportedcontent ul').on('click', 'li  > a', (e) => {
    var clickedNavElm = e.target.id;
    appNavigation.forEach((item) => {
        var navElm = $('#' + item);
        if (item === clickedNavElm) {
            $('#contenedor').load(item + '.html');
            navElm.addClass('active');
            return;
        }
        navElm.removeClass('active');
    });
});
*/