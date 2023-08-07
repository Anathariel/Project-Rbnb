$(document).ready(function () {
  $(".favorite-form").on("submit", function (e) {
    e.preventDefault();
    var form = $(this);
    var propertyId = form.find("input[name='propertyId']").val();
    $.ajax({
      url: form.attr("action"),
      type: "POST",
      data: form.serialize(),
      success: function (data) {
        if (data.success) {
          var heartImg = $("#heart-img-" + propertyId);
          if (data.isFavorite) {
            // Si la propriété est désormais un favori
            heartImg.attr("src", "/media/icons/heart-solid.svg");
          } else {
            // Si la propriété n'est plus un favori
            heartImg.attr("src", "/media/icons/heart.svg");
          }
        }
      },
      error: function () {
        // Traitement en cas d'erreur
      },
    });
  });
});
