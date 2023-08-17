document.addEventListener("DOMContentLoaded", function () {
  // Initialiser Flatpickr pour les sélecteurs de date d'arrivée et de départ
  const arrivalDateInput = document.getElementById("arrivalDate");
  const departureDateInput = document.getElementById("departureDate");

  if (arrivalDateInput && departureDateInput) {
    flatpickr(arrivalDateInput, {
      dateFormat: "Y-m-d", // Ajustez le format selon vos besoins
      minDate: "today", // Empêche la sélection de dates passées
      locale: "fr", // Utilisez le format français
      onChange: function (selectedDates) {
        updatePrices(); // Mettez à jour les prix lorsque la date d'arrivée change
      },
      disable: [
        function (date) {
          return !isDateAvailable(date);
        },
      ],
    });

    flatpickr(departureDateInput, {
      dateFormat: "Y-m-d", // Ajustez le format selon vos besoins
      minDate: "today", // Empêche la sélection de dates passées
      locale: "fr", // Utilisez le format français
      onChange: function (selectedDates) {
        updatePrices(); // Mettez à jour les prix lorsque la date de départ change
      },
      disable: [
        function (date) {
          return !isDateAvailable(date);
        },
      ],
    });
  }

  // Fonction pour vérifier si une date est disponible
  function isDateAvailable(date) {
    // Mettez en place votre logique pour vérifier la disponibilité des dates ici
    // Vous pourriez avoir besoin de récupérer l'ID de la propriété et d'utiliser la fonction reservationModel.isDateAvailableModel
    // Exemple : return reservationModel.isDateAvailableModel(idPropriete, date.toISOString());
    return true; // Remplacez par votre logique
  }

  // Fonction pour calculer et mettre à jour les prix
  function updatePrices() {
    const pricePerNightElem = document.getElementById("pricePerNight");
    const nbDayElem = document.getElementById("nb-day");
    const totalPriceElem = document.getElementById("totalPrice");
    const serviceFeeElem = document.getElementById("serviceFee");
    const taxesElem = document.getElementById("taxes");
    const totalPriceWithFeesElem =
      document.getElementById("totalPriceWithFees");

    if (
      !pricePerNightElem ||
      !nbDayElem ||
      !totalPriceElem ||
      !serviceFeeElem ||
      !taxesElem ||
      !totalPriceWithFeesElem
    ) {
      return;
    }

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

    // Calculer les prix et les frais
    const totalBasePrice = pricePerNight * numberOfDays;
    const serviceFee = totalBasePrice * 0.05; // Frais de service Loca'r (5%)
    const taxes = totalBasePrice * 0.02; // Taxes (2%)
    const totalPriceWithFees = totalBasePrice + serviceFee + taxes;

    // Mettre à jour les éléments de prix
    nbDayElem.innerText =
      numberOfDays + " nuit" + (numberOfDays > 1 ? "s" : "");
    serviceFeeElem.innerText = serviceFee.toFixed(2) + "€";
    taxesElem.innerText = taxes.toFixed(2) + "€";
    totalPriceElem.innerText = totalBasePrice.toFixed(2) + "€";
    totalPriceWithFeesElem.innerText = totalPriceWithFees.toFixed(2) + "€";

    // Mise à jour des champs de formulaire cachés pour la soumission
    document.getElementById("startDateInput").value = arrivalDate.toISOString();
    document.getElementById("endDateInput").value = departureDate.toISOString();
    document.getElementById("numTravelersInput").value = numTravelers;
    document.getElementById("totalPriceInput").value =
      totalPriceWithFees.toFixed(2);
  }

  // Event listeners
  const arrivalDateElem = document.getElementById("arrivalDate");
  const departureDateElem = document.getElementById("departureDate");
  const travelerSelectElem = document.getElementById("traveler-select");

  // Attacher la fonction updatePrices aux modifications du sélecteur de dates
  if (arrivalDateElem) {
    arrivalDateElem.addEventListener("change", updatePrices);
  }

  if (departureDateElem) {
    departureDateElem.addEventListener("change", updatePrices);
  }

  if (travelerSelectElem) {
    travelerSelectElem.addEventListener("change", updatePrices);
  }

  // Fonction pour mettre à jour l'affichage de la boîte de prix
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

  // Initialize the prices and traveler options on load
  updatePrices();
  updatePriceDetailsVisibility();
  // updateTravelerOptions(); // You can uncomment this if you've defined this function elsewhere
});
