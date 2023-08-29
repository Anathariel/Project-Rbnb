document.addEventListener('DOMContentLoaded', function() {
  // Récupère les éléments nécessaires du menu de navigation
  const containerTagList = document.querySelector('.container-tag-list');
  const leftArrowContainer = document.querySelector('.left-arrow-container');
  const rightArrowContainer = document.querySelector('.right-arrow-container');
  const leftArrow = document.querySelector('.left-arrow');
  const rightArrow = document.querySelector('.right-arrow');

  if (containerTagList && leftArrow && rightArrow) {
    const halfContainerWidth = containerTagList.clientWidth / 2;
    // Fonction pour faire défiler vers la gauche

    function scrollToLeft() {
        containerTagList.scrollTo({
            left: containerTagList.scrollLeft - halfContainerWidth,
            behavior: 'smooth',
        });
    }

   // Fonction pour faire défiler vers la droite
    function scrollToRight() {
        containerTagList.scrollTo({
            left: containerTagList.scrollLeft + halfContainerWidth,
            behavior: 'smooth',
        });
    }
    
    // Ajoute des écouteurs d'événements pour les flèches de navigation
    leftArrow.addEventListener('click', scrollToLeft);
    rightArrow.addEventListener('click', scrollToRight);
}

 // Récupère les éléments nécessaires du slider d'images
  const sliderImages = document.querySelectorAll('.slider-image');
  const prevArrow = document.querySelector('.prev-arrow');
  const nextArrow = document.querySelector('.next-arrow');
  let currentIndex = 0;

  if (sliderImages.length > 0 && prevArrow && nextArrow) {
    // Fonction pour afficher une image en fondu
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
// Fonctions pour passer à la diapositive précédente et suivante
    function showPreviousSlide() {
      currentIndex = (currentIndex - 1 + sliderImages.length) % sliderImages.length;
      fadeInImage(currentIndex);
    }

    function showNextSlide() {
      currentIndex = (currentIndex + 1) % sliderImages.length;
      fadeInImage(currentIndex);
    }
   // Ajoute des écouteurs d'événements pour les flèches de navigation
    prevArrow.addEventListener('click', showPreviousSlide);
    nextArrow.addEventListener('click', showNextSlide);

    // Change slide every 10 seconds
    setInterval(showNextSlide, 10000);
  }

  // Récupère l'élément du bouton de retour en haut de page
  const scrollToTopButton = document.getElementById('scroll-to-top-button');
  let isScrolled = false;

  if (scrollToTopButton) {
    // Fonction pour gérer le défilement et l'affichage du bouton
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
   // Fonction pour défilement en haut de page
    function scrollToTop() {
      window.scrollTo({
        top: 0,
        behavior: 'smooth',
      });
    }

    // Vérifie la position de défilement initiale après le premier événement de défilement
    function checkInitialScrollPosition() {
      if (window.scrollY > 0) {
        isScrolled = true;
        handleScroll();
        window.removeEventListener('scroll', checkInitialScrollPosition);
      }
    }
    // Ajoute des écouteurs d'événements pour le bouton et le défilement
    scrollToTopButton.addEventListener('click', scrollToTop);
    window.addEventListener('scroll', handleScroll);
    window.addEventListener('scroll', checkInitialScrollPosition);
  }

  // Récupère les éléments nécessaires du slider de commentaires
  const commentleftArrow = document.querySelector('.comment-leftarrow');
  const commentrightArrow = document.querySelector('.comment-rightarrow');
  const commentsContainer = document.querySelector('.container-comments-row');

  if (commentleftArrow && commentrightArrow && commentsContainer) {
      // Définit la quantité de défilement pour chaque clic
    const scrollAmount = 300;

   // Ajoute des écouteurs d'événements pour les flèches de navigation
    commentleftArrow.addEventListener('click', () => {
      commentsContainer.scrollBy({
        top: 0,
        left: -scrollAmount,
        behavior: 'smooth'
      });
    });

    // Add event listener to the right arrow button
    commentrightArrow.addEventListener('click', () => {
      commentsContainer.scrollBy({
        top: 0,
        left: scrollAmount,
        behavior: 'smooth'
      });
    });
  }

// Attend que le contenu de la page soit chargé
window.addEventListener('DOMContentLoaded', (event) => {
  // Récupère les éléments nécessaires pour la fonctionnalité de zoom sur les images
  let imgs = document.querySelectorAll('.property-images img');
  let modal = document.getElementById('myModal');
  let modalImg = document.getElementById('img01');
  let span = document.getElementsByClassName('close')[0];

  // Vérifie si les éléments nécessaires existent
  if (imgs && modal && modalImg && span) {
      imgs.forEach(img => {
          img.onclick = function() {
              modal.style.display = "block";// Affiche la modal
              modalImg.src = this.src;// Définit la source de l'image modale
          }
      });

      span.onclick = function() { 
          modal.style.display = "none";
      }

      // Ajoute cette partie pour fermer la modal en cliquant à l'extérieur de l'image
      modal.onclick = function(event) {
          if (event.target === modal) {
              modal.style.display = "none";
          }
      }
  }
});

});
