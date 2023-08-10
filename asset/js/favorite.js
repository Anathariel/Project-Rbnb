$(document).ready(function () {
  let isNotificationShowing = false;

  function showNotification(message) {
    if (isNotificationShowing) {
      return;
    }

    isNotificationShowing = true;

    const notificationContainer = $("<div></div>")
      .addClass("notification-container")
      .text(message);
    $("body").append(notificationContainer);

    setTimeout(function () {
      notificationContainer.remove();
      isNotificationShowing = false;
    }, 1500);
  }

  $(".favorite-form").on("submit", function (e) {
    e.preventDefault();
    let form = $(this);
    let propertyId = form.find("input[name='propertyId']").val();

    if (form.hasClass("favorite-active")) {
      $.ajax({
        url: "/projet/project-rbnb/account/favorite/delete",
        type: "POST",
        data: {
          propertyId: propertyId,
          method: "DELETE",
        },
        success: function (data) {
          let heartImg = $("#heart-img-" + propertyId);
          heartImg.attr(
            "src",
            "/projet/project-rbnb/asset/media/icons/heart.svg"
          );
          form.removeClass("favorite-active");

          showNotification("Propriété retirée des favoris");
        },
        error: function () {
          // Traitement en cas d'erreur
        },
      });
    } else {
      $.ajax({
        url: form.attr("action"),
        type: "POST",
        data: form.serialize(),
        success: function (data) {
          let heartImg = $("#heart-img-" + propertyId);
          heartImg.attr(
            "src",
            "/projet/project-rbnb/asset/media/icons/heart-solid.svg"
          );
          form.addClass("favorite-active");

          showNotification("Propriété ajoutée aux favoris");
        },
        error: function () {
          // Traitement en cas d'erreur
        },
      });
    }
  });

  $(".favorite-form button").on("click", function (e) {
    e.preventDefault();
    $(this).closest(".favorite-form").submit();
  });
});
