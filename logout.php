<?php
    require_once './config.php';
    require_once './session.php';
    Session::init();
    session_destroy();
    header('Location: ' . URL);
?>