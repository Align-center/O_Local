<?php

session_start();

//Si l'admin n'est pas connecté, redirection vers la page de connexion
if (isset($_SESSION['admin'])) {
    include('includes/header.phtml');

    include('includes/pdo.php');

    //Si le formulaire est envoyé
    if (!empty($_POST)) {

        //On récupère tous les utilisateurs qui ne sont pas admin et qui ont validé la réception de newsletter
        $sql = "SELECT * FROM users WHERE newsletter = 1 AND role = 'user'";
        $query = $pdo->prepare($sql);
        $query->execute();
        
        $mailList = $query->fetchAll();

        $message = $_POST['content'];
        $title = $_POST['title'];

        //Si les champs du formulaire ne sont pas vide
        if (!empty($message) && !empty($title)) {

            //Pour 'activer' l'utilsation de balises html 
            $headers = "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

            //Pour chaque utilisateur on envoie le mail
            foreach ($mailList as $mail) {

                mail($mail, $title, $message, $headers);
            }
        }
    }

    include('includes/views/mailList.phtml');
}
else {

    header('Location: connection.php');
    exit;
}