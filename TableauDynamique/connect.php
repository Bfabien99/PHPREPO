<?php
    $dsn = 'mysql:dbname=immobilier;host=localhost';
    $user = 'root';
    $password = '';
    $pdo = new PDO($dsn, $user, $password ,[
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
]);

    if (!$pdo) 
    {
        die ("Ooops! Something went wrong... Could not connect to database");
    }
?>