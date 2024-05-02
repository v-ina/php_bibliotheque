<?php

include 'header.php';

$message = '';
$cssClass = '';

if (!empty($_SESSION['user']) && !empty($_SESSION['user']['roles']) && in_array($_SESSION['user']['roles'], [ROLE_USER, ROLE_ADMIN])) {
    $message = 'Vous disposez des droits nécessaires pour y accéder.';
    $cssClass = 'success';
} else {
    $message = 'Vous n\'avez pas accès à cette page.';
    $cssClass = 'error';
}

?>
    <main>
        <article>
            <h2>Page utilisateur</h2>
            <p>Cette page est <strong>accessible à tous les utilisateurs connectés</strong> (utilisateurs et administrateurs uniquement).</p>
            <p class="<?= $cssClass ?>"><?= $message ?></p>
        </article>
    </main>
<?php

include 'footer.php';

?>