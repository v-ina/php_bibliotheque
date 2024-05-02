<?php

include 'header.php';

/* Fonction auxiliaire */
function truncateText(string $text, int $size): string
{
    $truncatedText = substr($text, 0, strrpos(substr($text, 0, $size), ' ')) . '...';
    return $truncatedText;
}

/* Connexion à la base de données (À MODIFIER) */
$user = "root";
$pass = "";
$dbh = new PDO('mysql:host=localhost;dbname=bibliotheque', $user, $pass);

/* Définition de la requête MySQL */
$query = "SELECT id, titre, resume, annee ";
$query .= "FROM livre ";
$query .= "ORDER BY titre ASC ";

/* Exécution de la requête */
$result = $dbh->query($query);


/* Traitement du résultat de la requête */
$htmlTable = "";
foreach ($result as $value) {
    $opPicto = '<li><a href="book_read.php?id=' . $value['id'] . '" title="Détail du livre"><img class="crud-picto" src="./assets/picto/eye-pink.svg"></a></li>';
    if(isset($_SESSION['user']['roles']) && $_SESSION['user']['roles'] === 'ROLE_ADMIN'){
        $opPicto .= '<li><a href="book_update_form.php?id=' . $value['id'] . '" title="Modifier le livre"><img class="crud-picto" src="./assets/picto/pen-pink.svg"></a></li>';
        $opPicto .= '<li><a href="book_delete_form.php?id=' . $value['id'] . '" title="Supprimer le livre"><img class="crud-picto" src="./assets/picto/trash-can-pink.svg"></a></li>';
    
    }
    $titre = stripslashes($value['titre']);
    $resume = truncateText(stripslashes($value['resume']), 100);
    $htmlTable .= "<tr>";
    $htmlTable .= "<td>{$value['id']}</td>";
    $htmlTable .= "<td>{$titre}</td>";
    $htmlTable .= "<td class=\"half\">{$resume}</td>";
    $htmlTable .= "<td>{$value['annee']}</td>";
    $htmlTable .= "<td><ul class=\"operation\">$opPicto</ul></td>";
    $htmlTable .= "</tr>";
}

?>
<main>
    <article>
        <h2>Liste des livres<a href="book_create_form.php" title="Créer un livre"><img class="crud-create-picto" src="./assets/picto/circle-plus-pink.svg"></a></h2>
        <table>
            <tr>
                <th>id</th>
                <th>Titre</th>
                <th class=\"half\">Résumé</th>
                <th>Année</th>
                <th>Opération</th>
            </tr>
            <?= $htmlTable ?>
        </table>
    </article>
</main>
<?php

include 'footer.php';

?>