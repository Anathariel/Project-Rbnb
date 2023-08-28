//Dashboard Sous-menu
document.addEventListener('DOMContentLoaded', function () {
    let submenuLink = document.getElementById('submenu');
    let userMenu = document.getElementById('user-menu');
    let submenu = document.querySelector('.submenu-dashboard');
  
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
      let userMenuRect = userMenu.getBoundingClientRect();
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


  //Sous-menu Ajouter
  document.addEventListener('DOMContentLoaded', function() {
    var dropdownButton = document.querySelector(".dropbtn");
    var dropdownContent = document.querySelector(".dropdown-content");

    if(dropdownButton) {
      dropdownButton.addEventListener('click', function(event) {
          event.preventDefault();
          if (dropdownContent.style.display === "none" || dropdownContent.style.display === "") {
              dropdownContent.style.display = "block";
          } else {
              dropdownContent.style.display = "none";
          }
      });
  }  
});