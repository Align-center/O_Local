<?php 

class Contact {

    public static function createView() {

        $pageTitle = 'Contact';

        $variables = compact('pageTitle');

        Utils::render('contact', $variables);
    }
}