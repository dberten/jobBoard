<?php 
    session_start();
    setcookie("login", "", time()+(86400 * 30));
    $_SESSION = array();
    session_destroy();
    unset($_SESSION);
    header('Location: ../../index.html')
?>