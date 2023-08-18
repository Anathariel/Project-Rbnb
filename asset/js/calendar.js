// Load the calendar
document.addEventListener("DOMContentLoaded", function () {
  flatpickr(".date-picker", {
    dateFormat: "Y-m-d",
    minDate: "today",
  });
});
