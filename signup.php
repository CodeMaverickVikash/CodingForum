<?php
    include 'google_login/config.php';
    include 'facebook_login/fb_config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
        integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" type="text/css" href="css/user-menu.css">
    <title>Sign up</title>
    <style type="text/css">
    body {
        background-color: #e9ecef;
    }

    .formv i {
        top: 42px;
    }
    </style>
</head>

<body>
    <?php include 'partials/header.php'; ?>

    <!-- signup form -->
    <div class="container mt-lg-5 col-md-3">
        <a href="<?=$google_client->createAuthUrl()?>" class="btn btn-danger btn-block"
            style="background-color: #DF4B3B;"><span><i class="fab fa-google-plus-g"></i>Signup with Google</span></a>
        <p style="text-align:center" class="my-2"> OR </p>

        <form id="form" action="partial/signuphandler.php" method="post">

            <div class="form-group formv">
                <label for="exampleInputFirstname">Firstname</label>
                <input type="text" class="form-control form-control-user" name="firstname1" id="firstName"
                    placeholder="First Name">
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <small></small>
            </div>
            <div class="form-group formv">
                <label for="exampleInputLastname">Lastname</label>
                <input type="text" class="form-control form-control-user" name="lastname1" id="lastName"
                    placeholder="Last Name">
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <small></small>
            </div>
            <div class="form-group formv">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control form-control-user" name="emailid1" id="email"
                    placeholder="Email Address">
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <small></small>
            </div>

            <div class="form-group formv">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control form-control-user" name="password1" id="password"
                    placeholder="Password">
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <small></small>
            </div>
            <div class="form-group formv">
                <label for="exampleInputPassword1">Confirm password</label>
                <input type="password" class="form-control form-control-user" name="c_password1" id="c_password"
                    placeholder="Confirm Password">
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <small></small>
            </div>

            <button type="submit" class="btn btn-success btn-block"><i class="fas fa-sign-in-alt"></i> Sign up </button>
        </form>
        <hr>
        <div class="text-center mt-3">
            have an account?<a href="login.php"> Log in!</a>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="js/login.js"></script>
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/custom.js"></script>
    <script type="text/javascript">
    function menuToggle() {
        const menuToggle = document.querySelector('.menu');
        menuToggle.classList.toggle('active');
    }
    </script>
</body>

</html>