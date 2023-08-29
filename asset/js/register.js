// Sélection des éléments du DOM à l'aide de leurs IDs
const signInBtn = document.getElementById("signIn");  // Bouton de connexion
const signUpBtn = document.getElementById("signUp");  // Bouton d'inscription
const firstForm = document.getElementById("form1");    // Premier formulaire
const secondForm = document.getElementById("form2");   // Deuxième formulaire
const container = document.querySelector(".container"); // Conteneur global

// Vérification que les éléments nécessaires existent
if (signInBtn && signUpBtn && container) {
    // Ajout d'un écouteur d'événement au clic sur le bouton de connexion
    signInBtn.addEventListener("click", () => {
        container.classList.remove("right-panel-active");
        // Lorsque le bouton de connexion est cliqué, la classe "right-panel-active" est retirée
        // Cela modifie potentiellement l'apparence de l'interface utilisateur pour afficher le panneau de connexion
    });

    // Ajout d'un écouteur d'événement au clic sur le bouton d'inscription
    signUpBtn.addEventListener("click", () => {
        container.classList.add("right-panel-active");
        // Lorsque le bouton d'inscription est cliqué, la classe "right-panel-active" est ajoutée
        // Cela modifie potentiellement l'apparence de l'interface utilisateur pour afficher le panneau d'inscription
    });
}
