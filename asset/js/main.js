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

// HERO SLIDER HOMEPAGE
// Add this JavaScript code to your page

const sliderImages = document.querySelectorAll('.slider-image');
const prevArrow = document.querySelector('.prev-arrow');
const nextArrow = document.querySelector('.next-arrow');
let currentIndex = 0;

function fadeInImage(index) {
  sliderImages.forEach((image, i) => {
    if (i === index) {
      image.style.opacity = 1;
      image.style.zIndex = 2;
    } else {
      image.style.opacity = 0;
      image.style.zIndex = 1;
    }
  });
}

function showPreviousSlide() {
  currentIndex = (currentIndex - 1 + sliderImages.length) % sliderImages.length;
  fadeInImage(currentIndex);
}

function showNextSlide() {
  currentIndex = (currentIndex + 1) % sliderImages.length;
  fadeInImage(currentIndex);
}

prevArrow.addEventListener('click', showPreviousSlide);
nextArrow.addEventListener('click', showNextSlide);

// Change slide every 10 seconds (adjust as needed)
setInterval(showNextSlide, 10000);



// MENU NAVIGATION ICON
const containerTagList = document.querySelector('.container-tag-list');
const leftArrowContainer = document.querySelector('.left-arrow-container');
const rightArrowContainer = document.querySelector('.right-arrow-container');
const leftArrow = document.querySelector('.left-arrow');
const rightArrow = document.querySelector('.right-arrow');

function handleScroll() {
  const scrollPosition = containerTagList.scrollLeft;

  if (scrollPosition > 0) {
    leftArrowContainer.style.display = 'flex';
  } else {
    leftArrowContainer.style.display = 'none';
  }
}

function scrollToLeft() {
  containerTagList.scrollTo({
    left: containerTagList.scrollLeft - containerTagList.clientWidth,
    behavior: 'smooth',
  });
}

function scrollToRight() {
  containerTagList.scrollTo({
    left: containerTagList.scrollLeft + containerTagList.clientWidth,
    behavior: 'smooth',
  });
}

containerTagList.addEventListener('scroll', handleScroll);
leftArrow.addEventListener('click', scrollToLeft);
rightArrow.addEventListener('click', scrollToRight);