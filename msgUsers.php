<?php require("./config.php") ?>
<?php

session_start();

$email = $_SESSION['email'];

$stm = "SELECT * FROM users WHERE email = '$email'";
$querySTMT = $connect->prepare($stm);
$querySTMT->execute();
while($fetchUser = $querySTMT->fetch(PDO::FETCH_ASSOC)){
    if($fetchUser['is_admin'] == 1){
        $adminQuery = "SELECT * FROM users WHERE email <> '$email'";
        $query = $connect->prepare($adminQuery);
        $query->execute();
        while($fetchAllUsers = $query->fetchAll(PDO::FETCH_ASSOC)){
            echo json_encode($fetchAllUsers); 
        }
    } else {
        $sql = "(SELECT id , username , email FROM users WHERE is_admin = 1 ) UNION ( SELECT DISTINCT id , username , email FROM users INNER JOIN stu_crs on users.id = stu_crs.user_id INNER JOIN courses on stu_crs.course_id = courses.course_id WHERE email <> '$email')";
        $query = $connect->prepare($sql);
        $query->execute();
        while($fetchAllUsers = $query->fetchAll(PDO::FETCH_ASSOC)){
            echo json_encode($fetchAllUsers); 
        }
    }
}

