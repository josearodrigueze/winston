//mapa donde estamos
function map1() {
    //mapa centrado en el negocio
    var palma = { lat: 39.5764255, lng: 2.6688058 };
    var mapa = new google.maps.Map(document.getElementById('mapa'), {
        zoom: 15,
        center: palma
    });
    var marker = new google.maps.Marker({ position: palma, map: mapa });
    //calcular ubicacion
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function (position) {
            initialLocation = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);

        });
    } else {
        window.alert('Tu Navegador no soporta la Geolocalizacion. ');
    }

    //iniciar servicio directions
    var directionsService = new google.maps.DirectionsService;
    var directionsDisplay = new google.maps.DirectionsRenderer;
    //calcular ruta
    directionsDisplay.setMap(mapa);
    $('#start').on('click', function () {
        calculateAndDisplayRoute(directionsService, directionsDisplay);
    })
     function calculateAndDisplayRoute(directionsService, directionsDisplay) {
        directionsService.route({
            origin: initialLocation,
            destination: palma,
            travelMode: 'DRIVING'
        }, function (response, status) {
            if (status === 'OK') {
                directionsDisplay.setDirections(response);
            } else {
                window.alert('Directions request failed due to ' + status);
            }
        });
    }
}
