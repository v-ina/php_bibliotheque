<?php

session_start(); 
session_unset();
// session_destroy();

// session destroy n'est pas obligé?
header('location: index.php');
exit();

?>