<?php 

//PAGE DEVIS

class Estimate {

    public static function createView() {

        //si l'utilisateur est connecté on continue, sinon redirection
        if (isset($_SESSION['user'])) {

            $errors = [];
            $success = '';

            //Si le formulaire à été envoyé
            if (!empty($_POST)) {

                //On vérifie que les champs soit correctement remplis
                if (empty($_POST['category'])) {
                    $errors[] = 'Veuillez choisir une prestation';
                }

                if (empty($_POST['people'])) {
                    $errors[] = 'Veuillez choisir le nombre de personne';
                }

                $date = $_POST['year'].'-'.$_POST['month'].'-'.$_POST['day'];

                if ($date < date('Y-m-d')) {
                    $errors[] = 'Veuillez choisir une date valide';
                }

                //S'il n'y a aucune erreur on envoie le mail
                if (empty($errors)) {

                    $email = $_SESSION['user']['email'];
                    $name = $_SESSION['user']['first_name'].' '.$_SESSION['user']['last_name'];
                    $category = $_POST['category'];
                    $email_date = $_POST['day'].'-'.$_POST['month'].'-'.$_POST['year'];
                    $people = $_POST['people'];
                    $comment = $_POST['comment'];

                    //ces lignes servent à utiliser du html dans le mail
                    $headers = "MIME-Version: 1.0\r\n";
                    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

                    $message = "
                    
                        <table>
                        
                            <tr>

                                <td>Email</td>
                                <td>$email</td>
                            </tr>

                            <tr>
                            
                                <td>Nom</td>
                                <td>$name</td>
                            </tr>

                            <tr>

                                <td>Prestation demandée</td>
                                <td>$category</td>
                            </tr>

                            <tr>

                                <td>Date</td>
                                <td>$email_date</td>
                            </tr>

                            <tr>
                            
                                <td>Nombre de personne</td>
                                <td>$people</td>
                            </tr>

                            <tr>
                            
                                <td>Commentaire</td>
                                <td>$comment</td>
                            </tr>
                        </table>
                    ";

                    mail('contact@olocal.fr', 'Demande de devis', $message, $headers);

                    //retour utilisateur
                    $success = 'Votre demande a bien été envoyée';
                }
            }

            $pageTitle = 'Demande de devis';

            //On utlise cette variables pour afficher les mois dans un <select>, l'index 0 doit etre ignoré pour permettre aux mois d'etre numéroté de 1 à 12
            $months = ['ignore', 'Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'];

            $variables = compact('pageTitle', 'months', 'errors', 'success');

            Utils::render('estimate', $variables);
        }
        else {

            header('Location: ./');
            exit;
        }
    }
}