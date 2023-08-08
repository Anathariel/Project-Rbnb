window.onload = function () {
  // Cacher toutes les sections au chargement de la page
  const sections = document.querySelectorAll(
    ".dashboard-cards-my-proprieties,.dashboard-cards-my-favs,.dashboard-cards-my-locations,.dashboard-cards-my-reservations"
  );
  sections.forEach((section) => {
    section.style.display = "none";
  });

  // Afficher la première section au chargement de la page (ajustez en fonction de vos besoins)
  document.querySelector("#my-proprieties").style.display = "block";

  // Ajouter des gestionnaires d'événements click à chaque lien
  const links = document.querySelectorAll(".user-menu .tab a");
  links.forEach((link) => {
    link.addEventListener("click", (event) => {
      event.preventDefault(); // Empêcher le comportement par défaut
      // Cacher toutes les sections
      console.log(sections);
      sections.forEach((section) => {
        section.style.display = "none";
      });

      // Récupérer l'ID de la section cible depuis l'attribut href
      const targetId = link.getAttribute("href");
      document.querySelector(targetId).style.display = "block";
    });
  });

  // Ajouter un gestionnaire d'événements click à tous les boutons "Supprimer" dans la section "Mes Favoris"
  const deleteButtons = document.querySelectorAll(".delete-favorite");
  deleteButtons.forEach((button) => {
    button.addEventListener("click", (event) => {
      event.preventDefault(); // Empêcher le comportement par défaut du bouton
      const propertyId = button.dataset.propertyId;
      const method = button.dataset.method;
      const xhr = new XMLHttpRequest();
      xhr.open("POST", "/projet/project-rbnb/account/favorite/delete");
      xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
      xhr.onload = () => {
        if (xhr.status === 200) {
          // La requête a réussi, supprimer la propriété du favori de la page
          const property = document.querySelector(
            `[data-property-id="${propertyId}"]`
          ).parentNode.parentNode.parentNode.parentNode.parentNode;
          property.remove();
        } else {
          // La requête a échoué, afficher un message d'erreur
          console.error(xhr.statusText);
        }
      };
      xhr.onerror = () => {
        console.error(xhr.statusText);
      };
      xhr.send("propertyId=" + `${propertyId}` + "&method=" + `${method}`);
    });
  });
};
