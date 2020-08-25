<?php

class Connection {

    public static function createView() {

        $pageTitle = 'Connexion';

        $errors = [];
        $success = '';

        //Instanciation
        $connectionModel = new ConnectionModel();

        //
        //        La page comporte à la fois le formulaire de connexion et d'inscription on fait la différence entre les deux lignes 22 et 39
        //

        //Si le formulaire a été envoyé, sinon redirection
        if (!empty($_POST)) {

            //Si le formulaire de connexion est envoyé
            if ($_POST['submit'] == 'Se connecter') {

                //On récupère l'utilisateur à partir de son email
                $user = $connectionModel->getUser($_POST['connectEmail']);

                //Si le mdp correspond on initialise la session avec ses informations et on le redirige
                if (password_verify($_POST['connectPassword'], $user['password'])) {

                    $_SESSION['user'] = [
                        'email' => $user['e-mail'],
                        'first_name' => $user['first_name'],
                        'last_name' => $user['last_name']
                    ];

                    header('Location: ./');
                    exit;
                }
            }
            else {

                //Si le formulaire envoyé est celui d'inscription

                //Si la checkbox pour l'accord d'envoie de newsletter n'est pas cochée,la var vaut 0 (false) sinon elle vaut 1 (true)
                if ( !isset($_POST['newsletter'])) {
                    $newsletter = 0;
                }
                else {
                    $newsletter = 1;
                }

                //Si le mot de passe fait moins de 8 caractères en envoie une erreur
                if (strlen($_POST['password']) < 8) {

                    $errors[] = 'Le mot de passe doit faire au moins 8 caractères';
                }

                //Si le téléphone ne fait pas 10 caractère on envoie une erreur
                if (strlen($_POST['phone']) != 10) {

                    $errors[] = 'Le téléphone doit être de dix numéro';
                }

                //On récupère tous les emails de DB
                $emails = $connectionModel->getAllEmails();

                //Si le mail rentré est déjà dans la DB on envoie une erreur
                if (in_array($_POST['e-mail'], $emails)) {

                    $errors[] = 'Cet e-mail est déjà utilisé, veuillez en choisir un autre';
                }
                
                //Si le tableau errors est vide on continue
                if (empty($errors)) {

                    //Hashage du mdp
                    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

                    //On insert les infos en DB avec la methode insertNewUser qui renvoie un message de succès pour le retour utilisateur
                    $success = $connectionModel->insertNewUser($_POST['first_name'], $_POST['last_name'], $_POST['e-mail'], $_POST['phone'], $password, $newsletter);
                }
            }
        }

        //On met toutes les variables du controller dans un tableau
        $variables = compact('pageTitle', 'errors', 'success');

        //On utilise la methode render pour appeler la vue et les varibles
        Utils::render('connection', $variables);
    }
}