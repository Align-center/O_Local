<?php

class Route {

    public static $validRoutes = array();

    //Fonction pour créer les routes autorisées
    public static function set($route, $function) {

        self::$validRoutes[] = $route;

        if ($_GET['url'] == $route) {

            //__invoke() sert a appelé la fonction envoyé en paramètre
            $function-> __invoke();
        }
    }

}