<main id='home'>

    <article class="container">
        <h1>Ô Local</h1>

        <h2 id='test'><?= htmlspecialchars($homeContent['title']) ?></h2>

        <div>
        <i class="fas fa-chevron-left" data-id='<?= htmlspecialchars($homeContent['id']) ?>'></i>
        <i class="fas fa-chevron-right" data-id='<?= htmlspecialchars($homeContent['id']) ?>'></i>
        
            <img src="./src/img/<?= htmlspecialchars($homeContent['img']) ?>" alt="<?= htmlspecialchars($homeContent['img_alt']) ?>">

            <p><?= htmlspecialchars_decode($homeContent['content']) ?></p>
        </div>
        
    </article>
</main>