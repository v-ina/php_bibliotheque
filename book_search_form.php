<?php

include 'header.php';

// on peux savoir (!empty($_SESSION['user']) && !empty($_SESSION['user']['roles']) && ... (tout ca ligne 8)
// sans session_start(); parce que le header en a deja?

function generateSearchPage(){
    if (!empty($_SESSION['user']) && !empty($_SESSION['user']['roles']) && in_array($_SESSION['user']['roles'], [ROLE_USER, ROLE_ADMIN])) {
        echo "
            <fieldset>
                <legend>Formulaire de recherche de livres</legend>
                <div>
                    <label id=\"lbl_keywords\" for=\"keywords\" class=\"required\">Mots-clés<sup></sup></label>
                    <input id=\"keywords\" name=\"keywords\" type=\"text\" required=\"required\">
                </div>
                <div>
                    <label></label>
                    <input id=\"search\" name=\"search\" type=\"submit\" value=\"Rechercher\" class=\"info\">
                    <input id=\"reset\" name=\"reset\" type=\"reset\" value=\"Annuler\" class=\"error\">
                </div>
            </fieldset>
        ";
    } else {
        echo "
            <fieldset>
                <legend>Il faut se connecter pour ce service</legend>
            </fieldset>
        ";
        header('Location: index.php');
    }

}

?>
    <main>
        <h2>Recherche de livres</h2>
        <form id="book-search-form" action="book_search.php" method="post">
            <?= generateSearchPage() ?>
        </form>
        <p><a href="index.php" title="Retour à la liste des livres">Retour à la liste des livres</a></p>
    </main>
<?php

include 'footer.php';

?>