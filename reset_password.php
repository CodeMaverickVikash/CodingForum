<?php
  include 'partials/dbconnection.php';

    // For Signup users
    $showAlert = false;
    $showError = false;
extract($_POST);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_GET['token'])) {

    	$token = $_GET['token'];

    	$new_password = $_POST['password'];
	    $c_password = $_POST['c_password'];
	    
	    if($new_password == $c_password){
	    		// converting into hash to password
	    		$new_pass = password_hash($new_password, PASSWORD_DEFAULT);
	            $updateQuery = " update signupuser set password='$new_pass' where token='$token'";
	            $query = mysqli_query($conn, $updateQuery);

	            session_start();

	            if ($query) {
	            	$_SESSION['msg'] = "Your password has been updated";
	            	header("location: login.php");
	            }
	            else{
	            	$_SESSION['pass_msg'] = "password not updated successfully";
	            	// header('location: reset_password.php?error=$showError');
	            }
	    }
	    else{
	        $_SESSION['error_msg'] = "password not matching";
	    }
    }
    else{
    	echo "No token found";
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

        <p class="text-white px-5 text-center"><?php if(isset($_SESSION['pass_msg'])){ echo $_SESSION['pass_msg']; }?>
        </p>

        <form action="" method="post">
            <div class="form-group mt-3 mb-2">
                <label for="password">New password</label>
                <input type="password" class="form-control" id="exampleInputEmail1" name="password"
                    aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="password">Confirm password</label>
                <input type="password" class="form-control" id="exampleInputEmail1" name="c_password"
                    aria-describedby="emailHelp">
                <small
                    class="text-danger d-flex justify-content-end"><?php if(isset($_SESSION['error_msg'])){ echo "*".$_SESSION['error_msg']; }?></small>
            </div>

            <button type="submit" class="btn btn-success btn-block">Update password</button>
        </form>

        <div class="text-center mt-3">
            have an account?<a href="login.php"> Login Here!</a>
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