<?php

class CommentController extends Controller
{
    public function addComment($propertyId)
    {

        global $router;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userId = $_SESSION['uid'];
            $rating = isset($_POST['rating']) ? $_POST['rating'] : '';
            $commentText = isset($_POST['commentText']) ? $_POST['commentText'] : '';


            $comment = new Comment([
                'propertyId' => $propertyId,
                'userId' => $userId,
                'rating' => $rating,
                'commentText' => $commentText,
            ]);

            $commentModel = new CommentModel();
            $commentModel->addCommentModel($comment);

            header('Location: ' . $router->generate('baseProperty', ['propertyId' => $propertyId, 'message' => 'Votre commentaire a bien été ajouté.']));
        } else {
            $message = 'Oops, something went wrong. Please try again later.';
            echo self::getRender('home.html.twig', ['message' => $message]);
        }
    }
}
