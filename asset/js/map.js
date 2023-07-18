const mapElement = document.getElementById("map");
const latitude = mapElement.dataset.latitude;
const longitude = mapElement.dataset.longitude;

function initMap() {
  const mapOptions = {
    center: { lat: parseFloat(latitude), lng: parseFloat(longitude) },
    zoom: 15,
  };

  const map = new google.maps.Map(mapElement, mapOptions);
  const marker = new google.maps.Marker({
    position: { lat: parseFloat(latitude), lng: parseFloat(longitude) },
    map: map,
  });

  // Ajout du champ d'adresse avec autocomplétion
  const addressInput = document.getElementById('address');
  const autocomplete = new google.maps.places.Autocomplete(addressInput);

  autocomplete.addListener('place_changed', function() {
    const place = autocomplete.getPlace();
    if (!place.geometry) {
      window.alert("Aucun détail disponible pour cette adresse");
      return;
    }

    map.setCenter(place.geometry.location);
    marker.setPosition(place.geometry.location);
  });
}

window.initMap = initMap;
