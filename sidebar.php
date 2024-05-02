<?php

function generateSideBar(){
    if(!isset($_SESSION['user']['is_logged']) || !$_SESSION['user']['is_logged']){
        echo "
            <li><a href=\"signup_form.php\">S'inscrire</a></li>
            <li><a href=\"signin_form.php\">Se connecter</a></li>
        ";
    } else {
        echo "
            <li><a href=''>Connecté</a></li>
            <li><a href=\"signout.php\">Se Déonnecter</a></li>
        ";
    }
}
?>

<!--  c'est normale que j'ai besoin de rafraichir/changer le page pour voir le changerment de sidebar
        si je fais la rediriger comme deconnexion? -->
        <nav>
            <ul>
                <li><a href="index.php">Liste des livres</a></li>
                <li><a href="book_search_form.php">Recherche</a></li>
                <li><a href="page_anonymous.php">Accès visiteur</a></li>
                <li><a href="page_user.php">Accès utilisateur</a></li>
                <li><a href="page_admin.php">Accès administrateur</a></li>
                <?= generateSideBar() ?>
            </ul>
        </nav>