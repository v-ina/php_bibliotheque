<?php

include 'header.php';

if (
    empty($_POST['id']) &&
    empty($_POST['isbn']) &&
    empty($_POST['titre']) &&
    empty($_POST['auteur_id'])
) {
    $message = 'Erreur : les champs obligatoires du formulaire sont vides.';
} elseif (empty($_POST['id'])) {
    $message = 'Erreur : identifiant du livre à modifier inconnu.';
} elseif (empty($_POST['isbn'])) {
    $message = 'Erreur : le champ "ISBN" du formulaire est vide.';
} elseif (empty($_POST['titre'])) {
    $message = 'Erreur : le champ "Titre" du formulaire est vide.';
} elseif (empty($_POST['auteur_id'])) {
    $message = 'Erreur : le champ "Identifiant de l\'auteur" du formulaire est vide.';
} else {
    /* Récupération des données saisies par l'utilisateur */
    $id = $_POST['id'];
    $isbn = $_POST['isbn'];
    $titre = addslashes($_POST['titre']);
    $resume = addslashes($_POST['resume']);
    $annee = $_POST['annee'];
    $auteurId = $_POST['auteur_id'];
    $message = '';

    /* Connexion à la base de données (À MODIFIER) */
    $user = "root";
    $pass = "";
    $dbh = new PDO('mysql:host=localhost;dbname=bibliotheque', $user, $pass);

    /* Définition de la requête MySQL */
    $query = "UPDATE livre ";
    $query .= "SET isbn='$isbn', titre='$titre', resume='$resume', annee='$annee', auteur_id='$auteurId' ";
    $query .= "WHERE id = $id";

    /* Exécution de la requête */
    $result = $dbh->exec($query);

    /* Traitement du résultat de la requête */
    $message = ($result === 1) ? "Modification du livre réussie avec succès." : "La modification du livre n'a pas pu aboutir.";
}

?>
    <main>
        <article>
            <h2>Confirmation de la modification du livre</h2>
            <p><?= $message ?></p>
            <p><a href="index.php" title="Retour à la liste des livres">Retour à la liste des livres</a></p>
        </article>
    </main>
<?php

include 'footer.php';

?>