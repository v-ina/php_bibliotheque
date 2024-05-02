<?php

include 'header.php';

// checking roles d'utilisateur de maintnant.
// echo $_SESSION['user']['roles'];

$message = 'Vous disposez des droits nécessaires pour y accéder.';
$cssClass = 'success';

?>
    <main>
        <article>
            <h2>Page visiteur</h2>
            <p>Cette page est <strong>accessible à tout le monde</strong> (visiteurs anonymes, utilisateurs, et administrateurs).</p>
            <p class="<?= $cssClass ?>"><?= $message ?></p>
        </article>
    </main>
<?php

include 'footer.php';

?>