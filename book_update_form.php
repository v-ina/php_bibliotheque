<?php

include 'header.php';

$hasError = false;
$errMsg = "";

if (empty($_GET) || "" === trim($_GET['id'])) {
    $hasError = true;
    $errMsg = "Une erreur est survenue : la page demandée n'existe pas";
} else {
    /* Récupération de l'identifiant du livre à modifier */
    $id = $_GET['id'];

    /* Connexion à la base de données (À MODIFIER) */
    $user = "root";
    $pass = "";
    $dbh = new PDO('mysql:host=localhost;dbname=bibliotheque', $user, $pass);

    /* Définition de la requête MySQL */
    $query = "SELECT id, isbn, titre, resume, annee, auteur_id ";
    $query .= "FROM livre ";
    $query .= "WHERE id=$id ";

    /* Exécution de la requête */
    $result = $dbh->query($query);

    /* Récupération du résultat de la requête */
    $book = $result->fetch(PDO::FETCH_ASSOC);

    /* Traitement du résultat de la requête */
    if (!$book) {
        $hasError = true;
        $errMsg = "Une erreur est survenue : le livre n'existe pas...";
    } else {
        extract($book); // Voir https://www.php.net/manual/fr/function.extract.php
        $titre = stripslashes($titre);
        $resume = stripslashes($resume);
    }
}

$message = '';
if ($hasError) {
    $message .= '<ul class="error">';
    $message .= '<li>' . $errMsg . '</li>';
    $message .= '</ul>';

    ?>
    <main>
        <article>
            <h2 class="txt-error">Erreur !</h2>
            <p><?= $message ?></p>
            <p><a href="index.php" title="Retour à la liste des livres">Retour à la liste des livres</a></p>
        </article>
    </main>
    <?php

} else {

    ?>
    <main>
        <h2>Modification d'un livre</h2>
        <form id="book-update-form" action="book_update.php" method="post">
            <fieldset>
                <legend>Formulaire de modification d'un livre</legend>
                <div>
                    <label id="lbl_isbn" for="isbn" class="required">ISBN<sup></sup></label>
                    <input id="isbn" name="isbn" type="text" value="<?= $isbn ?>" required="required">
                </div>
                <div>
                    <label id="lbl_titre" for="titre" class="required">Titre<sup></sup></label>
                    <input id="titre" name="titre" type="text" value="<?= $titre ?>" required="required">
                </div>
                <div>
                    <label id="lbl_resume" for="resume" class="required">Résumé<sup></sup></label>
                    <textarea id="resume" name="resume" required="required"><?= $resume ?></textarea>
                </div>
                <div>
                    <label id="lbl_annee" for="annee" class="required">Année de publication<sup></sup></label>
                    <input id="annee" name="annee" type="number" value="<?= $annee ?>" required="required">
                </div>
                <div>
                    <label id="lbl_auteur_id" for="auteur_id" class="required">Identifiant de
                        l'auteur<sup></sup></label>
                    <input id="auteur_id" name="auteur_id" type="number" value="<?= $auteur_id ?>" required="required">
                </div>
                <div>
                    <label></label>
                    <input id="id" name="id" type="hidden" value="<?= $id ?>" required="required">
                    <input id="update" name="update" type="submit" value="Modifier le livre" class="info">
                    <input id="reset" name="reset" type="reset" value="Annuler" class="error">
                </div>
            </fieldset>
        </form>
        <p><a href="index.php" title="Retour à la liste des livres">Retour à la liste des livres</a></p>
    </main>
    <?php

}

include 'footer.php';

?>