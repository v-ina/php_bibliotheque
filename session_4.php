<?php

session_start();
echo 'Démarrage de la session.<br>';

session_unset();
echo 'Réinitialisation de la session.<br>';

// 세션을 시작함
// 세션은 제거하지 않으면서 세션의 모든 변수를 제거함.