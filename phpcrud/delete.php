<?php

    require 'connect.php';

    if(isset($_GET['deleteid'])){
        $id = $_GET['deleteid'];

        $sql = "DELETE FROM `etudiant` WHERE id=$id";
        $result=mysqli_query($connection,$sql);

        if(!$result){
            die(mysqli_error($connection));
        } else {
            header("Location:index.php");
        }
    }

?>