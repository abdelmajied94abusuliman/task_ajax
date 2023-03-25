<?php require("./config.php") ?>
<?php

$nameOfCourse = $_POST['nameOfCourse'];
$minMark = $_POST['minMark'];

$errors = array();

if (empty($nameOfCourse)) {
  $errors[] = "Error : Name is required";
}
if (empty($minMark)) {
  $errors[] = "Error : Minimum Mark is required";
}



if (empty($errors)) {

    $select_course = $connect->prepare("SELECT * FROM `courses` WHERE course_name = ?");
    $select_course->execute([$nameOfCourse]);
    $row = $select_course->fetch(PDO::FETCH_ASSOC);
 
    if($select_course->rowCount() > 0){
        $errors[] = 'Error : Course Already Exists!';
        echo implode("<br>", $errors);
    } else {
        $sql = "INSERT INTO courses (course_name, minimum_mark)
                VALUES ('$nameOfCourse', '$minMark');";
        $query = $connect->prepare($sql);
        $query->execute();
        echo "Added Course successful!";
    };
} else {
    echo implode("<br>", $errors);
}
?>
