$(document).ready(function () {
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
      open: function (event, ui) {
        // Ajuster la largeur du menu déroulant pour qu'elle corresponde à celle du texte affiché
        var menu = $(".ui-autocomplete");
        var menuItems = menu.find(".ui-menu-item");
  
        var maxWidth = 0;
        menuItems.each(function () {
          var itemWidth = $(this).outerWidth();
          maxWidth = Math.max(maxWidth, itemWidth);
        });
  
        menu.outerWidth(maxWidth);
      },
      focus: function (event, ui) {
        // Ajouter la classe pour la surbrillance en pointeur
        $(".ui-menu-item").removeClass("ui-state-active");
        $(ui.item[0]).addClass("ui-state-active");
      },
      select: function (event, ui) {
        // Supprimer la classe après la sélection pour éviter la surbrillance persistante
        $(".ui-menu-item").removeClass("ui-state-active");
      },
    });
  });
  