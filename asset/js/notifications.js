jQuery(document).ready(function() {
    console.log("showNotification called with message:", message);
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
            .text(currentMessage);
        $("body").append(notificationContainer);

        setTimeout(function () {
            notificationContainer.css('opacity', '1');  // this line is crucial
        }, 50);
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


    // For testing purposes
    showNotification("First Message");
    showNotification("Second Message");
});  