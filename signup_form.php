<?php

include 'header.php';

?>
    <main>
        <h2>Formulaire d'inscription</h2>
        <form id="user-create-form" action="./signup.php" method="post">
            <fieldset>
                <legend>Formulaire d'ajout d'un utilisateur</legend>
                <div>
                    <label id="lbl_nom" for="nom" class="required">Nom<sup></sup></label>
                    <input id="nom" name="nom" type="text" required="required">
                </div>
                <div>
                    <label id="lbl_prenom" for="prenom" class="required">Prenom<sup></sup></label>
                    <input id="prenom" name="prenom" type="text" required="required">
                </div>
                <div>
                    <label id="lbl_pseudo" for="pseudo">Pseudo<sup></sup></label>
                    <input id="pseudo" name="pseudo" type="text">
                </div>
                <div>
                    <label id="lbl_email" for="email" class="required">E-mail<sup></sup></label>
                    <input id="email" name="email" type="email" required="required">
                </div>
                <div>
                    <label id="lbl_password" for="password" class="required">Mot de passe<sup></sup></label>
                    <input id="password" name="password" type="text" required="required">
                </div>
                <div>
                    <label id="lbl_apropos" for="apropos">A propos<sup></sup></label>
                    <textarea id="apropos" name="apropos"></textarea>
                </div>
                <div>
                    <label></label>
                    <input id="create" name="create" type="submit" value="Créer l'utisisateur" class="info">
                    <input id="reset" name="reset" type="reset" value="Annuler" class="error">
                </div>
            </fieldset>
        </form>
        <p><a href="index.php" title="Retour à la liste des livres">Retour à la liste des livres</a></p>
    </main>
<?php

include 'footer.php';

?>