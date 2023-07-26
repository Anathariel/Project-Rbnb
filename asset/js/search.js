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
          console.log("Success", data);
          response(data);
        },
        error: function (xhr, status, error) {
          console.error("Error", status, error);
        },
      });
    },
    minLength: 2, // Nombre de caractères minimum avant que l'auto-complétion ne commence
  });
});
