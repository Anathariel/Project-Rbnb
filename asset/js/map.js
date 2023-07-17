const mapElement = document.getElementById("map");
const latitude = mapElement.dataset.latitude;
const longitude = mapElement.dataset.longitude;

function initMap() {
  // Votre code pour créer la carte et le marqueur

  const mapOptions = {
    center: { lat: parseFloat(latitude), lng: parseFloat(longitude) },
    zoom: 15, // Ajustez le niveau de zoom selon vos besoins
  };

  const map = new google.maps.Map(mapElement, mapOptions);
  const marker = new google.maps.Marker({
    position: { lat: parseFloat(latitude), lng: parseFloat(longitude) },
    map: map,
  });
}

window.initMap = initMap;
