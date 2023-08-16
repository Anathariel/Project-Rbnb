jQuery(document).ready(function() {
    let isNotificationShowing = false;
    let messageQueue = [];

    function showNextNotification() {
        if (messageQueue.length === 0) {
            isNotificationShowing = false;
            return;
        }

        isNotificationShowing = true;

        const currentMessage = messageQueue.shift();  // Get the next message from the queue

        const notificationContainer = $("<div></div>")
            .addClass("notification-container")
            .text(currentMessage)
            .on("animationend", function() {
                $(this).remove();
                showNextNotification(); // Proceed to next message if any
            });
        $("body").append(notificationContainer);
    }

    function showNotification(message) {
        messageQueue.push(message);

        if (!isNotificationShowing) {
            showNextNotification();
        }
    }

    const messageElement = $("#message");
    if (messageElement.length) {  // Check if element exists
        const messageContent = messageElement.data("content");  // Get the message from the data attribute
        showNotification(messageContent);  // Show the notification with the message
    }
});