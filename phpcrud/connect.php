<?php 

    $connection =new mysqli('localhost','root','','inscription');

    if(!$connection){
        die(mysqli_error($connection));
    }
    
?>