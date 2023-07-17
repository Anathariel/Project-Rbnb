<?php
class UserModel extends Model
{
    public function createUser(User $user)
    {
        $firstName = $user->getFirstName();
        $lastName = $user->getLastName();
        $password = $user->getPassword();
        $email = $user->getEmail();

        $req = $this->getDb()->prepare("INSERT INTO `user` (`firstName`, `lastName`, `email`, `password`) VALUES (:firstName, :lastName, :email, :password)");
        $req->bindParam(":firstName", $firstName, PDO::PARAM_STR);
        $req->bindParam(":lastName", $lastName, PDO::PARAM_STR);
        $req->bindParam(":password", $password, PDO::PARAM_STR);
        $req->bindParam(":email", $email, PDO::PARAM_STR);

        $req->execute();
    }

    public function getUserByEmail(string $email)
    {
        $req = $this->getDb()->prepare("SELECT `uid`, `email`, `password` FROM `user` WHERE `email` = :email");
        $req->bindParam(":email", $email, PDO::PARAM_STR);
        $req->execute();

        return $req->rowCount() === 1 ? new User($req->fetch(PDO::FETCH_ASSOC)) : false;
    }

    public function getUserById($userId)
    {
        $req = $this->getDb()->prepare('SELECT `firstName`, `lastName`, `email`, `password` FROM `user` WHERE `uid` = :userId');
        $req->bindParam('userId', $userId, PDO::PARAM_INT);
        $req->execute();

        $userData = $req->fetch(PDO::FETCH_ASSOC);

        if (!$userData) {
            // Gérer le cas où aucun utilisateur n'est trouvé pour l'ID spécifié
            return null;
        }

        $user = new User($userData);

        return $user;
    }

    public function editUser(int $uid, string $firstName, string $lastName, string $email,string $password){
        // Obtient la connexion à la base de données
        $db = $this->getDb(); 
         // Prépare la requête de mise à jour pour mettre à jour les données de l'utilisateur
        $user = $db->prepare('UPDATE `user` SET `firstName` = :firstName,`lastName` = :lastName,`email` = :email,`password` = :password WHERE `uid` = :uid');
         // Associe la valeur de $uid au paramètre :
        $user->bindParam(':uid', $uid, PDO::PARAM_INT);
        $user->bindParam(':firstName', $firstName, PDO::PARAM_STR);
        $user->bindParam(':lastName', $lastName, PDO::PARAM_STR);
        $user->bindParam(':email', $email, PDO::PARAM_STR);
        $user->bindParam(':password', $password, PDO::PARAM_STR);
      
        $user->execute();
        
    }

}
