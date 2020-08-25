<?php

class Utils {

    public static function render($path, array $variables = []) {

        //On extrait les varibles envoyé dans un tableau pour pouvoir les utiliser dans la vue
        extract($variables);

        //Ouverture de la "mémoire" tampon, la vue appelé à l'intérieur ne sera pas affichée
        ob_start();

        if ( $path == 'index.php') {
            require('Views/home.html.php');
        }
        else {
            require('Views/' . $path . '.html.php');
        }

        //La vue appellé dans le tampon est assignée à la variables pageContent qui est appelé dans le layout
        $pageContent = ob_get_clean();

        require('Views/layout.html.php');
           
    }

}