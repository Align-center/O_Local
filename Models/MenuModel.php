<?php
require_once('Model.php');

class MenuModel extends Model {

    public function getLastId() {

        //Récupération de l'id du dernier menu
        $sql = 'SELECT MAX(id) as last_id FROM menus';
        $query = $this->pdo->prepare($sql);
        $query->execute();

        return $last_id = $query->fetch();
    }

    public function getLastMenu() {

        //Récupération du dernier menu en BD
        $sql = 'SELECT * FROM menus ORDER By id DESC LIMIT 1';
        $query = $this->pdo->prepare($sql);
        $query->execute();

        return $last_menu= $query->fetch();
    }

    public function getMenu($menu_id) {

        //Récupération des produits liés à un menu à partir de son id
        $sql = 'SELECT * FROM products WHERE menu_id = :menu_id';
        $query = $this->pdo->prepare($sql);
        $query->execute([
            'menu_id' => $menu_id
        ]);

        return $menu = $query->fetchAll();
    }
}