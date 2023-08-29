// Load the calendar
// Attente que le contenu de la page soit entièrement chargé avant d'exécuter le code
document.addEventListener("DOMContentLoaded", function () {
  // Initialisation du plugin de sélection de date (Flatpickr) sur les éléments avec la classe "date-picker"
  flatpickr(".date-picker", {
      // Format de la date qui sera affiché et accepté
      dateFormat: "Y-m-d",
      
      // Définition de la date minimale que les utilisateurs peuvent sélectionner, qui est aujourd'hui
      minDate: "today",
  });
});


