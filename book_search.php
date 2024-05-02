<?php

include 'header.php';

$hasError = false;
$errMsg = "";

/* Fonction auxiliaire */
function truncateText(string $text, int $size): string
{
    $truncatedText = substr($text, 0, strrpos(substr($text, 0, $size), ' ')) . '...';
    return $truncatedText;
}

if (empty($_POST) || "" === trim($_POST['keywords'])) {
    $hasError = true;
    $errMsg = "Une erreur est survenue : la page demandée n'existe pas";
} else {
    /* Récupération des mots-clés de la recherche */
    $keywords = $_POST['keywords'];

    /* Connexion à la base de données (À MODIFIER) */
    $user = "root";
    $pass = "";
    $dbh = new PDO('mysql:host=localhost;dbname=bibliotheque', $user, $pass);

    /* Définition de la requête MySQL */
    $query = "SELECT id, titre, resume, annee ";
    $query .= "FROM livre ";
    $query .= "WHERE titre  LIKE '%$keywords%' ";
    $query .= "OR resume LIKE '%$keywords%'";

    /* Exécution de la requête */
    $result = $dbh->query($query);

    /* Récupération du résultat de la requête */
    $book = $result->fetch(PDO::FETCH_ASSOC);

    /* Traitement du résultat de la requête */
    if (!$book) {
        $hasError = true;
        $errMsg = "Votre recherche n'a donné aucun résultat...";
    } else {
        $htmlTable = "";
        foreach ($result as $value) {
            $titre = stripslashes($value['titre']);
            $resume = truncateText(stripslashes($value['resume']), 100);
            $htmlTable .= "<tr>";
            $htmlTable .= "<td>{$value['id']}</td>";
            $htmlTable .= "<td>$titre</td>";
            $htmlTable .= "<td class=\"half\">$resume</td>";
            $htmlTable .= "<td>{$value['annee']}</td>";
            $htmlTable .= "</tr>";
        }
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
            <p><a href="book_search_form.php" title="Retour au formulaire de recherche de livres">Retour au formulaire de recherche de livres</a></p>
        </article>
    </main>
    <?php

} else {

    ?>
    <main>
        <article>
            <h2>Résultat(s) de la recherche</h2>
            <table>
                <tr>
                    <th>id</th>
                    <th>Titre</th>
                    <th class=\"half\">Résumé</th>
                    <th>Année</th>
                </tr>
                <?= $htmlTable ?>
            </table>
            <p><a href="book_search_form.php" title="Retour au formulaire de recherche de livres">Retour au formulaire de recherche de livres</a></p>
        </article>
    </main>
    <?php
}

include 'footer.php';

?>