<?php require("./config.php") ?>
<?php

$id = $_GET['id'];

$sql = "SELECT *
FROM users u
LEFT JOIN stu_crs ON u.id = stu_crs.user_id WHERE stu_crs.course_id = '$id' AND mark = 0";
$query = $connect->prepare($sql);
$query->execute();
while($fetchAllUsers = $query->fetchAll(PDO::FETCH_ASSOC)){
    echo json_encode($fetchAllUsers); 
}