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
       
          
          var heartImg = $("#heart-img-" + propertyId);
          console.log(heartImg);
            heartImg.attr("src", "/projet/project-rbnb/asset/media/icons/heart-solid.svg");

        
      },
      error: function () {
        // Traitement en cas d'erreur
      },
    });
  });
});
