<?php

class CommentController extends Controller
{
    public function addComment()
    {
        global $router;
       
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userId = $_SESSION['uid'];
            $propertyId = isset($_POST['propertyId']) ? $_POST['propertyId'] : '';
            $rating = isset($_POST['rating']) ? $_POST['rating'] : '';
            $commentText = isset($_POST['commentText']) ? $_POST['commentText'] : '';

            $comment = new Comment([
                'propertyId' => $propertyId,
                'uid' => $userId,
                'rating' => $rating,
                'commentText' => $commentText,
            ]);

            $commentModel = new CommentModel();
            $commentModel->addCommentModel($comment);
            $_SESSION['flash_message'] = 'Votre commentaire à été ajouter.';
            header('Location: ' . $router->generate('propertyOne', ['id' => $propertyId]));
        } else {
            $message = 'Une erreur est survenue. Réessayer plus tard.';
            echo self::getRender('home.html.twig', ['message' => $message]);
        }
    }
}