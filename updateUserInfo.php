<?php require("./config.php") ?>
<?php

session_start();

$username = $_POST['username'];
$email = $_POST['email'];
$id = $_POST['id'];
$old_email = $_POST['old_email'];
$old_username = $_POST['old_username'];

$errors = array();



if (empty($username)) {
    $errors[] = "Error : Name is required";
}
if (strlen($username)<8) {
    $errors[] = "Error : Name must be more than 8 letter";
}
  
if (empty($email)) {
$errors[] = "Error : Email is required";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
$errors[] = "Error : Invalid email format";
}



if (empty($errors)) {

    $select_user = $connect->prepare("SELECT * FROM `users` WHERE email = ?");
    $select_user->execute([$email]);
    $row = $select_user->fetch(PDO::FETCH_ASSOC);
    
    if($old_email == $email){

        if( $old_username == $username ){
            $errors[] = 'Error : There is nothing to update!';
            echo implode("<br>", $errors);
        } else {
            $select_user_by_username = $connect->prepare("SELECT * FROM `users` WHERE username = ?");
            $select_user_by_username->execute([$username]);
            $row = $select_user_by_username->fetch(PDO::FETCH_ASSOC);
            
            if ($select_user_by_username->rowCount() > 0){
                $errors[] = 'Error : Username is Already Exists!';
                echo implode("<br>", $errors);
            } else {
                $sql = "UPDATE users SET `username`='$username' WHERE `id`='$id'";
                $query = $connect->prepare($sql);
                $query->execute();
            } 

    }}else if ($select_user->rowCount() > 0){
        $errors[] = 'Error : Email Already Exists!';
        echo implode("<br>", $errors);
    } else {
        if($old_username == $username){
            $sql = "UPDATE users SET `email`='$email' WHERE `id`='$id'";
                $query = $connect->prepare($sql);
                $query->execute();
        } else {            
            $select_user_by_username = $connect->prepare("SELECT * FROM `users` WHERE username = ?");
            $select_user_by_username->execute([$username]);
            $row = $select_user_by_username->fetch(PDO::FETCH_ASSOC);

            if($select_user_by_username->rowCount() > 0){
                $errors[] = 'Error : Username is Already Exists!';
                echo implode("<br>", $errors);
            } else {
                $sql = "UPDATE users SET `username`='$username' , `email`='$email' WHERE `id`='$id'";
                $query = $connect->prepare($sql);
                $query->execute();
            };
        } 
    } } else {
    echo implode("<br>", $errors);
}

