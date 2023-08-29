// Attend que le contenu de la page soit chargé
document.addEventListener('DOMContentLoaded', function () {
  // Récupère les éléments HTML nécessaires
  let submenuLink = document.getElementById('submenu'); // Lien déclenchant le sous-menu
  let userMenu = document.getElementById('user-menu'); // Menu utilisateur
  let submenu = document.querySelector('.submenu-dashboard'); // Contenu du sous-menu
  
  // Ajoute un écouteur d'événement sur le lien du sous-menu
  submenuLink.addEventListener('click', function (event) {
    event.preventDefault(); // Empêche le comportement par défaut du lien
    toggleSubmenu(); // Appelle la fonction pour afficher ou masquer le sous-menu
  });

  // Fonction pour afficher ou masquer le sous-menu
  function toggleSubmenu() {
    submenu.classList.toggle('show'); // Ajoute ou supprime la classe 'show'

    if (submenu.classList.contains('show')) {
      positionSubmenu(); // Positionne le sous-menu lorsqu'il est affiché
    }
  }

  // Ajoute un écouteur d'événement sur le document pour masquer le sous-menu si l'utilisateur clique en dehors de celui-ci
  document.addEventListener('click', function (event) {
    if (!submenu.contains(event.target) && !submenuLink.contains(event.target)) {
      submenu.classList.remove('show'); // Supprime la classe 'show' pour masquer le sous-menu
    }
  });

  // Fonction pour positionner le sous-menu par rapport au menu utilisateur
  function positionSubmenu() {
    let userMenuRect = userMenu.getBoundingClientRect(); // Récupère les dimensions et la position du menu utilisateur
    submenu.style.top = userMenuRect.bottom + 'px'; // Position verticale
    submenu.style.left = userMenuRect.left + 'px'; // Position horizontale
    submenu.style.width = userMenuRect.width + 'px'; // Largeur
  }

  // Ajoute un écouteur d'événement sur la fenêtre pour mettre à jour la position du sous-menu lorsque la fenêtre est redimensionnée
  window.addEventListener('resize', function () {
    if (submenu.classList.contains('show')) {
      positionSubmenu(); // Met à jour la position du sous-menu en cas de redimensionnement
    }
  });
});
