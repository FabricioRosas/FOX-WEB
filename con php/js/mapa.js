let map;

function initMap() {
    const LatLng = { lat: -12.034662170145047, lng: -77.04546861557782 }
    map = new google.maps.Map(document.getElementById("mapDiv"), {
        center: LatLng,

        zoom: 10,
    });
    new google.maps.Marker({
        position: LatLng,
        map,
        draggable: true,
        title: "Marcador prueba"

    });
}

window.initMap = initMap;