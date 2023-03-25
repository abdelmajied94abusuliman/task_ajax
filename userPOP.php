<?php require("./config.php") ?>
<?php

session_start();

$id = $_GET['id'];

        if(!$_SESSION['email']){
            header('location:http://localhost/CSC/log.php');
        } else {
            $sql = "SELECT * FROM users WHERE id = $id";
            $query = $connect->prepare($sql);
            $query->execute();
            while($fetchAllUsers = $query->fetch(PDO::FETCH_ASSOC)){
                echo json_encode($fetchAllUsers); 
            }
        }