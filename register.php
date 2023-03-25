<?php require("./config.php") ?>
<?php

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$cpassword = $_POST['cpassword'];



$uppercase = preg_match('@[A-Z]@', $password);
$lowercase = preg_match('@[a-z]@', $password);
$number    = preg_match('@[0-8]@', $password);
$specialChars = preg_match('@[^\w]@', $password);



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

if (empty($password)) {
  $errors[] = "Error : Password is required";
} elseif (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
    $errors[] = 'Error : Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.';
}

if (empty($cpassword)) {
  $errors[] = "Error : Confirm Password is required";
} elseif ($cpassword != $password) {
    $errors[] = 'Error : Password Does not match';
}



if (empty($errors)) {

  $select_user_by_email = $connect->prepare("SELECT * FROM `users` WHERE email = ?");
  $select_user_by_email->execute([$email]);
  $row = $select_user_by_email->fetch(PDO::FETCH_ASSOC);

  if($select_user_by_email->rowCount() > 0){
      $errors[] = 'Error : Email is Already Exists!';
      echo implode("<br>", $errors);
  } else {

    $select_user_by_username = $connect->prepare("SELECT * FROM `users` WHERE username = ?");
    $select_user_by_username->execute([$username]);
    $row = $select_user_by_username->fetch(PDO::FETCH_ASSOC);

    if($select_user_by_username->rowCount() > 0){
        $errors[] = 'Error : Username is Already Exists!';
        echo implode("<br>", $errors);
    } else {
        $pass = sha1($password);
        $pass = htmlspecialchars($pass, ENT_QUOTES);
        $sql = "INSERT INTO users (username, email, password)
                VALUES ('$username', '$email', '$pass');";
        $query = $connect->prepare($sql);
        $query->execute();
        session_start();
        $_SESSION['email'] = $email;
        $select_user = $connect->prepare("SELECT * FROM `users` WHERE email = ?");
        $select_user->execute([$email]);
        $row = $select_user->fetch(PDO::FETCH_ASSOC);
        $_SESSION['id'] = $row['id'];
        
        echo "Registration successful!";
    };
} } else {
    echo implode("<br>", $errors);
}
?>
