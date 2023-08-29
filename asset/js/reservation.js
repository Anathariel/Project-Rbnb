// Attend que le DOM soit prêt
document.addEventListener("DOMContentLoaded", function () {
  // Récupère les dates déjà réservées depuis l'attribut 'data-reserved-dates'
  var bookedDatesString = document
    .querySelector(".container-calendar-traveler")
    .getAttribute("data-reserved-dates");
  var unavailableDates = bookedDatesString.split(",");

  // Récupère également les dates déjà réservées en tant que tableau
  var bookedDatesString = document
    .querySelector(".container-calendar-traveler")
    .getAttribute("data-reserved-dates");
  var bookedDates = bookedDatesString.split(",");

  // Initialise le sélecteur de dates avec la bibliothèque flatpickr
  flatpickr("#arrivalDateDisplay", {
    mode: "range", // Permet de sélectionner une plage de dates
    dateFormat: "Y-m-d", // Format de date pour le backend
    altFormat: "d M Y", // Format de date pour l'affichage
    minDate: "today", // Empêche de sélectionner des dates antérieures à aujourd'hui
    disable: unavailableDates, // Désactive les dates déjà réservées
    onChange: function (selectedDates, dateStr, instance) {
      if (selectedDates.length == 2) {
        // Met à jour les champs d'entrée visibles avec les dates sélectionnées
        document.querySelector("#arrivalDateDisplay").value =
          flatpickr.formatDate(selectedDates[0], instance.config.altFormat);
        document.querySelector("#departureDateDisplay").value =
          flatpickr.formatDate(selectedDates[1], instance.config.altFormat);
        document.querySelector("#arrivalDate").value = flatpickr.formatDate(
          selectedDates[0],
          instance.config.dateFormat
        );
        document.querySelector("#departureDate").value = flatpickr.formatDate(
          selectedDates[1],
          instance.config.dateFormat
        );

        // Appelle la fonction updatePrices après avoir défini les valeurs d'entrée
        updatePrices();

        // Affiche les éléments div de détails de prix
        document.querySelector(".price-details").style.display = "flex";
        document.querySelector(".total-price").style.display = "flex";
      } else {
        // Si les dates ne sont pas valides, garde les éléments div masqués
        document.querySelector(".price-details").style.display = "none";
        document.querySelector(".total-price").style.display = "none";
      }
    },
  });

  // Fonction pour calculer et mettre à jour les prix
  function updatePrices() {
    // Récupère les éléments HTML nécessaires
    const pricePerNightElem = document.getElementById("pricePerNight");
    const nbDayElem = document.getElementById("nb-day");
    const totalPriceElem = document.getElementById("totalPrice");
    const serviceFeeElem = document.getElementById("serviceFee");
    const taxesElem = document.getElementById("taxes");
    const totalPriceWithFeesElem =
      document.getElementById("totalPriceWithFees");
    const calculatedTotalElem = document.getElementById("calculatedTotal");

    // Sort de la fonction si certains éléments n'existent pas
    if (
      !pricePerNightElem ||
      !nbDayElem ||
      !totalPriceElem ||
      !serviceFeeElem ||
      !taxesElem ||
      !totalPriceWithFeesElem ||
      !calculatedTotalElem
    ) {
      return;
    }

    // Convertit les données textuelles en nombres pour les calculs
    const pricePerNight = parseFloat(pricePerNightElem.innerText);
    const arrivalDate = new Date(document.getElementById("arrivalDate").value);
    const departureDate = new Date(
      document.getElementById("departureDate").value
    );
    const numberOfDays = Math.ceil(
      (departureDate - arrivalDate) / (1000 * 60 * 60 * 24)
    );
    const numTravelers = parseInt(
      document.getElementById("traveler-select").value
    );

    // Calcule les prix et frais
    const totalBasePrice = pricePerNight * numberOfDays;
    const serviceFee = totalBasePrice * 0.05; // Frais de service de 5%
    const taxes = totalBasePrice * 0.02; // Taxes de 2%
    const totalPriceWithFees = totalBasePrice + serviceFee + taxes;
    const totalForDays = pricePerNight * numberOfDays;

    // Met à jour les éléments d'affichage des prix
    calculatedTotalElem.innerText = totalForDays.toFixed(2) + "€";
    nbDayElem.innerText =
      numberOfDays + " nuit" + (numberOfDays > 1 ? "s" : "");
    serviceFeeElem.innerText = serviceFee.toFixed(2) + "€";
    taxesElem.innerText = taxes.toFixed(2) + "€";
    totalPriceElem.innerText = totalBasePrice.toFixed(2) + "€";
    totalPriceWithFeesElem.innerText = totalPriceWithFees.toFixed(2) + "€";

    // Met à jour les champs de formulaire cachés pour la soumission
    document.getElementById("startDateInput").value = arrivalDate.toISOString();
    document.getElementById("endDateInput").value = departureDate.toISOString();
    document.getElementById("numTravelersInput").value = numTravelers;
    document.getElementById("totalPriceInput").value =
      totalPriceWithFees.toFixed(2);
  }

  // Initialise les prix et les options de voyageurs au chargement
  updatePrices();
  updatePriceDetailsVisibility();
});

// Fonction pour mettre à jour la visibilité de la boîte de détails de prix
function updatePriceDetailsVisibility() {
  const arrivalDate = document.getElementById("arrivalDate").value;
  const departureDate = document.getElementById("departureDate").value;
  const numberOfDays = parseInt(document.getElementById("nb-day").innerText);
  const priceDetailsElem = document.querySelector(".price-details");

  if ((!arrivalDate || !departureDate) && numberOfDays === 0) {
    priceDetailsElem.classList.add("hidden");
  } else {
    priceDetailsElem.classList.remove("hidden");
  }
}
