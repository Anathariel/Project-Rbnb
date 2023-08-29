$(document).ready(function () {
  let isNotificationShowing = false; // Variable pour suivre si une notification est déjà affichée

  // Fonction pour afficher une notification
  function showNotification(message) {
    if (isNotificationShowing) {
      return; // Si une notification est déjà en cours d'affichage, ne pas en afficher une autre
    }

    isNotificationShowing = true;

    // Crée un élément <div> pour la notification et ajoute la classe 'notification-container'
    const notificationContainer = $("<div></div>")
      .addClass("notification-container")
      .text(message);
    
    // Ajoute la notification à la fin du <body> de la page
    $("body").append(notificationContainer);

    // Au bout de 1500 millisecondes (1.5 secondes), supprime la notification
    setTimeout(function () {
      notificationContainer.remove();
      isNotificationShowing = false; // La notification est maintenant masquée
    }, 1500);
  }

  // Lorsque le formulaire avec la classe 'favorite-form' est soumis
  $(".favorite-form").on("submit", function (e) {
    e.preventDefault(); // Empêche le comportement de soumission par défaut du formulaire
    let form = $(this); // Récupère le formulaire soumis
    let propertyId = form.find("input[name='propertyId']").val(); // Récupère l'ID de la propriété

    if (form.hasClass("favorite-active")) {
      // Si la propriété est déjà dans la liste des favoris, la supprime
      $.ajax({
        // Requête AJAX pour supprimer la propriété des favoris
        url: "/projet/project-rbnb/account/favorite/delete",
        type: "POST",
        data: {
          propertyId: propertyId,
          method: "DELETE",
        },
        success: function (data) {
          // En cas de succès
          let heartImg = $("#heart-img-" + propertyId);
          heartImg.attr(
            "src",
            "/projet/project-rbnb/asset/media/icons/heart.svg"
          );
          form.removeClass("favorite-active");

          showNotification("Propriété retirée des favoris"); // Affiche une notification
        },
        error: function () {
          // Traitement en cas d'erreur
        },
      });
    } else {
      // Si la propriété n'est pas encore dans la liste des favoris, l'ajoute
      $.ajax({
        // Requête AJAX pour ajouter la propriété aux favoris
        url: form.attr("action"),
        type: "POST",
        data: form.serialize(),
        success: function (data) {
          // En cas de succès
          let heartImg = $("#heart-img-" + propertyId);
          heartImg.attr(
            "src",
            "/projet/project-rbnb/asset/media/icons/heart-solid.svg"
          );
          form.addClass("favorite-active");

          showNotification("Propriété ajoutée aux favoris"); // Affiche une notification
        },
        error: function () {
          // Traitement en cas d'erreur
        },
      });
    }
  });

  // Lorsqu'un bouton à l'intérieur d'un formulaire avec la classe 'favorite-form' est cliqué
  $(".favorite-form button").on("click", function (e) {
    e.preventDefault(); // Empêche le comportement de clic par défaut du bouton
    $(this).closest(".favorite-form").submit(); // Soumet le formulaire parent
  });
});
