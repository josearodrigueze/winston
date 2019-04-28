//llamada automatica pagina de inicio
$('#inicio').ready(function () {
    $('#contenedor').load('inicio.html #init');
})
//llamada a pagina de mapa y contacto
$('#contact').on('click', function () {
    $('#contenedor').load('contact.html');
    $('#contact').addClass('active');
    $('#budget').removeClass('active');
    $('#dropdown').removeClass('active');
})
//llamada a presupuestos
$('#budget').on('click', function () {
    $('#contenedor').load('psupuestos.html #budget');
    $('#budget').addClass('active');
    $('#contact').removeClass('active');
    $('#dropdown').removeClass('active');
});

//llamada a pagina galeria
function portfolio() {
    $('#contenedor').load('pfolio.html #pfolio');
    $('#dropdown').addClass('active');
    $('#contact').removeClass('active');
    $('#budget').removeClass('active');
}

//llamada a pagina de contacto
function contact() {
    $('#contenedor').load('contact.html');
    $('#contact').addClass('active');
    $('#budget').removeClass('active');
    $('#dropdown').removeClass('active');
}

//llamada a pagina de presupuestos
function budgets() {
    $('#contenedor').load('psupuestos.html #budget');
    $('#budget').addClass('active');
    $('#contact').removeClass('active');
    $('#dropdown').removeClass('active');
}

//llamada a presupuestos
var appNavigation = ['projects', 'news', 'customers', 'users', 'profile', 'appointment', 'dropdown'];
/*
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