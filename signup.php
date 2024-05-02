<?php

include 'header.php';

// logging error => C:\xampp\apache\logs\error.log
// ini_set('error_reporting', E_ALL);
// ini_set('log_errors', 'On');
// ini_set('error_log', '/path/to/your/error.log');

if (
    empty($_POST['nom']) &&
    empty($_POST['prenom']) &&
    empty($_POST['password'])
) {
    $message = 'Erreur : les champs obligatoires du formulaire sont vides.';
} elseif (empty($_POST['nom'])) {
    $message = 'Erreur : le champ "nom" du formulaire est vide.';
} elseif (empty($_POST['prenom'])) {
    $message = 'Erreur : le champ "prenom" du formulaire est vide.';
} elseif (empty($_POST['password'])) {
    $message = 'Erreur : le champ "Mot de passe" du formulaire est vide.';
} elseif (empty($_POST['email'])) {
    $message = 'Erreur : le champ "E-mail" du formulaire est vide.';
} else {
    /* Récupération des données saisies par l'utilisateur */
    $nom = $_POST['nom'];
    $prenom = addslashes($_POST['prenom']);
    $pseudo = $_POST['pseudo'] ? addslashes($_POST['pseudo']) : '';
    $email = $_POST['email'];
    $password = $_POST['password'];
    $apropos = $_POST['apropos'] ? $_POST['apropos'] : '';
    $message = '';

    /* Connexion à la base de données (À MODIFIER) */
    $user = "root";
    $pass = "";
    $dbh = new PDO('mysql:host=localhost;dbname=bibliotheque', $user, $pass);

    $query = "
        IF NOT EXISTS (
            SELECT 1
            FROM information_schema.tables
            WHERE table_schema = 'bibliotheque' AND table_name = 'user'
        ) THEN
            CREATE TABLE user (
                id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
                nom VARCHAR(100),
                prenom VARCHAR(100),
                pseudo VARCHAR(100),
                email VARCHAR(255),
                password VARCHAR(255),
                apropos TEXT,
                role VARCHAR(100)
                
            );
        END IF;
        
        INSERT INTO `bibliotheque`.`user` (nom, prenom, pseudo, email, password, apropos, role)
        VALUES ('$nom', '$prenom', '$pseudo', '$email', '$password', '$apropos', 'user')
    ";

    /* Exécution de la requête */
    $result = $dbh->exec($query);

    /* Traitement du résultat de la requête */
    $message = ($result !== 1) ? "Ajout d'utilisateur réussi avec succès." : "L'ajout d'utilisateur n'a pas pu aboutir.";
}

?>
    <main>
        <article>
            <h2>Confirmation de l'ajout d'utilisateur <?= $nom ?> <?= $prenom ?></h2>
            <p><?= $message ?></p>
            <p><a href="index.php" title="Retour à la liste des livres">Retour à la liste des livres</a></p>
        </article>
    </main>
<?php

include 'footer.php';

?>