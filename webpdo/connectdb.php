<?php
    $dsn = 'mysql:dbname=data;host=127.0.0.1';
    $user = 'root';
    $password = '';
    $pdo = new PDO($dsn, $user, $password ,[
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
]);

    if (!$pdo) 
    {
        die ("Ooops! Something went wrong... Could not connect to database");
    }
?>