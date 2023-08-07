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