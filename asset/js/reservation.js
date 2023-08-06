// Fonction pour vérifier si une date est disponible ou non
function checkAvailability() {
  const arrivalDate = document.getElementById("arrivalDate").value;
  const departureDate = document.getElementById("departureDate").value;

  // Envoyer une requête AJAX pour vérifier si la date est disponible
  const xhr = new XMLHttpRequest();
  xhr.open("GET", "/check-availability?date=" + arrivalDate);
  xhr.onload = function () {
    if (xhr.status === 200) {
      const isAvailable = JSON.parse(xhr.responseText);
      if (!isAvailable) {
        alert(
          "La date sélectionnée n'est pas disponible. Veuillez sélectionner une autre date."
        );
      }
    }
  };
  xhr.send();
}

// Écouter les changements de la date d'arrivée
document
  .getElementById("arrivalDate")
  .addEventListener("change", checkAvailability);

// Fonction pour mettre à jour les prix en fonction de la date d'arrivée, de la date de départ et du nombre de voyageurs
function updatePrices() {
  const pricePerNight = parseFloat(
    document.getElementById("pricePerNight").innerText
  );

  const showPriceDetails = document.querySelector(".price-details");
  showPriceDetails.style.display = "none";

  const arrivalDate = new Date(document.getElementById("arrivalDate").value);
  const departureDate = new Date(
    document.getElementById("departureDate").value
  );
  const numberOfDays = Math.ceil(
    (departureDate - arrivalDate) / (1000 * 60 * 60 * 24)
  );

  if (numberOfDays > 0) {
    showPriceDetails.style.display = "flex";
  }

  document.getElementById("nb-day").innerText =
    numberOfDays + " nuit" + (numberOfDays > 1 ? "s" : "");

  const totalPrice = pricePerNight * numberOfDays;
  const serviceFee = totalPrice * 0.05; // Calcul des frais de service (5% du total)
  const taxes = totalPrice * 0.01; // Calcul des taxes (1% du total)
  const totalPriceWithFees = totalPrice + serviceFee + taxes;

  // Mettre à jour les prix et le total affichés
  document.getElementById("totalPrice").innerText = totalPrice.toFixed(2) + "€";
  document.getElementById("serviceFee").innerText = serviceFee.toFixed(2) + "€";
  document.getElementById("taxes").innerText = taxes.toFixed(2) + "€";
  document.getElementById("totalPriceWithFees").innerText =
    totalPriceWithFees.toFixed(2) + "€";

  // Update hidden input fields
  const startDateInput = document.getElementById("startDateInput");
  const endDateInput = document.getElementById("endDateInput");
  const numTravelersInput = document.getElementById("numTravelersInput");
  const totalPriceInput = document.getElementById("totalPriceInput");
  const selectedNumTravelers = document.getElementById("traveler-select").value;

  startDateInput.value = arrivalDate.toISOString().slice(0, 10);
  endDateInput.value = departureDate.toISOString().slice(0, 10);

  // Mettre à jour le champ de saisie caché avec le nombre de voyageurs sélectionné
  numTravelersInput.value = selectedNumTravelers;

  totalPriceInput.value = totalPriceWithFees.toFixed(2);
}

// Écouter les changements de la date d'arrivée et de la date de départ
document.getElementById("arrivalDate").addEventListener("change", updatePrices);
document
  .getElementById("departureDate")
  .addEventListener("change", updatePrices);

// Écouter le changement du nombre de voyageurs sélectionné
document
  .getElementById("traveler-select")
  .addEventListener("change", updatePrices);

// Appeler la fonction updatePrices une première fois pour afficher les prix initiaux
updatePrices();

// Appeler la fonction updateTravelerOptions une première fois pour afficher les options de voyageur initiales
updateTravelerOptions();
