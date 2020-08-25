'use strict';

document.addEventListener('DOMContentLoaded', loaded);

function loaded() {

    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx         VARIABLES         xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx

    //Variables utilisées pour l'affichage de la modal prévenant l'utilisateur qu'il n'est pas connecté pour accéder à la page traiteur
    var modalLink = document.querySelector('#modalLink');
    var catererModal = document.querySelector('#catererModal');
    var modalClose = document.querySelector('.fa-times');
    var body = document.querySelector('body');

    var unsubscribe = document.querySelector('#unsubscribe');

    //Variables utilisées pour le menu burger en reponsive
    var burgerMenu = document.querySelector('header button');
    var nav = document.querySelector('header nav');
    var windowWidth = false;

    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx         FONCTIONS         xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx

    //Au click de la fleche gauche de la page d'accueil, 
    function onClickPrevious(e) {

        //on récupère l'id du contenu affiché
        let id = parseInt(e.target.dataset.id) - 1;
        
        if (id < 1) {
            id = 2;
        }

        //Utilisation d'AJAX pour récupérer l'autre article à afficher 
        $.post (
            './homeHandler',
            {id : id},
            function(data) {

                //On convertir la chaine de caractère json en objet JS
                let content = JSON.parse(data);

                //Affichage du contenu reçu par AJAX, methode animate pour créer une transiiton au changement
                $('#home article div').animate({'opacity': 0}, 300, function() {
                    
                    $('#home article div').html(`
                    <i class="fas fa-chevron-left" data-id='${content.id}'></i>
                    <i class="fas fa-chevron-right" data-id='${content.id}'></i>
            
                    <img src="./src/img/${content.img}" alt="${content.img_alt}">

                    <p>${content.content}</p>
                    `);
                }).animate({'opacity': 1}, 300);

                
                $('#home h2').animate({'opacity': 0}, 300,function() {
                    $('#home h2').text(content.title);
                }).animate({'opacity': 1}, 300);
            }
        )
    }

    //IDEM pour la fleche de droite
    function onClickNext(e) {

        let id = parseInt(e.target.dataset.id) + 1;
        
        if (id > 2) {
            id = 1;
        }

        $.post (
            './homeHandler',
            {id : id},
            function(data) {

                let content = JSON.parse(data);

                $('#home article div').animate({'opacity': 0}, 300, function() {
                    
                    $('#home article div').html(`
                    <i class="fas fa-chevron-left" data-id='${content.id}'></i>
                    <i class="fas fa-chevron-right" data-id='${content.id}'></i>
            
                    <img src="./src/img/${content.img}" alt="${content.img_alt}">

                    <p>${content.content}</p>
                    `);
                }).animate({'opacity': 1}, 300);

                
                $('#home h2').animate({'opacity': 0}, 300,function() {
                    $('#home h2').text(content.title);
                }).animate({'opacity': 1}, 300);
                
            }
        )
    }

    //Au click du lien de la page traiteur, si l'utilisateur n'est pas connecté on affiche la modal, sert aussi à la fermer avec le bouton prévu dans la modal
    function onClickDisplayModal(e) {

        e.preventDefault();

        catererModal.classList.toggle('hidden');
        body.classList.toggle('stopScolling');
    }

    //Affichage de la barre de nav au click de l'icon bars
    function onCLickDisplayNav() {

        nav.classList.toggle('hidden');
    }

    //Si la taille de la fenetre est inférieure ou egale à 750px on cache la barre de nav, on retire le listener qui appelle cette fonction et on active celui qui appelle onResizeShow()
    function onResizeHide() {

        if (window.innerWidth <= 750) {

            windowWidth = true;

            nav.classList.add('hidden');

            window.removeEventListener('resize', onResizeHide);

            window.addEventListener('resize', onResizeShow);
        }
    }

    //Si la taille est supérieure ou égale à 751px, on réaffiche la barre de nav et on échange les listeners
    function onResizeShow() {

        if (window.innerWidth >= 751 && windowWidth) {

            windowWidth = false;

            nav.classList.remove('hidden');

            window.removeEventListener('resize', onResizeShow);

            window.addEventListener('resize', onResizeHide);
        }
    }

    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx          GLOBAL           xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx

    //Listeners sur les fleches de la page d'accueil
    $('.container').on('click', '.fa-chevron-left', onClickPrevious);
    $('.container').on('click', '.fa-chevron-right', onClickNext);

    //On ne met le listener que si l'utilisateur n'est pas connecté 
    if(modalLink) {
        
        modalLink.addEventListener('click', onClickDisplayModal);
    }

    //LA modal étant toujours présente dans le html, on laisse le listener en permanence
    modalClose.addEventListener('click', onClickDisplayModal);

    //Si l'utilisateur se trouve sur la page unsubscribe.html.php on lance le setTimeout qui le redirigera vers la page d'accueil après 7,5secs
    if (unsubscribe) {

        setTimeout(function() {
            
            window.location = './';
        }, 7500);
    }

    burgerMenu.addEventListener('click', onCLickDisplayNav);

    //Si la fenetre fait moins de 750px à l'affichage de la page, on cache la barre de nav et on place un listener qui réaffichera la nav si la page est supérieur ou égale à 751px
    if (window.innerWidth <= 750) {

        nav.classList.add('hidden');

        window.addEventListener('resize', onResizeShow);
    }
    else {

        //Sinon on met le listener qui cache la nav si la page est inférieure ou égale à 750px
        window.addEventListener('resize', onResizeHide);
    }
}