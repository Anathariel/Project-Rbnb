<?php
class UserModel extends Model {

    public function createUser(User $user){
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

        $req->closeCursor();
    }

    public function getUserByEmail(string $email){
        $req = $this->getDb()->prepare("SELECT `uid`, `email`, `password` FROM `user` WHERE `email` = :email");
        $req->bindParam(":email", $email, PDO::PARAM_STR);
        $req->execute();

        return $req->rowCount() === 1 ? new User($req->fetch(PDO::FETCH_ASSOC)) : false;
    }
}