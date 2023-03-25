<?php require("./config.php") ?>
<?php

session_start();

$id = $_POST['id'];

$sql = "DELETE FROM users WHERE id='$id';";
$query = $connect->prepare($sql);
$query->execute();
header('location:http://localhost/CSC/adminDash.php');