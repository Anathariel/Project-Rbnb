$(document).ready(function () {
  // Gestionnaire d'événements pour le formulaire de favoris
  $(".favorite-form").on("submit", function (e) {
    e.preventDefault();
    var form = $(this);
    var propertyId = form.find("input[name='propertyId']").val();

    if (form.hasClass("favorite-active")) {
      // Suppression de la propriété des favoris
      $.ajax({
        url: "/projet/project-rbnb/account/favorite/delete", // Mettez l'URL correcte pour la suppression
        type: "POST",
        data: {
          propertyId: propertyId,
          method: "DELETE",
        },
        success: function (data) {
          var heartImg = $("#heart-img-" + propertyId);
          heartImg.attr(
            "src",
            "/projet/project-rbnb/asset/media/icons/heart.svg"
          );
          form.removeClass("favorite-active");
        },
        error: function () {
          // Traitement en cas d'erreur
        },
      });
    } else {
      // Ajout de la propriété aux favoris
      $.ajax({
        url: form.attr("action"),
        type: "POST",
        data: form.serialize(),
        success: function (data) {
          var heartImg = $("#heart-img-" + propertyId);
          heartImg.attr(
            "src",
            "/projet/project-rbnb/asset/media/icons/heart-solid.svg"
          );
          form.addClass("favorite-active");
        },
        error: function () {
          // Traitement en cas d'erreur
        },
      });
    }
  });

  // Gestionnaire d'événements pour le clic sur le bouton de favori
  $(".favorite-form button").on("click", function (e) {
    e.preventDefault();
    $(this).closest(".favorite-form").submit();
  });
});
