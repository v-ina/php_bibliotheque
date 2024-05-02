<?php

include 'header.php';

$message = '';
$cssClass = '';

if (!empty($_SESSION['user']) && !empty($_SESSION['user']['roles']) && ROLE_ADMIN === $_SESSION['user']['roles']) {
    $message = 'Vous disposez des droits nécessaires pour y accéder.';
    $cssClass = 'success';
} else {
    $message = 'Vous n\'avez pas accès à cette page.';
    $cssClass = 'error';
}

?>
    <main>
        <article>
            <h2>Page administrateur</h2>
            <p>Cette page est uniquement <strong>accessible aux administrateurs</strong>.</p>
            <p class="<?= $cssClass ?>"><?= $message ?></p>
        </article>
    </main>
<?php

include 'footer.php';

?>