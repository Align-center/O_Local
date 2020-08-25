<?php 

require_once('Model.php');

class ConnectionModel extends Model {

    public function getUser($email) {

        //Récupération d'un utilisateur à partir de son email
        $sql = "SELECT * FROM users WHERE `e-mail` = ?";
        $query = $this->pdo->prepare($sql);
        $query->execute([ $email ]);

        return $user = $query->fetch();
    }

    public function getAllEmails() {

        //Récupération de tous les emails
        $sql = 'SELECT `e-mail` FROM users';
        $query = $this->pdo->prepare($sql);
        $query->execute();

        return $emails = $query->fetch();
    }

    public function insertNewUser($first_name, $last_name, $email, $phone, $password, $newsletter) {

        //Insertion d'un nouvel utilisateur
        $sql = "INSERT INTO `users`(`id`, `first_name`, `last_name`, `e-mail`, `phone`, `login`, `password`, `newsletter`, `role`) 
                VALUES (null, :first_name, :last_name, :email, :phone, null, :password, :newsletter, 'user')";
        $query = $this->pdo->prepare($sql);
        $query->execute([
            'first_name' => $first_name,
            'last_name' => $last_name,
            'email' => $email,
            'phone' => $phone,
            'password' => $password,
            'newsletter' => $newsletter
        ]);

        return $success = 'Votre inscription a bien été prise en compte, veuillez vous connecter pour accéder aux prestations traiteurs';
    }
}