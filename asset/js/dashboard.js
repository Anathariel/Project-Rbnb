window.onload = function() {
    // Cacher toutes les sections au chargement de la page
    const sections = document.querySelectorAll('.dashboard-cards-my-proprieties, .dashboard-cards-my-favs, .dashboard-cards-my-locations, .dashboard-cards-my-reservations');
    sections.forEach((section) => {
        section.style.display = 'none';
    });

    // Afficher la première section au chargement de la page (ajustez en fonction de vos besoins)
    document.querySelector('#my-proprieties').style.display = 'block';

    // Ajouter des gestionnaires d'événements click à chaque lien
    const links = document.querySelectorAll('.user-menu a');
    links.forEach((link) => {
        link.addEventListener('click', (event) => {
            event.preventDefault();  // Empêcher le comportement par défaut
            // Cacher toutes les sections
            sections.forEach((section) => {
                section.style.display = 'none';
            });

            // Afficher la section correspondante
            const target = link.getAttribute('href');
            document.querySelector(target).style.display = 'block';
        });
    });
};


//Dashboard Sous-menu
document.addEventListener('DOMContentLoaded', function () {
    var submenuLink = document.getElementById('submenu');
    var userMenu = document.getElementById('user-menu');
    var submenu = document.querySelector('.submenu-dashboard');
  
    submenuLink.addEventListener('click', function (event) {
      event.preventDefault();
      toggleSubmenu();
    });
  
    function toggleSubmenu() {
      submenu.classList.toggle('show');
  
      if (submenu.classList.contains('show')) {
        positionSubmenu(); // Position the submenu when it is shown
      }
    }
  
    document.addEventListener('click', function (event) {
      if (!submenu.contains(event.target) && !submenuLink.contains(event.target)) {
        submenu.classList.remove('show');
      }
    });
  
    function positionSubmenu() {
      var userMenuRect = userMenu.getBoundingClientRect();
      submenu.style.top = userMenuRect.bottom + 'px';
      submenu.style.left = userMenuRect.left + 'px';
      submenu.style.width = userMenuRect.width + 'px';
    }
  
    window.addEventListener('resize', function () {
      if (submenu.classList.contains('show')) {
        positionSubmenu(); // Update the position when window is resized
      }
    });
  });