<?php

    session_start();

    //Si l'admin n'est pas connecté, redirection vers la page de connexion
    if (isset($_SESSION['admin'])) {
        include('includes/header.phtml');

        include('includes/pdo.php');
    
        //On récupère le contenu de la page d'accueil
        $sql = 'SELECT * FROM homeContent';
        $query = $pdo->prepare($sql);
        $query->execute();
    
        $homeContent = $query->fetchAll();
    
        include('includes/views/homeContent.phtml');
    }
    else {

        header('Location: connection.php');
        exit;
    }

    
?>