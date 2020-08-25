<main id="gallery">

    <section class='container'>

        <article class="owl-carousel owl-theme">

            <!-- Génération dynamique de toutes les images du carousel -->
            <?php foreach ($galleryContent as $content):?>

                <div><img src="./src/img/carousel/<?= htmlspecialchars($content['img_path']) ?>" alt="<?= htmlspecialchars($content['img_alt']) ?>"></div>
            <?php endforeach; ?>
        </article>

        <article>

            <!-- Grid d'image -->
            <img src="./src/img/grid/dish.jpg" alt="Plat servi à table" id="dish">
            <img src="./src/img/grid/kitchen.jpg" alt="Cuisine du restaurant" id="kitchen">
            <img src="./src/img/grid/interior.jpg" alt="Intérieur du restaurant" id="interior">
            <img src="./src/img/grid/wine.jpg" alt="Bouteille de vin" id="wine">
            <img src="./src/img/grid/platter.jpg" alt="Grand plat de nourriture" id="platter">
            <img src="./src/img/grid/vegetables.jpg" alt="Ensemble de légumes d'été" id="vegetables">
            <img src="./src/img/grid/exterior.jpg" alt="Exterieur du restaurant" id="exterior">
            <div id='leftSquare'></div>
            <div id='middleSquare'></div>
            <div id='rightSquare'></div>
        </article>
    </section>

    <script src="./src/js/owl.carousel.js"></script>
    <script src="./src/js/owlSlider.js"></script>
</main>