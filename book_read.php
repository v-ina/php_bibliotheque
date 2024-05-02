<?php
include 'header.php';

$hasError = false;
$errMsg = "";

if (empty($_GET) || "" === trim($_GET['id'])) {
    $hasError = true;
    $errMsg = "Une erreur est survenue : la page demandée n'existe pas";
} else {
    /* Récupération de l'identifiant du livre à afficher */
    $id = $_GET['id'];

    /* Connexion à la base de données (À MODIFIER) */
    $user = "root";
    $pass = "";
    $dbh = new PDO('mysql:host=localhost;dbname=bibliotheque', $user, $pass);

    /* Définition de la requête MySQL */
    $query = "SELECT livre.id, titre, resume, annee, nom, prenom ";
    $query .= "FROM livre ";
    $query .= "JOIN auteur ";
    $query .= "ON livre.auteur_id = auteur.id ";
    $query .= "WHERE livre.id=$id";

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
    $opPicto = '<li><a href="book_update_form.php?id=' . $id . '" title="Modifier le livre"><img class="crud-picto" src="./assets/picto/pen-pink.svg"></a></li>';
    $opPicto .= '<li><a href="book_delete_form.php?id=' . $id . '" title="Supprimer le livre"><img class="crud-picto" src="./assets/picto/trash-can-pink.svg"></a></li>';
    ?>
    <main>
        <article>
            <h2>Détail du livre <em>« <?= $titre ?> »</em></h2>
            <ul class="read-detail">
                <li><span>id : </span><?= $id ?></li>
                <li><span>Titre : </span><?= $titre ?></li>
                <li><span>Résumé : </span><?= $resume ?></li>
                <li><span>Année de publication : </span><?= $annee ?></li>
                <li><span>Auteur : </span><?= $nom . ' ' . $prenom ?></li>
                <li><span>Opération : </span>
                    <ul class="operation"><?= $opPicto ?></ul>
                </li>
            </ul>
            <p><a href="index.php" title="Retour à la liste des livres">Retour à la liste des livres</a></p>
        </article>
    </main>
    <?php
}

include 'footer.php';
?>