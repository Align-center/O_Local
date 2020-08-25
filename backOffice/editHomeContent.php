<?php 

session_start();

//Si l'admin n'est pas connecté, redirection vers la page de connexion
if (isset($_SESSION['admin'])) {

    include('includes/pdo.php');

    //Si le formulaire a été envoyé
    if(isset($_POST['title']) && isset($_POST['content'])) {

        $title = $_POST['title'];
        $content = $_POST['content'];
        $id = intval($_POST['id']);

        //On met a jour les infos rentré dans le formulaire puis redirection
        $sql = 'UPDATE `homeContent` SET `title`= :title, `content`= :content WHERE id = :id';
        $query = $pdo->prepare($sql);
        $query->execute([
            'title' => $title,
            'content' => $content,
            'id' => $id
        ]);

        header('Location: homeContent.php');
        exit;
    }

    include('includes/header.phtml');

    //On récupère le contenu pour l'afficher
    $sql = 'SELECT * FROM homeContent WHERE id = ?';
    $query = $pdo->prepare($sql);
    $query->execute([ $_GET['id'] ]);

    $content = $query->fetch();

    include('includes/views/editHomeContent.phtml');
}
else {

    header('Location: connection.php');
    exit;
}


?>