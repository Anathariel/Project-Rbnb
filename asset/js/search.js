// Attend que le document soit prêt
$(document).ready(function () {
  // Cacher l'élément avec l'ID 'voice' par défaut
  $("#voice").hide();

  // Ajouter la classe "autocomplete-open" au corps de la page lorsque l'autocomplétion est ouverte
  $("#input-search").on("autocompleteopen", function () {
    $("body").addClass("autocomplete-open");
    $("#voice").hide(); // Cacher l'élément avec l'ID 'voice' lors de l'autocomplétion
  });

  // Initialiser l'autocomplétion sur l'élément avec l'ID 'input-search'
  $("#input-search").autocomplete({
    source: function (request, response) {
      $.ajax({
        url: "autocomplete", // URL pour récupérer les suggestions d'autocomplétion depuis le serveur
        dataType: "json",
        data: {
          term: request.term, // Terme de recherche entré par l'utilisateur
        },
        success: function (data) {
          response(data); // Afficher les données de suggestion dans l'autocomplétion
        },
        error: function (xhr, status, error) {
          console.error("Error", status, error);
        },
      });
    },
    minLength: 2, // Nombre minimum de caractères pour déclencher l'autocomplétion
    position: {
      // Ajuster la position de l'autocomplétion pour qu'elle s'affiche sous l'élément de recherche
      my: "left top+5",
      at: "left bottom",
      collision: "none",
    },
    messages: {
      // Laisser les fonctions vides pour désactiver l'affichage des messages par défaut
      noResults: function () {},
      results: function () {},
    },
    focus: function (event, ui) {
      // Ajouter la classe pour la surbrillance du pointeur sur l'élément survolé
      $(".ui-menu-item").removeClass("ui-state-active");
      $(ui.item[0]).addClass("ui-state-active");
    },
    select: function (event, ui) {
      // Soumettre le formulaire de recherche lorsque l'utilisateur sélectionne un élément d'autocomplétion
      $("#search-form").submit();

      // Supprimer la classe après la sélection pour éviter une surbrillance persistante
      $(".ui-menu-item").removeClass("ui-state-active");
    },
  });
});
