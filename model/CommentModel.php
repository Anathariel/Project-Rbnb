<?php
class CommentModel extends Model
{
    public function getCommentModel(int $propertyId)
    {
        $req = $this->getDb()->prepare('SELECT `uid`, `rating`, `commentText` FROM `comment` WHERE `propertyId` = :propertyId');
        $req->bindParam('propertyId', $propertyId, PDO::PARAM_INT);
        $req->execute();

        $commentModelData = $req->fetch(PDO::FETCH_ASSOC);

        if (!$commentModelData) {
            // Gérer le cas où aucune commodité n'est trouvée pour la propriété spécifiée
            return null;
        }

        $comment = new Comment($commentModelData);

        return $comment;
    }

//     public function getCommentById(int $commentId)
// {
//     // Récupérer les informations de l'utilisateur associé au commentaire
//     $userModel = new UserModel();
//     $req = $this->getDb()->prepare('SELECT `userId` FROM `comment` WHERE `commentId` = :commentId');
//     $req->bindParam('commentId', $commentId, PDO::PARAM_INT);
//     $req->execute();

//     $userData = $req->fetch(PDO::FETCH_ASSOC);

//     if (!$userData) {
//         // Gérer le cas où aucun utilisateur n'est trouvé pour le commentaire spécifié
//         return null;
//     }

//     $userId = $userData['userId'];
//     $user = $userModel->getUserById($userId);

//     if (!$user) {
//         // Gérer le cas où l'utilisateur associé au commentaire n'est pas trouvé
//         return null;
//     }

//     $comment = new Comment($uid);

//     return $comment;
// }

    

}
