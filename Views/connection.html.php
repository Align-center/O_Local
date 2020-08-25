<main id='connection'>

    <article class='container'>

        

        <form action="" method="POST">

            <div id='connectForm'>

                <button type='button' class='formLeft active'>Se connecter</button><!--
                --><button type='button' class='formRight inactive'>S'inscrire</button>

                <?php foreach ($errors as $error): ?>

                    <p class='formError'><?= $error ?></p>
                <?php endforeach; ?>
                    <p class='success'><?=$success?></p>
                <fieldset>

                    <label for="connectEmail">Adresse e-mail : </label>
                    <input type="email" name="connectEmail" id="connectEmail" class='connectInput'>
                </fieldset>

                <fieldset>

                    <label for="connectPassword">Mot de passe :</label>
                    <input type="password" name="connectPassword" id="connectPassword" class='connectInput'>
                </fieldset>

                <input type="submit" value="Se connecter" name='submit' id='connectSubmit'>
            </div>

            <div id='registerForm' class='hidden'>

                <button type='button' class='formLeft inactive'>Se connecter</button><!--
                --><button type='button' class='formRight active'>S'inscrire</button>

                    <fieldset>

                        <fieldset>

                            <label for="last_name">Nom</label>
                            <input type="text" name="last_name" id="last_name" class="registerInput">
                        </fieldset>

                        <fieldset>

                            <label for="first_name">Prénom</label>
                            <input type="text" name="first_name" id="first_name" class="registerInput">
                        </fieldset>
                    </fieldset>

                    <fieldset>

                        <fieldset>

                            <label for="e-mail">E-mail</label>
                            <input type="email" name="e-mail" id="e-mail" class="registerInput">
                        </fieldset>

                        <fieldset>

                            <label for="password">Mot de passe</label>
                            <input type="password" name="password" id="password" class="registerInput">
                        </fieldset>
                    </fieldset>

                    <fieldset id='phoneField'>

                        <label for="phone">Téléphone</label>
                        <input type="text" name="phone" id="phone" class="registerInput">
                    </fieldset>

                    <fieldset>

                        <input type="checkbox" name="newsletter" id="newsletter" value='1'>
                        <label for="newsletter">J'accepte de recevoir des mails de Ô Local pour m'informer de nouveautées</label>
                    </fieldset>

                    <input type="submit" value="S'inscrire" name='submit' id='registerSubmit'>
                </div>
        </form>
    </article>
</main>

<script src="./src/js/connect.js"></script>