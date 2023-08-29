// Attendez que le document soit prêt
jQuery(document).ready(function() {
    let isNotificationShowing = false; // Variable pour suivre si une notification est déjà affichée
    let messageQueue = []; // File d'attente pour stocker les messages en attente

    // Fonction pour afficher la prochaine notification dans la file d'attente
    function showNextNotification() {
        if (messageQueue.length === 0) {
            isNotificationShowing = false;
            return; // Si la file d'attente est vide, ne rien faire
        }

        isNotificationShowing = true;

        const currentMessage = messageQueue.shift(); // Prend le prochain message dans la file d'attente

        // Crée un élément <div> pour la notification et ajoute la classe 'notification-container'
        const notificationContainer = $("<div></div>")
            .addClass("notification-container")
            .text(currentMessage)
            .on("animationend", function() {
                $(this).remove(); // Supprime l'élément une fois que l'animation est terminée
                showNextNotification(); // Passe au message suivant s'il y en a
            });
        $("body").append(notificationContainer); // Ajoute la notification au <body>
    }

    // Fonction pour ajouter un message à la file d'attente et afficher une notification
    function showNotification(message) {
        messageQueue.push(message); // Ajoute le message à la file d'attente

        if (!isNotificationShowing) {
            showNextNotification(); // Affiche la prochaine notification si aucune n'est en cours
        }
    }

    // Récupère l'élément avec l'ID 'message'
    const messageElement = $("#message");
    if (messageElement.length) { // Vérifie si l'élément existe
        const messageContent = messageElement.data("content"); // Récupère le message depuis l'attribut de données
        showNotification(messageContent); // Affiche la notification avec le message
    }
});
