<?php

require_once('Model.php');

class GalleryModel extends Model {

    public function getContent() {

        //Récupération du contenu du carousel
        $sql = 'SELECT * FROM galleryContent';
        $query = $this->pdo->prepare($sql);
        $query->execute();

        return $galleryContent = $query->fetchAll();
    }
}