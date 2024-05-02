<?php

session_start();
echo 'Démarrage de la session.<br>';

if (!isset($_SESSION['compteur'])) {
    header('Location: session_1.php?redirect=1');
}

$_SESSION['compteur'] = $_SESSION['compteur'] + 1;
echo 'Exemple d\'utilisation d\'une variable stockée en session.<br>';
echo 'Valeur de la variable <code>compteur</code> : ' . $_SESSION['compteur'];


// 세션을 시작함
// compteur가 변수값이 무엇인가 있는지 확인. 없다면 session_1.php?redirect=1 로 이동. 
// (session1로 이동하면서 redirect에 1이라는 값을 줌)
// compteur의 값을 1씩 증가시킴
// compteur의 값을 보여줌.
