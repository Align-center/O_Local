<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ô Local - <?= $pageTitle ?></title>

    <!-- Import -->

    <link href="https://fonts.googleapis.com/css?family=Karma&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i&display=swap" rel="stylesheet">

    <script src="https://kit.fontawesome.com/24808d1de8.js" crossorigin="anonymous"></script>

    <!-- JQUERY -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

    <!-- JQUERY UI -->
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

    <!-- OWL CAROUSEL -->
    <link rel="stylesheet" href="./src/css/owlSlider/owl.carousel.css">
    <link rel="stylesheet" href="./src/css/owlSlider/owl.theme.default.css">

    <!-- JS -->

    <script src="./src/js/script.js"></script>

    <!-- CSS -->

    <link rel="stylesheet" type='text/css' href="./src/css/normalize.css">
    <link rel="stylesheet" type='text/css' href="./src/css/main.css">

</head>
<body>
    <header>

        <div class='container'>
            <a href='./'>Ô Local</a>

            <button><i class="fas fa-bars"></i></button>
            <nav class='flex'>
                <a href="./">Accueil</a>
                <a href="./menu">Menu</a>

                <!-- Si l'utilisateur est connecté le lien n'a pas d'id est n'ouvrira pas la modal -->
                <?php if (isset($_SESSION['user'])): ?>

                    <a href="./traiteur">Traiteur</a>
                <?php else: ?>

                    <a href="#" id='modalLink'>Traiteur</a>
                <?php endif; ?>

                
                <a href="./galerie">Galerie</a>
                <a href="./contact">Contact</a>

                <?php if (isset($_SESSION['user'])): ?>
                
                    <a href="./deconnexion" id="deconnect">Se déconnecter</a>
                <?php else: ?>

                    <a href="./connexion" class="connect">Se connecter</a>
                <?php endif; ?>
            </nav>
        </div>
    </header>

    <?= $pageContent ?>

    <div id='catererModal' class='hidden'>
        <div>

            <i class="fas fa-times"></i>

            <h2>Accès impossible</h2>

            <p>Pour accéder au contenu de la page traiteur, vous devez vous connecter ou vous inscrire</p>

            <a href="./connexion" class='connect'>Se connecter</a>
        </div>
    </div>

    <footer>

        <nav class='flex'>

            <a href="./">Accueil</a>
            <a href="./menu">Menu</a>
            <a href="#">Traiteur</a>
            <a href="./galerie">Galerie</a>
            <a href="contact">Contact</a>
        </nav>

        <h2>Ô Local</h2>

        <hr>

        <small><a href="./desabonnement">Se désabonner de la newsletter</a></small>
        <small>Réalisé par <a href="#">Text-align : center</a>. Tous droits réservés. 2020 </small>
    </footer>
</body>
</html>