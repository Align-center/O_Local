<?php

// Affichage des erreurs
// ini_set('display_errors', 1); 
// ini_set('display_startup_errors', 1); 
// error_reporting(E_ALL);

session_start();

//Autoload des classes, controllers et models
spl_autoload_register(function ($class) {

    if (file_exists('./classes/' . $class . '.php')) {

        require_once('./classes/' . $class . '.php');
    } 
    if (file_exists('./Controllers/' . $class . 'Controller.php')) {

        require_once('./Controllers/' . $class . 'Controller.php');
    }
    if (file_exists('./Models/' . $class . 'Model.php')) {

        require_once('./Models/' . $class . 'Model.php');
    }

});

require_once('routes.php');

//Si l'url écrite ne correspond pas à un élément du tableau validRoutes, redirection vers la page d'acceuil
if (!in_array($_GET['url'], Route::$validRoutes)) {

    header('Location: .');
    exit;
}


?> 
