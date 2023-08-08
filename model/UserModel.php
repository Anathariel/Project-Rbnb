<?php
class UserModel extends Model
{
    public function createUser(User $user)
    {
        $firstName = $user->getFirstName();
        $lastName = $user->getLastName();
        $password = $user->getPassword();
        $email = $user->getEmail();

        $req = $this->getDb()->prepare("INSERT INTO `user` (`firstName`, `lastName`, `email`, `password`,`registrationDate`,`picture`) VALUES (:firstName, :lastName, :email, :password,NOW(), 'user.png')");
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
        $req = $this->getDb()->prepare('SELECT `uid`, `firstName`, `lastName`, `email`, `password`,`birthDate`,`phoneNumber`, `picture` FROM `user` WHERE `uid` = :userId');
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

    public function editUser(User $user){

       // récupère les informations de l'utilisateur
        $uid = $user->getUid();
        $firstName = $user->getFirstName();
        $lastName = $user->getLastName();
        $birthDate = $user->getBirthDate();
        $email = $user->getEmail();
        $phoneNumber = $user->getPhoneNumber();
        $picture = $user->getPicture();
        // Obtient la connexion à la base de données
        $db = $this->getDb(); 
         // Prépare la requête de mise à jour pour mettre à jour les données de l'utilisateur
        $req = $db->prepare('UPDATE `user` SET `firstName` = :firstName,`lastName` = :lastName,`birthDate` =:birthDate,`email` = :email,`phoneNumber` = :phoneNumber,`picture` = :picture WHERE `uid` = :uid');
         // Associe la valeur de $uid au paramètre 
        $req->bindParam(':uid', $uid, PDO::PARAM_INT);
        $req->bindParam(':firstName', $firstName, PDO::PARAM_STR);
        $req->bindParam(':lastName', $lastName, PDO::PARAM_STR);
        $req->bindParam(':birthDate', $birthDate, PDO::PARAM_STR);
        $req->bindParam(':email', $email, PDO::PARAM_STR);
        $req->bindParam(':phoneNumber', $phoneNumber, PDO::PARAM_STR);
        $req->bindParam(':picture', $picture, PDO::PARAM_STR);
        $querryResult = $req->execute();

        return $querryResult;
        
    }
    
    public function delete($uid){

        $req = $this->getDb()->prepare('DELETE FROM `user` WHERE `uid` = :uid');
        $req->bindParam('uid', $uid, PDO::PARAM_INT);
        $req->execute();

    }

}
