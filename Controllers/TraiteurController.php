<?php

class Traiteur {

    public static function createView() {

        //Si l'utilisateur est connecté, on effectue l'appel de la vue etc ( connexion nécessaire uniquement pour cette page)
        if (isset($_SESSION['user'])) {

            $pageTitle = 'Traiteur';

            $variables = compact('pageTitle');
            
            Utils::render('traiteur', $variables);
        }
        else {

            header('Location: ./');
            exit;
        }
        
    }
}