<?php

include 'header.php';

$hasError = false;
$errMsg = "";

if (empty($_POST) || "" === trim($_POST['id'])) {
    $hasError = true;
    $errMsg = "Une erreur est survenue : la page demandée n'existe pas";
} else {
    /* Récupération de l'identifiant du livre à supprimer */
    $id = $_POST['id'];
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
        <article>
            <h2>Confirmation de la suppression du livre</h2>
            <?php

            /* Connexion à la base de données (À MODIFIER) */
            $user = "root";
            $pass = "";
            $dbh = new PDO('mysql:host=localhost;dbname=bibliotheque', $user, $pass);

            /* Définition de la requête MySQL */
            $query = "DELETE FROM livre WHERE id=$id";

            /* Exécution de la requête */
            $result = $dbh->exec($query);

            /* Traitement du résultat de la requête */
            $message = ($result === 1) ? "Suppression du livre réussi avec succès." : "La suppression du livre n'a pas pu aboutir.";

            ?>
            <p><?= $message ?></p>
            <p><a href="index.php" title="Retour à la liste des livres">Retour à la liste des livres</a></p>
        </article>
    </main>
    <?php
}

include 'footer.php';
?>