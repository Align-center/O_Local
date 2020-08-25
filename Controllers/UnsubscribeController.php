<?php

class Unsubscribe {

    public static function createView() {

        $pageTitle = 'Désabonnement';

        //Instanciation du Model
        $unsubscribeModel = new UnsubscribeModel();

        //Appel de la methode unsubscribe
        $unsubscribeModel->unsubscribe($_SESSION['user']['email']);

        //on met toutes les variables dans un tableau
        $variables = compact('pageTitle');

        //On appelle la methode render qui appellera la vue et lui enverra les variables
        Utils::render('unsubscribe', $variables);
    }
}