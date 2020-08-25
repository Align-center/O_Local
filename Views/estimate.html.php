<main id='estimate'>

    <img src="./src/img/traiteur/band.jpg" alt="Bandeau de la prestation traiteur">

    <article>
    
        <h1>Demande de devis</h1>

        <form action="" method="POST">
        
            <?php foreach ($errors as $error): ?>

                <p class='formError'><?= $error ?></p>
            <?php endforeach; ?>

            <p class='success'><?= $success ?></p>

            <fieldset>
                <label for="category">Sélectionnez le type de prestation demandée : </label>
                <select name="category" id="category">
                
                <option value="">Prestations</option>
                    <option value="Cocktails">Cocktails</option>
                    <option value="Plateaux repas">Plateau repas</option>
                    <option value="Repas assis">Repas assis</option>
                    <option value="Patisseries">Patisseries</option>
                </select>
            </fieldset>

            <fieldset>
                <label for="people">Nombre de personnes : </label>
                <input type="number" name="people" id="people" max='250'>
            </fieldset>

            <fieldset>
            
                <label for="date">Date prévue :</label>
                <select name="day" id="day">
                
                    <?php for($i = 1; $i <=31; $i++): ?>

                        <?php if ($i < 10): ?>
                            <?php $val = '0'.$i; ?>

                            <option value="<?=$val?>"><?=$val?></option>

                        <?php else:?>

                            <option value="<?= $i ?>"><?= $i ?></option>
                        <?php endif; ?>


                    <?php endfor;?>
                </select>

                <select name="month" id="month">
                
                    <?php for($i = 1; $i < count($months); $i++): ?>

                        <?php if ($i < 10): ?>
                            <?php $val = '0'.$i; ?>

                            <option value="<?=$val?>"><?= $months[$i] ?></option>

                        <?php else:?>

                            <option value="<?= $i ?>"><?= $months[$i]?></option>
                        <?php endif; ?>


                    <?php endfor;?>
                </select>

                <select name="year" id="year">
                
                    <?php for($i = date('Y'); $i <= (date('Y') + 2); $i++): ?>

                        <option value="<?= $i ?>"><?= $i ?></option>
                    <?php endfor;?>
                </select>
            </fieldset>

            <textarea name="comment" id="comment" cols="60" rows="5" placeholder='Commentaire optionnel'></textarea>

            <input type="submit" value="Envoyer">
        </form>
    </article>
</main>