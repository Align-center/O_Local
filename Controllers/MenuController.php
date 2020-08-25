<?php

class Menu {

    public static function createView() {

        $pageTitle = 'Menu';

        //Instanciation du model
        $menuModel = new MenuModel();

        //on récupère l'id du dernier menu
        $last_menu = $menuModel->getLastMenu();

        //On récupère les produits du dernier menu
        $products = $menuModel->getMenu($last_menu['id']);

        //On crée des tableaux contenants les jours et mois en français et anglais pour traduire la date créee l.24
        $en_day = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
        $fr_day = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'];
        $en_months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        $fr_months = ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'];

        $en_date = date('l d F Y', strtotime($last_menu['date']));

        $date = str_replace($en_day, $fr_day, $en_date);
        $date = str_replace($en_months, $fr_months, $date);

        $variables = compact('pageTitle', 'products', 'date');

        Utils::render('menu', $variables);
    }
}