<?php

require_once('Model.php');

class UnsubscribeModel extends Model {

    public function unsubscribe($email) {

        //On remplace la valeur de newsletter par 0, l'utilisateur ne recevra plus de mail
        $sql = 'UPDATE `users` SET `newsletter`= 0 WHERE `e-mail` = ?';
        $query = $this->pdo->prepare($sql);
        $query->execute([ $email ]);
    }
}