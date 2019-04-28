//comprobacion en tiempo real de nombre
$('#name').on('focus', function () {
    if ($('#name').val() == '') { $('#rqname').addClass('text-danger h2').removeClass('h1') }

})
$('#name').on('keyup', function (name1) {
    nombre = document.getElementById('name')
    if (nombre.value.match(/[a-zA-Z]$/)) { $('#rqname').addClass('checked').removeClass('text-danger') }
    else { $('#rqname').addClass('text-danger h2').removeClass('h1 checked') }
})
//comprobacion en tiempo real de apellido
$('#apellido').on('focus', function () {
    if ($('#apellido').val() == '') { $('#rqsur').addClass('text-danger h2').removeClass('h1') }

})
$('#apellido').on('keyup', function () {
    apellido = document.getElementById('apellido')
    if (apellido.value.match(/[a-zA-Z]$/)) { $('#rqsur').addClass('checked').removeClass('text-danger') }
    else { $('#rqsur').addClass('text-danger h2').removeClass('h1 checked') }
})
//comprobacion en tiempo real de telefono
$('#movil').on('focus', function () {
    if ($('#movil').val() == '') { $('#rqtlf').addClass('text-danger h2').removeClass('h1') }
})
$('#movil').on('input', function () {

    tlf = document.getElementById('movil')
    format = /^(6|7)[0-9]{8}$/
    if (tlf.value.match(format)) {
        $('#rqtlf').addClass('checked').removeClass('text-danger')
        return true;
    }
    else {
        $('#rqtlf').addClass('text-danger h2').removeClass('h1 checked')
        return false;
    }
})
//comprobacion en tiempo real de correo
$('#mail').on('focus', function () {
    if ($('#mail').val() == '') { $('#rqmail').addClass('text-danger h2').removeClass('h1') }
})
$('#mail').on('keyup', function () {
    correo = document.getElementById('mail')
    format = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
    if (correo.value.match(format)) { $('#rqmail').addClass('checked').removeClass('text-danger h2') }
    else { $('#rqmail').addClass('text-danger h2').removeClass('h1 checked') }
})
//comprobacion en tiempo real de fecha

$('#fecha').on('focus', function () {
    if ($('#fecha').val() == '') { $('#rqdate').addClass('text-danger h2').removeClass('h1') }
})
$('#fecha').on('keyup', function () {
    date = document.getElementById('fecha')
    pattern = /^([0-3][0-9])*[/]+([0-1][0-9])*[/]([2][0][0-9]{2})$/
    if (date.value.match(pattern)) { $('#rqdate').addClass('checked').removeClass('text-danger h2') }
    else { $('#rqdate').addClass('text-danger h2').removeClass('h1 checked') }
})


//comprobacion en tiempo real de text area

$('#txtarea').on('focus', function () {
    if ($('#txtarea').val() == '') { $('#rqreasons').addClass('text-danger h2').removeClass('h1') }

})
$('#txtarea').on('keyup', function () {
    reasons = document.getElementById('txtarea')
    if (reasons.value.match(/[\\.,;:_a-z_A-Z0-9]{100}$/)) { $('#rqreasons').addClass('checked').removeClass('text-danger') }
    else { $('#rqreasons').addClass('text-danger h2').removeClass('h1 checked') }
})

//comprobacion antes de envio

$('#enviar').on('click', function () {
    if ($('#rqname').hasClass('checked') && $('#rqsur').hasClass('checked') && $('#rqtlf').hasClass('checked') && $('#rqmail').hasClass('checked') && $('#rqdate').hasClass('checked') && $('#rqreasons').hasClass('checked')) { alert('Formulario correcto, sus datos seran enviados'); return true; }
    else { alert('Rellene todos los campos'); return false; }
})

                            //comprobacion presupuestos
//comprobar nombre
function pcheck() {
    $('#name').on('keyup', function (name1) {
        nombre = document.getElementById('name')
        if (nombre.value.match(/[a-zA-Z]$/)) { $('#rqname').addClass('checked').removeClass('text-danger') }
        else { $('#rqname').addClass('text-danger h2').removeClass('h1 checked') }
    })
    //comprobar apellido
    $('#apellido').on('keyup', function () {
        apellido = document.getElementById('apellido')
        if (apellido.value.match(/[a-zA-Z]$/)) { $('#rqsur').addClass('checked').removeClass('text-danger') }
        else { $('#rqsur').addClass('text-danger h2').removeClass('h1 checked') }
    })
    //comprobar movil
    $('#movil').on('input', function () {

        tlf = document.getElementById('movil')
        format = /^(6|7)[0-9]{8}$/
        if (tlf.value.match(format)) {
            $('#rqtlf').addClass('checked').removeClass('text-danger')
            return true;
        }
        else {
            $('#rqtlf').addClass('text-danger h2').removeClass('h1 checked')
            return false;
        }
    })
    //comprobar mail
    $('#mail').on('keyup', function () {
        correo = document.getElementById('mail')
        format = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
        if (correo.value.match(format)) { $('#rqmail').addClass('checked').removeClass('text-danger h2') }
        else { $('#rqmail').addClass('text-danger h2').removeClass('h1 checked') }
    })
    //comprobar tipo de pagina
    $('#kinds').on('input', function () {
        var kinds = parseInt(document.getElementById('kinds').value)
        if (kinds != 0) { $('#rqpage').addClass('checked').removeClass('text-danger h2') }
        else { $('#rqpage').addClass('text-danger h2').removeClass('h1 checked') }
    })
    //comprobar plazo
    $('#plazo').on('keyup', function () {
        if ($('#plazo').val() == '') { $('#rqplazo').addClass('text-danger h2').removeClass('h1 checked') }
        else { $('#rqplazo').addClass('checked').removeClass('text-danger h2') }
    })
    //comprobar secciones
    var secciones = 0;
    $("#secciones:checked").each(function (i, n) {
        secciones += parseInt($(n).val());
    })
    if (secciones == 0) { $('#rqsecciones').addClass('text-danger h2').removeClass('h1 checked') }
    else { $('#rqsecciones').addClass('checked').removeClass('text-danger h2') }

    

}
//comprobar antes de enviar
function sendcheck() {
    if ($('#rqname').hasClass('checked') && $('#rqsur').hasClass('checked') && $('#rqtlf').hasClass('checked') 
    && $('#rqmail').hasClass('checked') && $('#rqpage').hasClass('checked') && $('#rqplazo').hasClass('checked') 
    && $('#rqsecciones').hasClass('checked')) 
    { alert('Formulario correcto, sus datos seran enviados'); return true; }
    else { alert('Rellene todos los campos'); return false; }
}