<?php
 //    echo "<pre>";
	// print_r($_SERVER); // print_r is method which print the array
	// // print_r($_SESSION); // print_r is method which print the array
	// echo "</pre>";

    // include 'facebook_login/fb_config.php';
    include 'google_login/config.php';
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
    <!-- <link rel="stylesheet" href="css/login.css"> -->
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" type="text/css" href="css/user-menu.css">
    <title>Login</title>
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

    <!-- login form -->
    <div class="container mt-lg-5 col-md-3">
        <a href="<?=$google_client->createAuthUrl()?>" class="btn btn-danger btn-block"
            style="background-color: #DF4B3B;"><span><i class="fab fa-google-plus-g"></i>Login with Google</span></a>
        <p style="text-align:center" class="mt-2"> OR </p>

        <div>
            <p class="bg-success text-white px-4"><?php if(isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
            } ?></p>
        </div>

        <form id="form" action="<?php echo htmlentities($_SERVER['PHP_SELF']) ?>" method="post">

            <div class="form-group my-3 formv">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control form-control-user"
                    value="<?php if(isset($_COOKIE['emailcookie'])){ echo $_COOKIE['emailcookie']; } ?>" id="email"
                    aria-describedby="emailHelp" placeholder="Enter email">
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <small></small>
            </div>

            <div class="form-group my-3 formv">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control form-control-user"
                    value="<?php if(isset($_COOKIE['passwordcookie'])){ echo $_COOKIE['passwordcookie']; } ?>"
                    id="password" placeholder="Password">
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <small></small>
            </div>
            <div class="form-check my-3">
                <input type="checkbox" class="form-check-input" id="rememberMe" name="rememberMe">
                <label class="form-check-label" for="exampleCheck1">Remember Me</label>
            </div>
            <button type="submit" class="btn btn-success btn-block"><i class="fas fa-sign-in-alt"></i> Log in </button>
        </form>
        <hr>
        <div class="text-center mt-3">
            Not have an account?<a href="signup.php"> Signup Here!</a>
        </div>
        <div class="text-center mt-3">
            <a href="recover_email.php">Forgot your password?</a>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="js/login.js"></script>
    <script src="js/jquery-3.5.1.min.js"></script>

    <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script> -->
    <!-- <script src="js/custom.js" type="text/javascript"></script> -->
    <!-- form validation -->
    <script type="text/javascript">
    const email = document.getElementById('email');
    const password = document.getElementById('password');
    const remember = document.getElementById('rememberMe');

    form.addEventListener('submit', (e) => {
        e.preventDefault();

        checkInputs();
    });

    function setErrorFor(input, message) {
        const formv = input.parentElement; // formv
        const small = formv.querySelector('small');

        // add error message inside small
        small.innerText = message;

        // add error class
        formv.className = 'formv error';

    }

    function setSuccessFor(input) {
        const formv = input.parentElement; // formv

        // add error class
        formv.className = 'formv success';

    }

    function isEmail(email) {
        return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
            .test(email);
    }

    const sendData = (data, sRate, count) => {
        if (sRate == count) {
            $.ajax({
                url: "partials/loginhandler.php",
                type: "post",
                data: data,

                success: function(data, status) {
                    // alert("successfully inserted");
                    console.log(data.cookie);
                    var showError = "User Does Not Exist";
                    var showError1 = "Invalid credentials";
                    if (data == showError) {
                        const formv = email.parentElement; // formv
                        const small = formv.querySelector('small');
                        small.innerText = showError;
                        formv.className = 'formv error';
                    } else {
                        if (data == showError1) {
                            const formv = password.parentElement; // formv
                            const small = formv.querySelector('small');
                            small.innerText = showError1;
                            formv.className = 'formv error';
                        } else {
                            alert("Login successful");
                            location.href = `questions.php`
                        }
                    }

                }
            });
            // template literals
            // location.href = `index.php`
        }
    }

    const successMsg = (data) => {
        let formCon = document.getElementsByClassName('formv');

        var count = formCon.length - 1;
        for (var i = 0; i < formCon.length; i++) {
            if (formCon[i].className == "formv success") {
                var sRate = 0 + i;
                sendData(data, sRate, count);
            } else {
                return false;
            }
        }
    }


    function checkInputs() {
        const emailValue = email.value.trim();
        const passwordValue = password.value.trim();
        const rememberMeValue = remember.value.trim();

        // json object
        var data = {
            "email": emailValue,
            "password": passwordValue,
            "rememberMe": rememberMeValue
        };

        if (emailValue === '') {
            setErrorFor(email, 'This field is required');
        } else if (!isEmail(emailValue)) {
            setErrorFor(email, 'Please enter a valid email');
        } else {
            setSuccessFor(email);
        }

        // for password
        if (passwordValue == '') {
            // show error
            // add error class
            setErrorFor(password, 'This field is required');
        } else {
            // add success class
            setSuccessFor(password);
        }

        successMsg(data);

    }
    </script>

    <script type="text/javascript">
    function menuToggle() {
        const menuToggle = document.querySelector('.menu');
        menuToggle.classList.toggle('active');
    }
    </script>

</body>

</html>