$(document).ready(function () {
  // Cacher la voix en bas du site par défaut
  $("#voice").hide();

  // Ajouter la classe "autocomplete-open" au corps de la page lorsque l'autocomplétion est ouverte
  $("#input-search").on("autocompleteopen", function () {
    $("body").addClass("autocomplete-open");
    $("#voice").hide();
  });

  $("#input-search").autocomplete({
    source: function (request, response) {
      $.ajax({
        url: "autocomplete",
        dataType: "json",
        data: {
          term: request.term,
        },
        success: function (data) {
          response(data);
        },
        error: function (xhr, status, error) {
          console.error("Error", status, error);
        },
      });
    },
    minLength: 2,
    position: {
      // Ajuster la position de l'autocomplétion pour qu'elle s'affiche sous l'élément de recherche
      my: "left top+5",
      at: "left bottom",
      collision: "none",
    },
    messages: {
      // Laisser les fonctions vides pour désactiver l'affichage des messages
      noResults: function () {},
      results: function () {},
    },
    focus: function (event, ui) {
      // Ajouter la classe pour la surbrillance en pointeur
      $(".ui-menu-item").removeClass("ui-state-active");
      $(ui.item[0]).addClass("ui-state-active");
    },
    select: function (event, ui) {
      // Soumettre le formulaire de recherche lorsque l'utilisateur sélectionne un élément
      $("#search-form").submit();

      // Supprimer la classe après la sélection pour éviter la surbrillance persistante
      $(".ui-menu-item").removeClass("ui-state-active");
    },
  });
});
