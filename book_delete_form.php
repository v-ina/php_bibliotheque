<?php

include 'header.php';

$hasError = false;
$errMsg = "";

if (empty($_GET) || "" === trim($_GET['id'])) {
    $hasError = true;
    $errMsg = "Une erreur est survenue : la page demandée n'existe pas";
} else {
    /* Récupération de l'identifiant du livre à supprimer */
    $id = $_GET['id'];
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
    </main>
    <?php

} else {

    ?>
    <main>
        <h2>Suppression d'un livre</h2>
        <form id="book-delete-form" action="book_delete.php" method="post">
            <fieldset>
                <legend>Formulaire de suppression d'un livre</legend>
                <p>Êtes-vous sûr de vouloir supprimer ce livre ?</p>
                <div class="buttons-only">
                    <input id="id" name="id" type="hidden" value="<?= $id ?>" required="required">
                    <input id="delete" name="delete" type="submit" value="Oui, je confirme la suppression" class="info">
                    <input id="cancel" name="cancel" type="reset" value="NON !" class="error">
                </div>
            </fieldset>
        </form>
        <p><a href="index.php" title="Retour à la liste des livres">Retour à la liste des livres</a></p>
    </main>
    <?php
}

include 'footer.php';

?>