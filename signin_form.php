<?php

include 'header.php';

?>
    <main>
        <h2>Formulaire de connexion</h2>
        <form id="user-create-form" action="./signin.php" method="post">
            <fieldset>
                <legend>Formulaire d'ajout d'un utilisateur</legend>
                <div>
                    <label id="lbl_email" for="email" class="required">E-mail<sup></sup></label>
                    <input id="email" name="email" type="email" required="required">
                </div>
                <div>
                    <label id="lbl_password" for="password" class="required">Mot de passe<sup></sup></label>
                    <input id="password" name="password" type="text" required="required">
                </div>
                <div>
                    <label></label>
                    <input id="create" name="create" type="submit" value="Se connecter" class="info">
                    <input id="reset" name="reset" type="reset" value="Annuler" class="error">
                </div>
            </fieldset>
        </form>
        <p><a href="index.php" title="Retour à la liste des livres">Retour à la liste des livres</a></p>
    </main>
<?php

include 'footer.php';

?>