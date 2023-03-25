<?php require("./config.php") ?>
<?php

$email = $_POST['email'];
$password = $_POST['password'];


$errors = array();

if (empty($email)) {
    $errors[] = "Error : Invalid login";
}

if (empty($password)) {
    $errors[] = "Error : Invalid login";
}



if (empty($errors)) {
    $pass = sha1($password);
    $pass = htmlspecialchars($pass, ENT_QUOTES);
    $sql = "SELECT * FROM users WHERE email = ? AND password = ?";
    $query = $connect->prepare($sql);
    $query->execute([$email , $pass]);
    if($query->rowCount() > 0){
        $row = $query->fetch(PDO::FETCH_ASSOC);
        if($row['status'] == 'Inactive'){
            $alert[] = 'Alert : ';
            echo implode($alert);
        } else {
            session_start();
            $_SESSION['email'] = $email;
            $_SESSION['admin'] = $row['is_admin'];
            $_SESSION['id'] = $row['id'];
            $success[] = $row['is_admin'];
            echo implode("<br>", $success);
        }
    } else {
        $errors[] = "Error : Wrong Pass login";
        echo implode("<br>", $errors);
    }
} else {
    echo implode("<br>", $errors);
}
?>
