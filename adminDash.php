<?php
session_start();

if(!$_SESSION['email'] || $_SESSION['admin'] != '1'){
    header('location:http://localhost/CSC/log.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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

        <!-- <div class="collapse navbar-collapse" id="navbarNavAltMarkup"> -->
        <!-- <div class="navbar-nav"> -->
        <div>
            <button type="button" style="background-color: silver;" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Add User
                </button>
                
                <button type="button" style="background-color: silver;" class="btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    Add Course
                </button>
                
                <button type="button" style="background-color: silver;" class="btn" data-bs-toggle="modal" data-bs-target="#assignCourse" onclick="getAllCourses()">
                    Assign Course
                </button>
                
                <button type="button" style="background-color: silver;" class="btn" data-bs-toggle="modal" data-bs-target="#assignMark" onclick="getCourses()">
                    Assign Mark
                </button>
        </div>

        <div>
            <a href="./msg.php"><button class="btn" style="margin-left: 20px; background-color : aliceblue">Messages</button></a>
        </div>
        <!-- </div> -->
</nav>

<div style=" display:flex; justify-content: space-around;">

<div>

    <!-- <a href="./logout.php"><button class="btn btn-warning">Logout</button></a> -->
    
</div>

<div>

<!-- 
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Add User
    </button> -->

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add New User</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"onclick="hideError()"></button>
        </div>
        <div class="modal-body">
            <form id="addUserForm">
                <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Username:</label>
                            <input type="text" class="form-control" id="name-text">
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Email:</label>
                            <input type="email" class="form-control" id="email-text">
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Password:</label>
                            <input type="password" class="form-control" id="password-text">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="hideError()">Close</button>
                    <button type="submit" class="btn btn-primary">Add User</button>
                </div>
                <div id="error-message" style="display: none; color: red; margin-left : 10px"></div>
                <div id="success-message" style="display: none; color: green; margin-left : 10px"></div>
            </form>
        </div>
    </div>
    </div>








    <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
    Add Course
    </button> -->

    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Add New Course</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"onclick="hideError()"></button>
        </div>
        <div class="modal-body">
            <form id="addNewCourse-form">
                <div class="mb-3">
                    <label for="recipient-name" class="col-form-label">Course Name:</label>
                    <input type="text" class="form-control" id="name-course">
                </div>
                <div class="mb-3">
                    <label for="message-text" class="col-form-label">Minimum Mark:</label>
                    <input type="number" class="form-control" id="min-mark">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="hideError()">Close</button>
                    <button type="submit" id="btnAddCourse" class="btn btn-primary">Add Course</button>
                </div>
                <div id="course-message" style="display: none; color: red; margin-left : 10px"></div>
                <div id="course-success-message" style="display: none; color: green; margin-left : 10px"></div>
            </form>
        </div>
        </div>
    </div>
    </div>






    <!-- <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#assignCourse" onclick="getAllCourses()">
    Assign Course
    </button> -->

    <div class="modal fade" id="assignCourse" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Assign To Course</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"onclick="hideError()"></button>
        </div>
        <div class="modal-body">
            <form id="assignCourse-form">
                <div class="mb-3">
                    <label for="recipient-name" class="col-form-label">Course Name:</label>
                    <select class="form-select" name="crs-name-assign" id="CrsNameAssign">
                        <option value="none"></option>
                    </select>
                </div>
                <div class="mb-3" id="DivStuNameAss" style="display: none;">
                    <label for="message-text" class="col-form-label">Student:</label>
                    <select class="form-select" name="std-name-assign" id="StuNameAss">
                        <option value="none">Select Student In Course</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="hideError()">Close</button>
                    <button type="submit" class="btn btn-primary">Assign Course</button>
                </div>
                <div id="assign-error-message" style="display: none; color: red; margin-left : 10px"></div>
                <div id="assign-success-message" style="display: none; color: green; margin-left : 10px"></div>
            </form>
        </div>
        </div>
    </div>
    </div>





    <!-- <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#assignMark" onclick="getCourses()">
    Assign Mark
    </button> -->

    <div class="modal fade" id="assignMark" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Assign Mark To Student</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"onclick="hideError()"></button>
        </div>
        <div class="modal-body">
            <form id="assignMark-form">
                <div class="mb-3">
                    <label for="recipient-name" class="col-form-label">Course Name:</label>
                    <select class="form-select" name="crs-name-mark" id="CrsNameMark">
                        <option value="none"></option>
                    </select>
                </div>
                <div class="mb-3" id="DivStuNameMark" style="display: none;">
                    <label for="message-text" class="col-form-label">Student:</label>
                    <select class="form-select" name="std-name-mark" id="StuNameMark">
                        <option value="none">Select Student In Course</option>
                    </select>
                </div>
                <div class="mb-3" id="DivMark" style="display: none;">
                    <label for="message-text" class="col-form-label">Mark:</label>
                    <input require type="number" class="form-control" id="mark">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="hideError()">Close</button>
                    <button type="submit" class="btn btn-primary">Assign Mark</button>
                </div>
                <div id="mark-message" style="display: none; color: red; margin-left : 10px"></div>
                <div id="mark-success-message" style="display: none; color: green; margin-left : 10px"></div>
            </form>
        </div>
        </div>
    </div>
    </div>


    <!-- <a href="./msg.php"><button class="btn btn-success" style="margin-left: 20px;">Messages</button></a> -->



</div>


</div>


    <table class="table table-striped table-hover" style="text-align: center;">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">First</th>
                <th scope="col">Email</th>
                <th scope="col">Active</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody id="body-table">
            
        </tbody>
    </table>


    <div class="modal fade" id="editUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit User Info</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="hideError()"></button>
        </div>
        <div class="modal-body">
            <form id="update-form">
                <input type="hidden" id="user_id">
                <input type="hidden" id="old_email">
                <input type="hidden" id="old_username">
                <div class="mb-3">
                    <label for="recipient-name" class="col-form-label">Username:</label>
                    <input type="text" class="form-control" id="nameEdit">
                </div>
                <div class="mb-3">
                    <label for="message-text" class="col-form-label">Email:</label>
                    <input type="email" class="form-control" id="editEmail">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="hideError()">Close</button>
                    <a href="updateUserInfo.php"><button type="submit" class="btn btn-primary">Update</button></a>
                </div>
                <div id="error-message-update" style="display: none; color: red; margin-left : 10px"></div>
                <div id="success-message" style="display: none; color: green; margin-left : 10px"></div>
            </form>
        </div>
        </div>
    </div>
    </div>



    <!-- Button trigger modal -->

        <!-- Modal -->
        <div class="modal fade" id="deleteUser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Remove User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="hideError()"></button>
            </div>
            <form id="delete-form">
                <input type="hidden" id="idInput">

                <div class="modal-body">
                    Are you sure do you want to remove this user ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="hideError()">Close</button>
                    <button type="submit" class="btn btn-primary">Delete</button>
                </div>
            </form>
            </div>
        </div>
        </div>



    <script>

        function hideError(){

            document.getElementById('StuNameMark').value = 'none'
            document.getElementById('CrsNameMark').value = 'none'
            document.getElementById('StuNameAss').value = 'none'
            document.getElementById('CrsNameAssign').value = 'none'
            document.getElementById('mark').value = 'none'
            document.getElementById('DivStuNameAss').style.display = 'none'
            document.getElementById('error-message').style.display = 'none'
            document.getElementById('DivStuNameMark').style.display = 'none'
            document.getElementById('DivMark').style.display = 'none'
            document.getElementById('error-message-update').style.display = 'none'
            document.getElementById('course-message').style.display = 'none'
            document.getElementById('name-course').value = ''
            document.getElementById('min-mark').value = 'none'
            

            document.getElementById('assign-success-message').style.display = 'none'
            document.getElementById('mark-success-message').style.display = 'none'
            document.getElementById('course-success-message').style.display = 'none'
            document.getElementById('success-message').style.display = 'none'


            document.getElementById('error-message').style.display = 'none'
            document.getElementById('assign-error-message').style.display = 'none'
            document.getElementById('mark-message').style.display = 'none'
        }

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
                                data += `<td><button class="btn btn-success" onclick='makeStuActive(${element.id})'>Make Active</button></td>`
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



            function makeStuActive(id){
                $(document).ready(function() {      
                $.ajax({
                type: 'POST',
                url: 'http://localhost/csc/makeActive.php',
                data: { id: id },
                success: function(response) {
                    setUserDataInTable()
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
                    document.getElementById('old_username').value = userInfo.username
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
            var old_username = $('#old_username').val();
            
            console.log(old_username)
            console.log(name)
            
            $.ajax({
            type: 'POST',
            url: 'http://localhost/csc/updateUserInfo.php',
            data: {
                username: name,
                email: email,
                id : id,
                old_email : old_email,
                old_username : old_username,
            },
            success: function(response) {
                console.log(response)
                if (response.startsWith('Error : ')) {
                var errors = response;
                    $('#error-message-update').html(errors).show();
                } else {
                    $("#editUser").modal('hide');
                    setUserDataInTable()
                    $('#success-message').html(response).show();
                    $('#dup-message').html(errors).hide();
                    $('#error-message-update').html(errors).hide();
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
                    $('#course-success-message').html(response).show();
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
            document.getElementById('DivStuNameAss').style.display = 'block'
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
                console.log(response)
                if (response.startsWith('Error : ')) {
                var errors = response;
                    $('#assign-error-message').html(errors).show();
                } else {
                    $("#assignCourse").modal('hide');
                    document.getElementById('CrsNameAssign').value = ""
                    document.getElementById('StuNameAss').value = ""
                    setUserDataInTable()
                    $('#assign-success-message').html(response).show();
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
            document.getElementById('DivStuNameMark').style.display = 'block'
            document.getElementById('DivMark').style.display = 'block'
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
                console.log(nameOfCourse)
                console.log(StuNameMark)
                console.log(stuMark)
                if (response.startsWith('Error : ')) {
                var errors = response;
                    $('#mark-message').html(errors).show();
                } else {
                    console.log('success')
                    $("#assignMark").modal('hide');
                    document.getElementById('mark').value = ""
                    document.getElementById('StuNameMark').value = ""
                    document.getElementById('CrsNameMark').value = ""
                    setUserDataInTable()
                    $('#mark-success-message').html(response).show();
                    $('#mark-message').html(errors).hide();
                }
            }
            });
        });
        });



        </script>
</body>
</html>