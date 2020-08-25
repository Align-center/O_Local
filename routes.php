<?php

//Génération de toutes les routes valides du sites

Route::set('index.php', function(){
    Home::createView();
});

Route::set('contact', function() {
    Contact::createView();
});

Route::set('galerie', function() {
    Gallery::createView();
});

Route::set('menu', function() {
    Menu::createView();
});

Route::set('homeHandler', function() {
    Home::ajaxMethod();
});

Route::set('connexion', function() {
    Connection::createView();
});

Route::set('deconnexion', function() {
    Deconnection::deconnect();
});

Route::set('traiteur', function() {
    Traiteur::createView();
});

Route::set('devis', function() {
    Estimate::createView();
});

Route::set('desabonnement', function() {
    Unsubscribe::createView();
});