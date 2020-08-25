'use strict';

document.addEventListener('DOMContentLoaded', loaded);

function loaded() {

    //Ce fichier est utlisé pour gérer la connexion et l'inscription d'un utilisateur uniquement 

    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx         VARIABLES         xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx

    //On initialise ces variables ici pour les utiliser dans différentes fonctions
    var firstName = '';
    var lastName = '';
    var email = '';
    var password = '';
    var phone = '';

    var connectEmail = '';
    var connectPassword = '';

    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx         FONCTIONS         xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx

    //Function qui change le formulaire de connexion en formulaire d'inscription
    function onClickSignIn(e) {

        //On remplace le HTML, la methode animate permet de faire une transition au changement
        $('#connection form').animate({'opacity': 0}, 500, function() {
            
            $('#connectForm').addClass('hidden');
            $('#registerForm').removeClass('hidden');
        }).animate({'opacity' : 1}, 500);
    }

    //Idem mais passe d'inscription à connexion
    function onClickConnect(e) {

        $('#connection form').animate({'opacity': 0}, 500, function() {
            
            $('#registerForm').addClass('hidden');
            $('#connectForm').removeClass('hidden');
        }).animate({'opacity' : 1}, 500);
    }

    //A chauqe keyUp la fonctiopn récupère les valeurs de tous les champs de l'inscription
    function onKeyUpRegisterInput() {

        firstName = $('#first_name').val();
        lastName = $('#last_name').val();
        email = $('#e-mail').val();
        password = $('#password').val();
        phone = $('#phone').val();
    }

    //Idem pour les champs de connexion
    function onKeyUpConnectInput() {

        connectPassword = $('#connectPassword').val();
        connectEmail = $('#connectEmail').val();

    }

    //On vérifie si tous les champs sont correctement remplis pour l'inscription
    function onClickCheckRegister(e) {

        //Si au moins un des champs est vide on empeche la soumission du formulaire
        if (!firstName || !lastName || !email || !password || !phone ) {
            e.preventDefault();
        }

        //Pour chaque champ on ajoute une classe et un texte pour prevenir l'utilisateur de l'erreur
        if (!firstName) {

            $('#first_name').addClass('emptyField').after('<small><span>Ce champ doit être rempli</span></small>');
        }

        if (!lastName) {

            $('#last_name').addClass('emptyField').after('<small><span>Ce champ doit être rempli</span></small>');
        }

        if (!email) {

            $('#e-mail').addClass('emptyField').after('<small><span>Ce champ doit être rempli</span></small>');
        }

        if (!password) {

            $('#password').addClass('emptyField').after('<small><span>Ce champ doit être rempli</span></small>');
        }

        if (!phone) {

            $('#phone').addClass('emptyField').after('<small><span>Ce champ doit être rempli</span></small>');
        }
    }

    //Idem pour la connexion
    function onClickCheckConnect(e) {

        //Si au moins un des champs est vide on empeche la soumission du formulaire
        if (!connectEmail || !connectPassword) {
            e.preventDefault();
        }

        //Pour chaque champ on ajoute une classe et un texte pour prevenir l'utilisateur de l'erreur
        if (!connectEmail) {

            $('#connectEmail').addClass('emptyField').after('<small><span>Ce champ doit être rempli</span></small>');
        }

        if (!connectPassword) {

            $('#connectPassword').addClass('emptyField').after('<small><span>Ce champ doit être rempli</span></small>');
        }
    }

    //On réinitialise l'état du champ cliqué 
    function onCLickResetState() {
        $(this).removeClass('emptyField');
        $(this).next().remove();
    }

    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx          GLOBAL           xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx

    //Au click d'un bouton on appelle la fonction attachée
    $('#connection article').on('click', '.formRight', onClickSignIn);
    $('#connection article').on('click', '.formLeft', onClickConnect);

    //Listener qui récupère les valeurs de tous les champs lorsqu'au moinsun d'eux est utilisé
    $('#connection form').on('keyup', '.connectInput', onKeyUpConnectInput);
    //Listener qui vérifie que tous les champs soit rempmlis au click du bouton submit
    $('#connection form').on('click', '#connectSubmit', onClickCheckConnect);
    //Si les champs n'étaient pas correctement remplis, lorsque l'on clique à nouveau sur un champ son style se reinitialise
    $('#connection form').on('click', '.connectInput', onCLickResetState);

    //Idem que pour les trois listeners dessus
    $('#connection form').on('keyup', '.registerInput', onKeyUpRegisterInput);
    $('#connection form').on('click', '#registerSubmit', onClickCheckRegister);
    $('#connection form').on('click', '.registerInput', onCLickResetState);
}