<?php 

session_start();

//Si l'admin n'est pas connecté, redirection vers la page de connexion
if (isset($_SESSION['admin'])) {


    include('includes/pdo.php');

    $success = '';

    //récupération de l'id du dernier menu crée
    $sql = 'SELECT MAX(id) as last_id FROM menus';
    $query = $pdo->prepare($sql);
    $query->execute();

    $menu_id = $query->fetch();

    //Si le formulaire a été envoyé
    if (!empty($_POST)) {

        //On tri chaque catégorie ensemble
        $dish = ['name' => $_POST['Plat'], 'price' => $_POST['Plat_price'], 'id' => $_POST['Plat_id']];
        $pasta = ['name' => $_POST['Pâtes'], 'price' => $_POST['Pâtes_price'], 'id' => $_POST['Pâtes_id']];
        $toast = ['name' => $_POST['Tartine'], 'price' => $_POST['Tartine_price'], 'id' => $_POST['Tartine_id']];
        $salad = ['name' => $_POST['Salade'], 'price' => $_POST['Salade_price'], 'id' => $_POST['Salade_id']];
        $sandwich = ['name' => $_POST['Sandwich'], 'price' => $_POST['Sandwich_price'], 'id' => $_POST['Sandwich_id']];

        //Pour en faire un tableau pour ne faire qu'un seul foreach pour tout mettre en DB
        $products = [$dish, $pasta, $toast, $salad, $sandwich];

        //Triage des desserts (spécial car il peut y en avoir entre 1 et 3, donc traité à part)
        for ($i = 0; $i < count($_POST['Dessert']); $i++) {

            if ( !empty($_POST['Dessert'][$i]) && !empty($_POST['Dessert_prices'][$i]) && !empty($_POST['Dessert_id'][$i])) {

                $desserts[$i] = ['name' => $_POST['Dessert'][$i], 'price' => $_POST['Dessert_prices'][$i], 'id' => $_POST['Dessert_id'][$i]];
            }
        }

        //UPDATE des produits, on les met à jour dans la DB
        foreach ($products as $product) {

            $sql = "UPDATE `products` SET `name`= :name, `price`= :price WHERE menu_id = :menu_id AND id = :id";
            $query = $pdo->prepare($sql);
            $query->execute([
                'name' => $product['name'],
                'price' => $product['price'],
                'menu_id' => $menu_id['last_id'],
                'id' => $product['id']
            ]);
        }

        //UPDATE des desserts 
        foreach ($desserts as $dessert) {

            $sql = "UPDATE `products` SET `name`= :name, `price`= :price WHERE menu_id = :menu_id AND id = :id";
            $query = $pdo->prepare($sql);
            $query->execute([
                'name' => $dessert['name'],
                'price' => $dessert['price'],
                'menu_id' => $menu_id['last_id'],
                'id' => $dessert['id']
            ]);
        }

        $success = 'Vous avez bien modifié le menu';
    }

    include('includes/header.phtml');

    //On récupère les produits correspondant au dernier menu crée pour affichage
    $sql = 'SELECT * FROM products WHERE menu_id = ?';
    $query = $pdo->prepare($sql);
    $query->execute([ $menu_id['last_id'] ]);

    $products = $query->fetchAll();

    include('includes/views/editMenu.phtml');
}
else {
    
    header('Location: connection.php');
    exit;
}

?>