<?php require("./config.php") ?>
<?php

$id = $_GET['id'];

$sql = "SELECT *
        FROM users u
        WHERE NOT EXISTS (SELECT user_id
        FROM stu_crs
        WHERE stu_crs.user_id = u.id
        AND stu_crs.course_id = '$id');";
$query = $connect->prepare($sql);
$query->execute();
while($fetchAllUsers = $query->fetchAll(PDO::FETCH_ASSOC)){
    echo json_encode($fetchAllUsers); 
}