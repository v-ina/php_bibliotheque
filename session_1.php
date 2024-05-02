<?php

session_start();
echo 'Démarrage de la session.<br>';

$_SESSION['compteur'] = 0;
echo 'Exemple de stockage d\'une variable de session.<br>';

if (!empty($_GET['redirect'])) {
    echo 'Vous avez été redirigé vers cette page.';
}

// 세션을 시작함
// compteur의 값을 0로 만듬. 
// redirect의 값이 무엇인가가 있다면  'Vous avez été redirigé vers cette page.' 메세지를 출력함
