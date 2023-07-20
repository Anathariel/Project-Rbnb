// Function to update prices and total based on number of travelers
function updatePrices() {
  var pricePerNight = parseFloat(
    document.getElementById("pricePerNight").innerText
  );
  var travelerSelect = document.getElementById("traveler-select");
  var selectedTravelers = parseInt(
    travelerSelect.options[travelerSelect.selectedIndex].value
  );

  var totalPrice = pricePerNight * selectedTravelers;
  var serviceFee = totalPrice * 0.05; // Calcul des frais de service (5% du total)
  var taxes = totalPrice * 0.01; // Calcul des taxes (1% du total)
  var totalPriceWithFees = totalPrice + serviceFee + taxes;

  // Mettre à jour les prix et le total affichés
  document.getElementById("travelers").innerHTML =
    selectedTravelers + " " + (selectedTravelers == 1 ? "voyageur" : "voyageurs");
  document.getElementById("totalPrice").innerText = totalPrice.toFixed(2) + "€";
  document.getElementById("serviceFee").innerText = serviceFee.toFixed(2) + "€";
  document.getElementById("taxes").innerText = taxes.toFixed(2) + "€";
  document.getElementById("totalPriceWithFees").innerText =
    totalPriceWithFees.toFixed(2) + "€";
}

// Écouter les changements du nombre de voyageurs
document
  .getElementById("traveler-select")
  .addEventListener("change", updatePrices);

// Appeler la fonction une première fois pour afficher les prix initiaux
updatePrices();
