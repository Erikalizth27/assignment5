<?php
    $dsn = 'mysql:host=mysql01.ucs.njit.edu;dbname=elr22';
    $username = 'elr22';
    $password = 'DCPdrQfW';
    try {
        $db = new PDO($dsn, $username, $password);
        // echo "Connected successfully<br>";
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        echo "Error<br>";
        include('../errors/database_error.php');
        exit();
    }
?>