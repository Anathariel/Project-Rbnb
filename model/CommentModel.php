<?php
class CommentModel extends Model
{
    public function getCommentModel(int $propertyId)
    {
        $req = $this->getDb()->prepare('SELECT `uid`, `rating`, `commentText`, `propertyId` FROM `comment` WHERE `propertyId` = :propertyId ORDER BY `commentId` DESC');
        $req->bindParam(':propertyId', $propertyId, PDO::PARAM_INT);
        $req->execute();

        $commentModelData = $req->fetchAll(PDO::FETCH_ASSOC);

        if (!$commentModelData) {
            // Gérer le cas où aucun commentaire n'est trouvé pour la propriété spécifiée
            return [];
        }

        $comments = [];
        foreach ($commentModelData as $commentData) {
            $comment = new Comment($commentData);

            $commentUser = $comment->getUid();

            $req2 = $this->getDb()->prepare('SELECT `uid`, `firstName`, `lastName`, `birthDate`, `email`, `phoneNumber` FROM `user` WHERE `uid` = :id');
            $req2->bindParam(':id', $commentUser, PDO::PARAM_INT);
            $req2->execute();

            $userData = $req2->fetch(PDO::FETCH_ASSOC);
            $comment->setFirstname($userData['firstName']);

            $comments[] = $comment;
        }

        return $comments;
    }


    public function addCommentModel(Comment $comment)
    {
        $propertyId = $comment->getPropertyId();
        $userId = $comment->getUid();
        $rating = $comment->getRating();
        $commentText = $comment->getCommentText();


        $req = $this->getDb()->prepare('INSERT INTO `comment` (`propertyId`, `uid`, `rating`, `commentText`) VALUES (:propertyId, :userId, :rating, :commentText)');
        $req->bindParam(':propertyId', $propertyId, PDO::PARAM_INT);
        $req->bindParam(':userId', $userId, PDO::PARAM_INT);
        $req->bindParam(':rating', $rating, PDO::PARAM_INT);
        $req->bindParam(':commentText', $commentText, PDO::PARAM_STR);
        $req->execute();
    }
}
