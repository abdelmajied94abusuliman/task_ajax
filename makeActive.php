<?php require("./config.php") ?>
<?php

session_start();

$id = $_POST['id'];

$sql = "UPDATE users SET `status`='Active' WHERE `id`='$id'";
$connect->query($sql);
header('location:http://localhost/CSC/adminDash.php');