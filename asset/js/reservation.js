document.addEventListener("DOMContentLoaded", function () {
  flatpickr("#arrivalDateDisplay", {
      mode: "range",
      dateFormat: "Y-m-d",
      altFormat: "d M Y",
      minDate: "today",
      onChange: function(selectedDates, dateStr, instance) {
          if (selectedDates.length == 2) {
              // Set the visible inputs
              document.querySelector("#arrivalDateDisplay").value = flatpickr.formatDate(selectedDates[0], instance.config.altFormat);
              document.querySelector("#departureDateDisplay").value = flatpickr.formatDate(selectedDates[1], instance.config.altFormat);
              document.querySelector("#arrivalDate").value = flatpickr.formatDate(selectedDates[0], instance.config.dateFormat);
              document.querySelector("#departureDate").value = flatpickr.formatDate(selectedDates[1], instance.config.dateFormat);
              
              // Call the updatePrices function after setting input values
              updatePrices();
          }
      }
  });

  // Function to check if a date is available
  function isDateAvailable(date) {
    // Implement your logic to check date availability here
    return true;
  }

  // Function to calculate and update the prices
  function updatePrices() {
    const pricePerNightElem = document.getElementById("pricePerNight");
    const nbDayElem = document.getElementById("nb-day");
    const totalPriceElem = document.getElementById("totalPrice");
    const serviceFeeElem = document.getElementById("serviceFee");
    const taxesElem = document.getElementById("taxes");
    const totalPriceWithFeesElem = document.getElementById("totalPriceWithFees");
    const calculatedTotalElem = document.getElementById("calculatedTotal");

    if (!pricePerNightElem || !nbDayElem || !totalPriceElem || !serviceFeeElem || !taxesElem || !totalPriceWithFeesElem || !calculatedTotalElem) {
      return;
    }

    const pricePerNight = parseFloat(pricePerNightElem.innerText);
    const arrivalDate = new Date(document.getElementById("arrivalDate").value);
    const departureDate = new Date(document.getElementById("departureDate").value);
    const numberOfDays = Math.ceil((departureDate - arrivalDate) / (1000 * 60 * 60 * 24));
    const numTravelers = parseInt(document.getElementById("traveler-select").value);

    // Calculate prices and fees
    const totalBasePrice = pricePerNight * numberOfDays;
    const serviceFee = totalBasePrice * 0.05; // 5% service fee
    const taxes = totalBasePrice * 0.02; // 2% taxes
    const totalPriceWithFees = totalBasePrice + serviceFee + taxes;
    const totalForDays = pricePerNight * numberOfDays;
    calculatedTotalElem.innerText = totalForDays.toFixed(2) + "€";

    // Update the price elements
    nbDayElem.innerText = numberOfDays + " nuit" + (numberOfDays > 1 ? "s" : "");
    serviceFeeElem.innerText = serviceFee.toFixed(2) + "€";
    taxesElem.innerText = taxes.toFixed(2) + "€";
    totalPriceElem.innerText = totalBasePrice.toFixed(2) + "€";
    totalPriceWithFeesElem.innerText = totalPriceWithFees.toFixed(2) + "€";
    

    // Update hidden form fields for submission
    document.getElementById("startDateInput").value = arrivalDate.toISOString();
    document.getElementById("endDateInput").value = departureDate.toISOString();
    document.getElementById("numTravelersInput").value = numTravelers;
    document.getElementById("totalPriceInput").value = totalPriceWithFees.toFixed(2);
  }

  // Event listeners
  const travelerSelectElem = document.getElementById("traveler-select");
  if (travelerSelectElem) {
      travelerSelectElem.addEventListener("change", updatePrices);
  }

  // Function to update the visibility of the price details box
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

  // Initialize the prices and traveler options on page load
  updatePrices();
  updatePriceDetailsVisibility();
  // updateTravelerOptions(); // Uncomment this if you've defined this function elsewhere
});