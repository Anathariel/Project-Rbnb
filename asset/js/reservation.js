// Function to update prices and total based on dates
function updatePrices() {
  var pricePerNight = parseFloat(
    document.getElementById("pricePerNight").innerText
  );

  var showPriceDetails = document.querySelector(".price-details");
  showPriceDetails.style.display = "none";

  var arrivalDate = new Date(document.getElementById("arrivalDate").value);
  var departureDate = new Date(document.getElementById("departureDate").value);
  var numberOfDays = Math.ceil(
    (departureDate - arrivalDate) / (1000 * 60 * 60 * 24)
  );

  if (numberOfDays > 0) {
    showPriceDetails.style.display = "flex";
  }

  document.getElementById("nb-day").innerText =
numberOfDays + " nuit" + (numberOfDays > 1 ? "s" : "");

  var totalPrice = pricePerNight * numberOfDays;
  var serviceFee = totalPrice * 0.05; // Calcul des frais de service (5% du total)
  var taxes = totalPrice * 0.01; // Calcul des taxes (1% du total)
  var totalPriceWithFees = totalPrice + serviceFee + taxes;

  // Mettre à jour les prix et le total affichés
  document.getElementById("totalPrice").innerText = totalPrice.toFixed(2) + "€";
  document.getElementById("serviceFee").innerText = serviceFee.toFixed(2) + "€";
  document.getElementById("taxes").innerText = taxes.toFixed(2) + "€";
  document.getElementById("totalPriceWithFees").innerText =
    totalPriceWithFees.toFixed(2) + "€";
}

// Function to update maximum number of travelers in the select options
function updateTravelerOptions() {
  var maxGuests = parseInt(document.getElementById("maxGuests").innerText);

  var travelerSelect = document.getElementById("traveler-select");
  travelerSelect.innerHTML = "";

  for (var i = 1; i <= maxGuests; i++) {
    var option = document.createElement("option");
    option.value = i + " Voyageur";
    option.text = i + " Voyageur" + (i > 1 ? "s" : "");
    travelerSelect.add(option);
  }
}

// Écouter les changements de la date d'arrivée et de la date de départ
document.getElementById("arrivalDate").addEventListener("change", updatePrices);
document
  .getElementById("departureDate")
  .addEventListener("change", updatePrices);

// Appeler la fonction updatePrices une première fois pour afficher les prix initiaux
updatePrices();

// Appeler la fonction updateTravelerOptions une première fois pour afficher les options de voyageur initiales
updateTravelerOptions();
