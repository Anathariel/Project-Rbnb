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