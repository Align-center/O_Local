<?php

require_once('Model.php');

class HomeModel extends Model {

    public function getContent($id) {

        //Récupération du contenu de la page d'accueil à partir de leur id
        $sql = 'SELECT * FROM homeContent WHERE id = ?';
        $query = $this->pdo->prepare($sql);
        $query->execute([ $id ]);

        return $content = $query->fetch();
    }
}