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

<body class="bg-light">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="logo"><a href="index.html"><img width="100px" height="100px" src="https://pps.whatsapp.net/v/t61.24694-24/315770010_197161602898113_7564860388423747182_n.jpg?ccb=11-4&oh=01_AdT0mPB_rxiZOZWkfLe7cOAzC3E8VPl9KWvZYkGHAJqT_w&oe=642AAE0C"></a></div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
      aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-item nav-link" href="./about.php">About</a>
        <?php
                 if(isset($_SESSION['email'])) {
                    if( $_SESSION['admin'] == 1 ) { ?>
                    <a href="./adminDash.php">Dashboard</a>
                    <?php } else {?>
                    <a href="./home.php" class="nav-item nav-link" >Home</a>
                <?php } ?>
                    <a href="./logout.php" class="nav-item nav-link" >Logout</a>
                    
                <?php } else {?>
                    <a href="./task.php" class="nav-item nav-link" >Register</a>
                    <a href="./log.php" class="nav-item nav-link" >Login</a>
                <?php } ?>
      </div>
    </div>
  </nav>
    <div class="container p-3">
        <div class="col-lg-6 m-auto d-block p-3 bg-white">
            <div id="message"></div>
            <form id="login-form">
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="user1">
                                Email:
                            </label>
                            <input type="email" name="email" id="email" class="form-control">
                    </div>

                    <div class="form-group col-md-12">
                        <label for="password">
                            Password:
                        </label>
                        <div class="input-group">
                            <input type="password" name="password" id="password" class="form-control">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <button type="submit" id="submitbtn" class="btn btn-primary ">Submit</button>
                    </div>

                </div>

            </form>
            <div id="error-message" style="display: none; color: red;"></div>
            <div id="success-message" style="display: none; color: green;"></div>
            <!-- <a href="./task.php">Register</a> -->
        </div>
    </div>


    <script>
        $(document).ready(function() {
            $('#login-form').submit(function(e) {
            e.preventDefault();

            var email = $('#email').val();
            console.log(email)
            var password = $('#password').val();
            
            $.ajax({
            type: 'POST',
            url: 'http://localhost/csc/login.php',
            data: {
                email: email,
                password: password,
            },
            success: function(response) {
                if (response.startsWith('Error : ')) {
                var errors = response;
                    $('#error-message').html(errors).show();
                } else if (response.startsWith('Alert : ')) {
                    alert('Your Account Still Not Active')
                } else {
                    if (response.startsWith('1')){
                        window.location = "http://localhost/csc/adminDash.php";
                    } else {
                        window.location = "http://localhost/csc/home.php";
                    }
                }
            }
            });
        });
        });
    </script>
</body>
</html>