<?php 

session_start();

//Si l'admin n'est pas connecté, redirection vers la page de connexion
if (isset($_SESSION['admin'])) {

    include('includes/header.phtml');

    include('includes/pdo.php');

    //Récupération de la date de l'avant dernier menu et de son id pour récupérer les produits correspondant par la suite
    $sql = 'SELECT MAX(id) as last_id, DATE_FORMAT(menus.date, "%d/%m/%Y") AS formatDate 
            FROM menus 
            GROUP BY formatDate  
            ORDER BY `last_id` DESC
            LIMIT 1 OFFSET 1';
    $query = $pdo->prepare($sql);
    $query->execute();

    $menu = $query->fetch();

    //Récupération des produits
    $sql = 'SELECT * FROM products WHERE menu_id = ?';
    $query = $pdo->prepare($sql);
    $query->execute([ $menu['last_id']]);

    $products = $query->fetchAll();

    include('includes/views/backoffice.phtml');
}
else {
    header('Location: connection.php');
    exit;
}

?>    