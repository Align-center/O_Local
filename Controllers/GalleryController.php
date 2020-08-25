<?php

class Gallery {

    public static function createView() {

        $pageTitle = 'Galerie';

        //Instanciation
        $galleryModel = new GalleryModel();

        //Récupération du contenu du carousel
        $galleryContent = $galleryModel->getContent();

        $variables = compact('pageTitle', 'galleryContent');

        Utils::render('gallery', $variables);
    }
}