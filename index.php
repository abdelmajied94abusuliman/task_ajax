<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- basic -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- mobile metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="initial-scale=1, maximum-scale=1">
  <!-- site metas -->
  <title>Yogasan</title>
  <meta name="keywords" content="">
  <meta name="description" content="">
  <meta name="author" content="">
  <!-- bootstrap css -->
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
</head>
<!-- body -->

<body>
  <!-- header section start -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="logo"><a href="index.html"><img src="images/logo.png"></a></div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
      aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">


        <a class="nav-item nav-link" href="about.html">About</a>

        <div>
        <?php
                 if(isset($_SESSION['email']) && isset($_SESSION['admin'])) {
                    if( $_SESSION['admin'] == 1 ) { ?>
                    <a href="./adminDash.php">Dashboard</a>
                    <?php } else {?>
                    <a href="./home.php" class="nav-item nav-link" >Home</a>
                <?php } ?>
                <a href="./task.php" class="nav-item nav-link" >Register</a>
                <a href="./log.php" class="nav-item nav-link" >Login</a>
            <?php } else {?>
                <a href="./logout.php" class="nav-item nav-link" >Logout</a>
            <?php } ?>
        </div>
      </div>
    </div>
  </nav>
  <!-- header section end -->
  <!-- banner section start -->
  <div class="banner_section layout_padding">
    <div class="container">
      <section class="slide-wrapper">
        <div class="container">
          <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->

            <!-- Wrapper for slides -->
            <div class="carousel-inner">
              <div class="carousel-item active">

              </div>
              <div class="carousel-item">

              </div>
              <div class="carousel-item">

              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
  <!-- banner section end -->
  <!-- trainer section start -->

  <!-- trainer section end -->
  <!-- about section start -->

  <!-- about section end -->
  <!-- client section start -->

  <!-- client section end -->
  <!-- pricing section start -->

  <!-- pricing section end -->
  <!-- contact section start -->
 
  <!-- contact section end -->
  <!-- copyright section start -->
  <div class="copyright_section">
    <div class="container">
      <p class="copyright_text">Copyright 2019 All Right Reserved By.<a href="https://html.design"> Free html
          Templates</a> Distributed By. <a href="https://themewagon.com">ThemeWagon </a></p>
    </div>
  </div>
  <!-- copyright section end -->
  <!-- Javascript files-->
  <script src="js/jquery.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/jquery-3.0.0.min.js"></script>
  <script src="js/plugin.js"></script>
  <!-- sidebar -->
  <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
  <script src="js/custom.js"></script>
  <!-- javascript -->
  <script src="js/owl.carousel.js"></script>
  <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
  <script>
    $('#myCarousel').carousel({
      interval: false
    });

    //scroll slides on swipe for touch enabled devices

    $("#myCarousel").on("touchstart", function (event) {

      var yClick = event.originalEvent.touches[0].pageY;
      $(this).one("touchmove", function (event) {

        var yMove = event.originalEvent.touches[0].pageY;
        if (Math.floor(yClick - yMove) > 1) {
          $(".carousel").carousel('next');
        }
        else if (Math.floor(yClick - yMove) < -1) {
          $(".carousel").carousel('prev');
        }
      });
      $(".carousel").on("touchend", function () {
        $(this).off("touchmove");
      });
    });






        setUserDataInTable()
            function setUserDataInTable(){
                $(document).ready(function(){      
                    $.ajax({
                    type: 'GET',
                    url: 'http://localhost/csc/users.php',
                    success: function(response) {
                        var returnedData = JSON.parse(response);
                        var data = "";
                        var i = 1;
                        returnedData.forEach((element=>{
                        data += `<tr>
                                        <td>${i++}</td>
                                        <td>${element.username}</td>
                                        <td>${element.email}</td>`

                            if(element.status == "Inactive"){
                                data += `<td><a href='makeActive.php?id=${element.id}'><button class="btn btn-success">Make Active</button></a></td>`
                            } else {
                                data += `<td>-</td>`
                            }
                            // href='deleteUser.php?id=${element.id}'
                            data += `<td><button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editUser" data-bs-whatever="@mdo" onclick="myFunc(${element.id})">Edit</button></td>
                            
                                    <td><button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteUser" onclick="rem(${element.id})">Delete</button></td>
                                    </tr>`
                                
                        }))
                        $('#body-table').html(data);
                    }
                    });
                });
            }
            function myFunc(id){
                $(document).ready(function() {      
                $.ajax({
                type: 'GET',
                url: 'http://localhost/csc/userPOP.php',
                data: { id: id },
                success: function(response) {
                    var userInfo = JSON.parse(response);

                    document.getElementById('nameEdit').value = userInfo.username
                    document.getElementById('editEmail').value = userInfo.email
                    document.getElementById('user_id').value = userInfo.id
                    document.getElementById('old_email').value = userInfo.email
                }
                });
            });
            }

            function closeForm() {
                document.getElementById("popUp-form").style.display = "none";
            }


            function rem(id){
                document.getElementById('idInput').value = id
                }

            $(document).ready(function() {
            $('#update-form').submit(function(e) {
            e.preventDefault();
            
            var name = $('#nameEdit').val();
            var email = $('#editEmail').val();
            var id = $('#user_id').val();
            var old_email = $('#old_email').val();

            
            $.ajax({
            type: 'POST',
            url: 'http://localhost/csc/updateUserInfo.php',
            data: {
                username: name,
                email: email,
                id : id,
                old_email : old_email,
            },
            success: function(response) {
                if (response.startsWith('Error : ')) {
                var errors = response;
                    $('#error-message').html(errors).show();
                } else {
                    $("#editUser").modal('hide');
                    setUserDataInTable()
                    $('#success-message').html(response).show();
                    $('#dup-message').html(errors).hide();
                    $('#error-message').html(errors).hide();
                }
            }
            });
        });
        });






            $(document).ready(function() {
            $('#delete-form').submit(function(e) {
            e.preventDefault();
            
            var id = $('#idInput').val();
            
            $.ajax({
            type: 'POST',
            url: 'http://localhost/csc/deleteUser.php',
            data: {
                id : id,
            },
            success: function(response) {
                $("#deleteUser").modal('hide');
                    setUserDataInTable()
            }
            });
        });
        });




        // Add User From Dashboard 



        $(document).ready(function() {
            $('#addUserForm').submit(function(e) {
            e.preventDefault();
            
            var name = $('#name-text').val();
            var email = $('#email-text').val();
            var password = $('#password-text').val();
            
            $.ajax({
            type: 'POST',
            url: 'http://localhost/csc/addUserDash.php',
            data: {
                username: name,
                email: email,
                password : password,
            },
            success: function(response) {
                if (response.startsWith('Error : ')) {
                var errors = response;
                    $('#error-message').html(errors).show();
                } else {
                    $("#exampleModal").modal('hide');
                    document.getElementById('name-text').value = ""
                    document.getElementById('email-text').value = ""
                    document.getElementById('password-text').value = ""
                    setUserDataInTable()
                    $('#success-message').html(response).show();
                    $('#dup-message').html(errors).hide();
                    $('#error-message').html(errors).hide();
                }
            }
            });
        });
        });




        //  Add Course


        $(document).ready(function() {
            
            $('#addNewCourse-form').submit(function(e) {
            e.preventDefault();
            var nameOfCourse = $('#name-course').val();
            var minMark = $('#min-mark').val();
            
            $.ajax({
            type: 'POST',
            url: 'http://localhost/csc/addCourse.php',
            data: {
                nameOfCourse: nameOfCourse,
                minMark: minMark,
            },
            success: function(response) {
                if (response.startsWith('Error : ')) {
                var errors = response;
                    $('#course-message').html(errors).show();
                } else {
                    $("#staticBackdrop").modal('hide');
                    document.getElementById('name-course').value = ""
                    document.getElementById('min-mark').value = ""
                    setUserDataInTable()
                    $('#success-message').html(response).show();
                    $('#course-message').html(errors).hide();
                }
            }
            });
        });
        });



        //  Assign Course



        function getAllCourses(){
            $(document).ready(function() {  
            $.ajax({
            type: 'GET',
            url: 'http://localhost/csc/getAllCourses.php',
            success: function(response) {
                var coursesInfo = JSON.parse(response);
                var data = "";
                    var i = 1;
                    data += `<select class="form-select form-select-sm" aria-label=".form-select-sm example" name="crs-name-assign" id="CrsNameAssign">
                    <option value="none" selected >Select Course</option>
                    `
                    coursesInfo.forEach((element=>{
                     data += `<option value="${element.course_id}" name="${element.course_id}" id="${element.course_id}" >${element.course_name}</option>`
                    }))
                    data += `</select>`
                    $('#CrsNameAssign').html(data);
                }
                });
        });
        }



        document.getElementById("CrsNameAssign").onchange = function load(){
            var courseID = document.getElementById('CrsNameAssign').value;
            $(document).ready(function() {  
            var id = $('#CrsNameAssign').val();
            $.ajax({
            type: 'GET',
            url: 'http://localhost/csc/getNotAssignedStu.php',
            data : {id : id},
            success: function(response) {
                var studentsNotInCourse = JSON.parse(response);
                var stu = "";
                var i = 1;
                stu += `<select class="form-select form-select-sm" aria-label=".form-select-sm example" name="std-name-assign" id="StuNameAss">
                <option value="none" selected >Select Student</option>
                `
                studentsNotInCourse.forEach((element=>{
                    stu += `<option value="${element.id}" name="${element.id}" id="${element.id}" >${element.username}</option>`
                }))
                stu += `</select>`
                $('#StuNameAss').html(stu);
            }
            });
        });
        }





        $(document).ready(function() {
            $('#assignCourse-form').submit(function(e) {
            e.preventDefault();
            var nameOfCourse = $('#CrsNameAssign').val();
            var stuName = $('#StuNameAss').val();
            
            $.ajax({
            type: 'POST',
            url: 'http://localhost/csc/addStudentToCourse.php',
            data: {
                nameOfCourse: nameOfCourse,
                stuName: stuName,
            },
            success: function(response) {
                if (response.startsWith('Error : ')) {
                var errors = response;
                    $('#course-message').html(errors).show();
                } else {
                    $("#assignCourse").modal('hide');
                    document.getElementById('CrsNameAssign').value = ""
                    document.getElementById('StuNameAss').value = ""
                    setUserDataInTable()
                    $('#success-message').html(response).show();
                    $('#course-message').html(errors).hide();
                }
            }
            });
        });
        });




        //  Assign Mark




        function getCourses(){
            $(document).ready(function() {  
            $.ajax({
            type: 'GET',
            url: 'http://localhost/csc/getAllCourses.php',
            success: function(response) {
                var coursesInfo = JSON.parse(response);
                var data = "";
                    var i = 1;
                    data += `<select class="form-select form-select-sm" aria-label=".form-select-sm example" name="crs-name-assign" id="CrsNameMark">
                    <option value="none" selected >Select Course</option>
                    `
                    coursesInfo.forEach((element=>{
                     data += `<option value="${element.course_id}" name="${element.course_id}" id="${element.course_id}" >${element.course_name}</option>`
                    }))
                    data += `</select>`
                    $('#CrsNameMark').html(data);
                }
                });
        });
        }



        document.getElementById("CrsNameMark").onchange = function load(){
            var courseID = document.getElementById('CrsNameMark').value;
            $(document).ready(function() {  
            var id = $('#CrsNameMark').val();
            $.ajax({
            type: 'GET',
            url: 'http://localhost/csc/getAssignedStu.php',
            data : {id : id},
            success: function(response) {
                var studentsInCourse = JSON.parse(response);
                var stu = "";
                var i = 1;
                stu += `<select class="form-select form-select-sm" aria-label=".form-select-sm example" name="std-name-assign" id="StuNameMark">
                <option value="none" selected >Select Student</option>
                `
                studentsInCourse.forEach((element=>{
                    stu += `<option value="${element.id}" name="${element.id}" id="${element.id}" >${element.username}</option>`
                }))
                stu += `</select>`
                $('#StuNameMark').html(stu);
            }
            });
        });
        }



        $(document).ready(function() {
            $('#assignMark-form').submit(function(e) {
            e.preventDefault();
            var nameOfCourse = $('#CrsNameMark').val();
            var StuNameMark = $('#StuNameMark').val();
            var stuMark = $('#mark').val();
            
            $.ajax({
            type: 'POST',
            url: 'http://localhost/csc/assignMark.php',
            data: {
                nameOfCourse : nameOfCourse,
                StuNameMark : StuNameMark,
                stuMark : stuMark
            },
            success: function(response) {
                // console.log(response)
                if (response.startsWith('Error : ')) {
                var errors = response;
                    $('#course-message').html(errors).show();
                } else {
                    $("#assignMark").modal('hide');
                    document.getElementById('mark').value = ""
                    document.getElementById('StuNameMark').value = ""
                    document.getElementById('CrsNameMark').value = ""
                    setUserDataInTable()
                    $('#success-message').html(response).show();
                    $('#course-message').html(errors).hide();
                }
            }
            });
        });
        });



  </script>
</body>

</html>