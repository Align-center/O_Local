<?php

    include('includes/header.phtml');
    include('includes/pdo.php');

    $error = '';

    //on continue ce code uniquement si le formulaire & été envoyé
    if (isset($_POST['login']) && isset($_POST['password'])) {

        $input = $_POST;

        //Si les champs ne sont pas remplis, affichage d'une erreur
        if($_POST['login'] == null || $_POST['password'] == null) {

            $error = 'Tous les champs doivent être remplis';
        }
        else {

            //On récupère les infos de l'utilisateur (qui ne peut etre qu'un admin cf. ligne 33-48)
            $sql = 'SELECT * FROM users WHERE login = ?';
            $query = $pdo->prepare($sql);
            $query->execute([ $input['login'] ]);

            $databaseInfo = $query->fetch();

            //On vérifie si le mot de passe rentré correspond a celui en DB, si différents affichage d'une erreur
            if ( password_verify($input['password'], $databaseInfo['password']) ) {

                session_start();

                //Si l'utilisateur est bien un admin on initialise la session avec ses infos puis on redirige, sinon erreur
                if ( $databaseInfo['role'] == 'admin') {

                    $_SESSION['admin'] = [
                        'role' => 'admin',
                        'name' => $databaseInfo['first_name'],
                    ];

                    header('Location: backOffice.php');
                    exit;
                }
                else {

                    $error = "Vous n'êtes pas autorisé à accéeder à cette page";
                }
            }
            else {

                $error = "L'identifiant ou le mot de passe contient une erreur";
            }
        }

    }

    include('includes/views/connection.phtml');
?>