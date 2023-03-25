<?php require("./config.php") ?>
<?php

session_start();

$email = $_SESSION['email'];

$sql = "SELECT * FROM users  INNER JOIN stu_crs on users.id = stu_crs.user_id INNER JOIN courses on stu_crs.course_id = courses.course_id WHERE email = '$email'";
$query = $connect->prepare($sql);
$query->execute();
while($fetchAllUsers = $query->fetchAll(PDO::FETCH_ASSOC)){
    echo json_encode($fetchAllUsers); 
}