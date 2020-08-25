<?php

    session_start();

    //Si l'admin n'est pas connecté, redirection vers la page de connexion
    if (isset($_SESSION['admin'])) {

    include('includes/header.phtml');
    include('includes/pdo.php');

    $error = '';
    $success = '';

    if (!empty($_POST)) {
        
        //Si au moins un des champs est vide une erreur s'affiche et l'insertion en DB ne se fera pas
        if (empty($_POST['first_name']) || empty($_POST['last_name']) || empty($_POST['login']) || empty($_POST['password'])) {

            $error = 'Veuillez remplir tous les champs';
        }
        else {

            //On vérifie que le mot de passe soit assez long, sinon erreur
            if (strlen($_POST['password']) < 8) {

                $error = 'Le mot de passe doit faire au moins 8 caractères.';
            }
            else {

                //Hashage du mdp et insertion en DB
                $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

                $sql = 'INSERT INTO `users`(`id`, `first_name`, `last_name`,`e-mail`, `phone`, `login`, `password`, `newsletter`, `role`) 
                        VALUES (null , :first_name, :last_name, "x", "0",  :login, :password, 0, "admin")';
                $query = $pdo->prepare($sql);
                $query->execute([
                    'first_name' => $_POST['first_name'],
                    'last_name' => $_POST['last_name'],
                    'login' => $_POST['login'],
                    'password' => $password
                ]);

                //Retour utilisateur pour confirmer l'ajout d'un admin
                $success = 'Vous avez bien enregistré cet administrateur';
            }
        }
        
    }

    //affichage de la vue
    include('includes/views/addAdmin.phtml');
}
else {
    header('Location: connection.php');
    exit;
}
?>