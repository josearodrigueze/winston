//Barra lateral de noticias
function noticias() {
    var xhttp, xmlDoc, txt, i;
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            xmlDoc = this.responseXML;
            txt = "";
            a = xmlDoc.getElementsByTagName("CATEGORIA");
            b = xmlDoc.getElementsByTagName("TITULAR");
            c = xmlDoc.getElementsByTagName("FECHA");
            d = xmlDoc.getElementsByTagName("N");
            e = xmlDoc.getElementsByTagName("POR");

            for (i = 0; i < a.length; i++) {
                txt = txt + "Categoria: " + a[i].childNodes[0].nodeValue + "<br>";
                txt = txt + b[i].childNodes[0].nodeValue + "<br>";
                txt = txt + c[i].childNodes[0].nodeValue + "<br><hr>";
                txt = txt + d[i].childNodes[0].nodeValue + "<br>";
                txt = txt + e[i].childNodes[0].nodeValue + "<hr>";

            }
            document.getElementById("XmlOutput").innerHTML = txt;
        }
    };
    xhttp.open("GET", "noticias.xml", true);
    xhttp.send();
}

//suma presupuestos
function resultado() {
    var secciones = 0;
    var kinds = parseInt(document.getElementById('kinds').value)
    var plazo = parseInt(document.getElementById('plazo').value)
    $("#secciones:checked").each(function (i, n) {
        secciones += parseInt($(n).val());
    })

    if (plazo >= 4) {
        porcentaje = (2 / 10)
    } else {
        porcentaje = plazo * (5 / 100);
    }


    subtotal = kinds + secciones
    descuento = subtotal * porcentaje
    result = subtotal - descuento

    if ($('#plazo').val() == '') {
        document.getElementById("result").innerHTML = subtotal + '€';
        document.getElementById("subtotal").innerHTML = subtotal + '€';
    } else {
        document.getElementById("subtotal").innerHTML = subtotal + '€';
        document.getElementById("result").innerHTML = result + '€';
    }
}


