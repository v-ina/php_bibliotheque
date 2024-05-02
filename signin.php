<?php

include 'header.php';

if(!isset($_SESSION)){
    session_start();
}

if (
    empty($_POST['email']) &&
    empty($_POST['password'])
) {
    $message = 'Erreur : les champs obligatoires du formulaire sont vides.';
} elseif (empty($_POST['email'])) {
    $message = 'Erreur : le champ "email" du formulaire est vide.';
} elseif (empty($_POST['password'])) {
    $message = 'Erreur : le champ "Mot de passe" du formulaire est vide.';
} else {
    /* Récupération des données saisies par l'utilisateur */
    $email = $_POST['email'];
    $password = $_POST['password'];
    $message = '';


    /* Connexion à la base de données (À MODIFIER) */
    $user = "root";
    $pass = "";
    $dbh = new PDO('mysql:host=localhost;dbname=bibliotheque', $user, $pass);

    /* Définition de la requête MySQL */
    $query = "
        SELECT * FROM `user` WHERE email = '$email' AND password = '$password'
    ";  
    /* Exécution de la requête */
    $result = $dbh->query($query);
    $userInfo = $result->fetchAll();
    
    foreach($userInfo as $row){
        $nom = $row['nom'];
        $prenom = $row['prenom'];
        $role = $row['role'];
    }

    /* Traitement du résultat de la requête */
    $message = (count($userInfo) === 1) ? "Connexion d'utilisateur réussi avec succès. <br> Bonjour, $nom $prenom ?" : "On peut pas trouver utilisateur.";

    if(count($userInfo) === 1){
        $_SESSION['user']['is_logged'] = true;
        $currentRole = 'ROLE_USER';
        $_SESSION['user']['roles'] = $currentRole;
        
        if($role === 'admin'){
            $currentRole = 'ROLE_ADMIN';
            $_SESSION['user']['roles'] = $currentRole;
        }
        $_SESSION['user']['first_name'] = $prenom;
        $_SESSION['user']['last_name'] = $nom;

    } else {
        $_SESSION['user']['is_logged'] = false;
    }
}

?>
    <main>
        <article>
            <h2>Confirmation de Connexion d'utilisateur</h2>
            <p><?= $message ?></p>
            <p><a href="./signin_form.php" title="Retour à la page de connexion">Retour à la page de connexion</a></p>
            <?php
                if(count($userInfo) === 1){
                    echo "
                        <p><a href=\"session_4.php\"  >Log out</a></p>
                    
                    ";


                }
            ?>
        </article>
    </main>
<?php

include 'footer.php';

?>