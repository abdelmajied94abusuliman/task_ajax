<?php require("./config.php") ?>
<?php

        session_start();

        
        ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>



    <link rel="stylesheet" href="css/bootstrap.min.css">
  <!-- style css -->
  <link rel="stylesheet" href="css/style.css">
  <!-- Responsive-->
  <link rel="stylesheet" href="css/responsive.css">
  <!-- fevicon -->
  <link rel="icon" href="images/fevicon.png" type="image/gif" />
  <!-- Scrollbar Custom CSS -->
  <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
  <!-- Tweaks for older IEs-->
  <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
  <!-- owl stylesheets -->
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"
    media="screen">

    <style>
        .bg-light {
            background-color: #00308c !important;
        }
    </style>
</head>
<body>



<nav class="navbar navbar-expand-lg navbar-light bg-light" style="display: flex; justify-content : space-around">
        <div>
            <a href="./logout.php"><button class="btn btn-warning">Logout</button></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
        </div>

        <div>
            <?php
                if(!$_SESSION['email']){
                    header('location:http://localhost/CSC/log.php');
                } else {
                    $current_email = $_SESSION['email'];
                    $sql = "SELECT * FROM users WHERE email = ?";
                    $query = $connect->prepare($sql);
                    $query->execute([$current_email]);
                    $fetch_user = $query->fetch(PDO::FETCH_ASSOC);
                    if($fetch_user['status'] == "Inactive"){
                        echo "<h1 style='color : red'>Welcome ".$fetch_user['username']." to home Page. Your Account Still Not Active</h1>";  
                    } else { 
                        echo "<h1 style='color : white'>Welcome -".$fetch_user['username']."- to home Page</h1>";
                    } 
                }
            ?>
        </div>


        <div>
            <a href="./msg.php"><button class="btn" style="margin-left: 20px; background-color : aliceblue">Messages</button></a>
        </div>
        <!-- </div> -->
</nav>

<div class="container" style="margin-top: 2vw;">
    
    <h1>Your Information</h1>
    <table class="table table-striped table-hover" style="text-align: center; margin-bottom:100px">
        <thead>
            <tr>
                <th scope="col">Your ID</th>
                <th scope="col">User Name</th>
                <th scope="col">Email</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody id="info-table">
            
        </tbody>
    </table>
    
    <h1>Your Courses</h1>
    <table class="table table-striped table-hover" style="text-align: center;">
        <thead>
            <tr>
                <th scope="col">Name Of Course</th>
                <th scope="col">Minimum Mark</th>
                <th scope="col">Your Mark</th>
            </tr>
        </thead>
        <tbody id="course-table">
            
        </tbody>
    </table>


    </div>


    <script>
        $(document).ready(function() {      
                $.ajax({
                type: 'GET',
                url: 'http://localhost/csc/userHomeData.php',
                success: function(response) {
                    var returnedData = JSON.parse(response);
                    var data = "";
                    returnedData.forEach((element=>{
                       data += `<tr>
                                    <td>${element.id}</td>
                                    <td>${element.username}</td>
                                    <td>${element.email}</td>`

                        if(element.status == "Inactive"){
                            data += `<td style="color:red">Inactive</td>`
                        } else {
                            data += `<td style="color:green">Active</td>`
                        }
                        data += `</tr>`
                            
                    }))
                    $('#info-table').html(data);
                }
                });
            });


        $(document).ready(function() {      
                $.ajax({
                type: 'GET',
                url: 'http://localhost/csc/userHomeMark.php',
                success: function(response) {
                    var returnedData = JSON.parse(response);
                    var data = "";
                    returnedData.forEach((element=>{
                       data += `<tr>
                                    <td>${element.course_name}</td>
                                    <td>${element.minimum_mark}</td>
                                    <td>${element.mark}</td></tr>`
                            
                    }))
                    $('#course-table').html(data);
                }
                });
            });
    </script>

</body>
</html>