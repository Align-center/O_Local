<?php

class Home{

    public static function createView() {

        $pageTitle = 'Accueil';

        $id = 1;

        //Instanciation model
        $homeModel = new HomeModel();

        //récupération du contenu de la page d'accueil
        $homeContent = $homeModel->getContent($id);

        $test = 'SAlut <br> Ca va';

        //On met les variables dans un tableau
        $variables = compact('pageTitle', 'homeContent', 'test');

        //On appelle la methode render pour appeler la vue et envoyer les variables à la vue
        Utils::render('index.php', $variables);
    }

    //Methode utilisé pour le 'slider' du contenu de la page d'accueil
    public static function ajaxMethod() {

        $id = $_POST['id'];

        //Instanciation
        $homeModel = new HomeModel();

        //Récupération du contenu
        $content = $homeModel->getContent($id);

        //encodage en json (converti des valeurs, tableaux etc en chaine de caractère pour rendre l'envoie vers JavaScript possible)
        $jsonContent = json_encode($content);

        //envoie vers js
        echo $jsonContent;
        exit;

    }
}