<main id='menu'>

    <section class="container flex">
        
        <h1>Menu du <span><?= htmlspecialchars($date) ?></span></h1>

            <!-- On affiche d'abord tous les produits qui ne sont pas des desserts -->
            <?php foreach ($products as $product): ?>

                <?php if ($product['category'] != 'Dessert'): ?>

                    <article class='flex'>

                        <h3><?= htmlspecialchars($product['category']) ?> du jour</h3>

                        <p><?= ucfirst(htmlspecialchars($product['name'])) ?></p>

                        <p class='price'><?= htmlspecialchars($product['price']) ?>€</p>
                    </article>

                <?php endif; ?>
            <?php endforeach; ?>

            <article class='flex'>

                <h3>Désserts du jour</h3>

                <ul>
                    <!-- On affiche les desserts -->
                    <?php foreach ($products as $product) :?>

                        <?php if ($product['category'] == 'Dessert'): ?>
                            
                            <li><?= htmlspecialchars($product['name']) ?> <span><?= htmlspecialchars($product['price']) ?>€</span></li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </ul>
            </article>
    </section>
</main>