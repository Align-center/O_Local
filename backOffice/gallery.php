<?php 

session_start();

//Si l'admin n'est pas connecté, redirection vers la page de connexion
if (isset($_SESSION['admin'])) {

    include('includes/header.phtml');
    include('includes/pdo.php');

    $success = '';
    $error = '';

    //Si le formulaire est envoyé
    if (!empty($_POST)) {

        $imgFile = $_FILES['imgFile'];

        //Si il n'y a pas d'erreur on continue
        if ($imgFile['error'] == 0 ) {

            $targetPath = '../src/img/carousel/';
            $uniqueID = uniqid('');
            $targetFile = $targetPath.$uniqueID.'.jpg';

            //On déplace l'image dans le bon dossier
            if (move_uploaded_file($imgFile['tmp_name'], $targetFile)) {

            }

            //Insertion du contenu du forulaire en DB
            $sql = 'INSERT INTO `galleryContent`(`id`, `img_path`, `img_alt`) VALUES (null, :img_path, :img_alt)';
            $query = $pdo->prepare($sql);
            $query->execute([
                'img_path' => $uniqueID.'.jpg',
                'img_alt' => $_POST['imgAlt']
            ]);

            $success = 'Vous avez bien ajouté une nouvelle image au carousel';
        }
        else {

            $error = 'Le fichier ne peut pas être sauvegardé, veuillez en choisir un autre';
        }
    }

    //On récupère tous le contenu du carousel pour l'afficher
    $sql = 'SELECT * FROM galleryContent';
    $query = $pdo->prepare($sql);
    $query->execute();

    $galleryContent = $query->fetchAll();

    //Utiliser pour numéroter les lignes du tableau pour l'affichage du carousel (on utilise pas l'id pour éviter les trous si une photo est supprimée)
    $count = 1;

    include('includes/views/gallery.phtml');
}



?>