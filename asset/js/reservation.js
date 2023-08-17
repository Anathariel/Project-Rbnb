document.addEventListener("DOMContentLoaded", function () {
  // Check Availability
  function checkAvailability() {
    const arrivalDateElem = document.getElementById("arrivalDate");
    if (!arrivalDateElem) return;

    const arrivalDate = arrivalDateElem.value;
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
    });

    flatpickr(departureDateInput, {
      dateFormat: "Y-m-d", // Ajustez le format selon vos besoins
      minDate: "today", // Empêche la sélection de dates passées
      locale: "fr", // Utilisez le format français
      onChange: function (selectedDates) {
        updatePrices(); // Mettez à jour les prix lorsque la date de départ change
      },
    });
  }

  // Update Prices
  function updatePrices() {
    const pricePerNightElem = document.getElementById("pricePerNight");
    if (!pricePerNightElem) return;

    const pricePerNight = parseFloat(pricePerNightElem.innerText);
    const showPriceDetails = document.querySelector(".price-details");
    if (!showPriceDetails) return;

    showPriceDetails.style.display = "none";
    const arrivalDateElem = document.getElementById("arrivalDate");
    const departureDateElem = document.getElementById("departureDate");
    if (!arrivalDateElem || !departureDateElem) return;

    const arrivalDate = new Date(arrivalDateElem.value);
    const departureDate = new Date(departureDateElem.value);
    const numberOfDays = Math.ceil(
      (departureDate - arrivalDate) / (1000 * 60 * 60 * 24)
    );

    if (numberOfDays > 0) {
      showPriceDetails.style.display = "flex";
    }

    const nbDayElem = document.getElementById("nb-day");
    if (nbDayElem) {
      nbDayElem.innerText =
        numberOfDays + " nuit" + (numberOfDays > 1 ? "s" : "");
    }

    // ... Continue with the rest of your function here
  }

  // Event listeners
  const arrivalDateElem = document.getElementById("arrivalDate");
  const departureDateElem = document.getElementById("departureDate");
  const travelerSelectElem = document.getElementById("traveler-select");

  if (arrivalDateElem) {
    arrivalDateElem.addEventListener("change", checkAvailability);
    arrivalDateElem.addEventListener("change", updatePrices);
  }

  if (departureDateElem) {
    departureDateElem.addEventListener("change", updatePrices);
  }

  if (travelerSelectElem) {
    travelerSelectElem.addEventListener("change", updatePrices);
  }

  // Initialize the prices and traveler options on load
  updatePrices();
  // updateTravelerOptions(); // You can uncomment this if you've defined this function elsewhere
});
