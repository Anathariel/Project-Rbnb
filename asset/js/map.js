// Récupère l'élément HTML où la carte sera affichée
const mapElement = document.getElementById("map");

// Récupère les coordonnées (latitude et longitude) à partir des attributs "data" de l'élément
const latitude = mapElement.dataset.latitude;
const longitude = mapElement.dataset.longitude;

// Fonction d'initialisation de la carte
function initMap() {
  // Options de la carte
  const mapOptions = {
    center: { lat: parseFloat(latitude), lng: parseFloat(longitude) },
    zoom: 15,
  };

  // Crée une nouvelle instance de Google Map avec les options spécifiées
  const map = new google.maps.Map(mapElement, mapOptions);

  // Ajoute un marqueur à la position spécifiée sur la carte
  const marker = new google.maps.Marker({
    position: { lat: parseFloat(latitude), lng: parseFloat(longitude) },
    map: map,
  });

  // Ajout du champ d'adresse avec autocomplétion
  const addressInput = document.getElementById('address');
  const autocomplete = new google.maps.places.Autocomplete(addressInput);

  // Ajoute un écouteur d'événement pour gérer le changement d'emplacement sélectionné par l'autocomplétion
  autocomplete.addListener('place_changed', function() {
    const place = autocomplete.getPlace();
    if (!place.geometry) {
      window.alert("Aucun détail disponible pour cette adresse");
      return;
    }

    // Recentre la carte sur le nouvel emplacement sélectionné
    map.setCenter(place.geometry.location);

    // Déplace le marqueur vers le nouvel emplacement sélectionné
    marker.setPosition(place.geometry.location);
  });
}

// Attache la fonction d'initialisation à la fenêtre pour que Google Maps puisse l'appeler
window.initMap = initMap;
