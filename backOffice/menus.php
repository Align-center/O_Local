<?php
session_start();

//Si l'admin n'est pas connecté, redirection vers la page de connexion
if (isset($_SESSION['admin'])) {

    include('includes/pdo.php');

    $success = '';

    if (!empty($_POST)) {

        //On tri les plats par catégories
        $dish = ['name' => $_POST['dish'], 'price' => $_POST['dish_price'], 'category' => 'Plat'];
        $pasta = ['name' => $_POST['pasta'], 'price' => $_POST['pasta_price'], 'category' => 'Pâtes'];
        $toast = ['name' => $_POST['toast'], 'price' => $_POST['toast_price'], 'category' => 'Tartine'];
        $salad = ['name' => $_POST['salad'], 'price' => $_POST['salad_price'], 'category' => 'Salade'];
        $sandwich = ['name' => $_POST['sandwich'], 'price' => $_POST['sandwich_price'], 'category' => 'Sandwich'];

        //Pour les assembler dans un tableau pour ne faire qu'un foreach pour les plats
        $products = [$dish, $pasta, $toast, $salad, $sandwich];


        //triage des desserts ( à part car il peut y en avoir entre 1 et 3)
        for ($i = 0; $i < count($_POST['desserts']); $i++) {

            if ( !empty($_POST['desserts'][$i]) && !empty($_POST['desserts_prices'][$i]) ) {

                $desserts[$i] = ['name' => $_POST['desserts'][$i], 'price' => $_POST['desserts_prices'][$i]];
            }
        }

        $date = date('Y-m-d');

        //Insertion du menu avec la date du jour
        $sql = 'INSERT INTO `menus`(`id`, `date`) VALUES (null, ?)';
        $query = $pdo->prepare($sql);
        $query->execute([ $date ]);


        // Récupération de l'id du dernier menu crée (celui ligne 35-38)
        $sql = 'SELECT MAX(id) as last_id FROM menus';
        $query = $pdo->prepare($sql);
        $query->execute();

        $menu_id = $query->fetch();

        // INSERTION de tous les produits SAUF les desserts qui sont dans un autre tableau
        foreach ($products as $product) {

            $sql = 'INSERT INTO `products`(`id`, `name`, `price`, `category`, `menu_id`) VALUES ( NULL, :names, :price, :category, :menu_id)';
            $query = $pdo->prepare($sql);
            $query->execute([
                'names' => $product['name'],
                'price' => $product['price'],
                'category' => $product['category'],
                'menu_id' => $menu_id['last_id']
            ]);
        }

        //INSERTION des desserts 
        foreach ($desserts as $dessert) {
            
            var_dump($dessert);

            $sql = 'INSERT INTO `products`(`id`, `name`, `price`, `category`, `menu_id`) VALUES ( NULL, :names, :price, :category, :menu_id)';
            $query = $pdo->prepare($sql);
            $query->execute([
                'names' => $dessert['name'],
                'price' => $dessert['price'],
                'category' => 'Dessert',
                'menu_id' => $menu_id['last_id']
            ]);
        }

        //retour utilisateur
        $success = 'Vous avez bien enregistré ce menu';
    }

    include('includes/header.phtml');

    include('includes/views/menus.phtml');
}




?>