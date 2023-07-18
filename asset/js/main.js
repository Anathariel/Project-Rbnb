// MENU NAVIGATION ICON 
const containerTagList = document.querySelector('.container-tag-list');
const leftArrowContainer = document.querySelector('.left-arrow-container');
const rightArrowContainer = document.querySelector('.right-arrow-container');
const leftArrow = document.querySelector('.left-arrow');
const rightArrow = document.querySelector('.right-arrow');

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

leftArrow.addEventListener('click', scrollToLeft);
rightArrow.addEventListener('click', scrollToRight);

// HERO SLIDER HOMEPAGE
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

// prevArrow.addEventListener('click', showPreviousSlide);
// nextArrow.addEventListener('click', showNextSlide);

// Change slide every 10 seconds
setInterval(showNextSlide, 10000);


// SCROLL TOP BUTTON HOMEPAGE

const scrollToTopButton = document.getElementById('scroll-to-top-button');
let isScrolled = false;

function handleScroll() {
  const scrollPosition = window.scrollY;
  const halfPageHeight = window.innerHeight / 2;

  if (scrollPosition > halfPageHeight && !isScrolled) {
    isScrolled = true;
    scrollToTopButton.classList.remove('scroll-to-top-hidden');
  } else if (scrollPosition <= halfPageHeight && isScrolled) {
    isScrolled = false;
    scrollToTopButton.classList.add('scroll-to-top-hidden');
  }
}

function scrollToTop() {
  window.scrollTo({
    top: 0,
    behavior: 'smooth',
  });
}

// Check initial scroll position only after the first scroll event
function checkInitialScrollPosition() {
  if (window.scrollY > 0) {
    isScrolled = true;
    handleScroll();
    window.removeEventListener('scroll', checkInitialScrollPosition);
  }
}

scrollToTopButton.addEventListener('click', scrollToTop);
window.addEventListener('scroll', handleScroll);
window.addEventListener('scroll', checkInitialScrollPosition);
