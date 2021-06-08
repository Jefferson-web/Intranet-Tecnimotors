<?php

    include_once './config.php';

    try {
        $pdo = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
    } catch (PDOException $e) {
        echo $e->getMessage();
        die();
    }

?>