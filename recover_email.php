<?php
  include 'partials/dbconnection.php';

    // For Signup users
    $showAlert = false;
    $showError = false;
extract($_POST);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $emailid = $_POST['email'];

    //check whether this username exists
    $existSql="SELECT * FROM `signupuser` WHERE Email_Id='$emailid'";
    $result = mysqli_query($conn, $existSql);
    $numExixtRows = mysqli_num_rows($result);
    
    if($numExixtRows == 1){
            $user_data = mysqli_fetch_array($result);
            $username = $user_data['FirstName'].$user_data['LastName'];
            $token = $user_data['token'];

            $subject = "Password Reset";
            $body = "Hi, $username. Click here to reset your password
            http://localhost/completewebsite/reset_password.php?token=$token";
            $sender_email = "From: purposetesting92@gmail.com";

            if(mail($emailid, $subject, $body, $sender_email)){
                session_start();
                $_SESSION['msg'] = "check your email to reset your password $emailid";
                header("location: login.php");
            }
            else{
                echo "sending email failed";
            }
    }
    else{
        //$exists=true;
        $showError = "Email does not exist";
        echo $showError;
    }

}

?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>
    <div class="container col-md-3 mt-5">
        <h1 class="h4 text-gray-900 mb-2">Reset Your Password?</h1>
        <p class="mb-4">We get it, stuff happens. Just enter your email address below
            and we'll send you a link to reset your password!</p>
        <form action="<?=htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" name="email"
                    aria-describedby="emailHelp">
            </div>
            <button type="submit" class="btn btn-success btn-block">Send email</button>
        </form>

        <div class="text-center mt-3">
            Not have an account?<a href="signup.php"> Signup Here!</a>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
</body>

</html>