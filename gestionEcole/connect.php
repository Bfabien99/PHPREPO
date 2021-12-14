<?php 
    error_reporting(E_ALL);
    ini_set('display_errors', true);
    $connection =new mysqli('localhost','root','','ecole');

    if(!$connection){
        die(mysqli_error($connection));
    }
    else {
        echo "success";
    }
?>