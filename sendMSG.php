<?php require("./config.php") ?>
<?php

session_start();

$id = $_SESSION['id'];
$reciverID = $_POST['reciverID'];
$content = $_POST['content'];

echo $content ;

if( $content != "" ){
    $sql = "INSERT INTO messages (user_id, reciver_id, content)
        VALUES (?, ?, ?);";
    $query = $connect->prepare($sql);
    $query->execute([$id , $reciverID , $content]);
}