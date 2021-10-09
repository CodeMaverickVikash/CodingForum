<?php
	include 'dbconnection.php';
	// echo "<pre>";
	// print_r($_SERVER); // print_r is method which print the array
	// print_r($_SESSION); // print_r is method which print the array
	// echo "</pre>";
    // echo $_POST['firstname'];

    // For Signup users
    $showAlert = false;
    $showError = false;
extract($_POST);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $firstname." ".$lastname;
    $emailid = $_POST['email'];
    $password = $_POST['password'];
    $c_password = $_POST['c_password'];

    $token = bin2hex(random_bytes(15));

    //check whether this username exists
    $existSql="SELECT * FROM `signupuser` WHERE Email_Id='$emailid'";
    $result = mysqli_query($conn, $existSql);
    $numExixtRows = mysqli_num_rows($result);
    
    if($numExixtRows > 0){
        //$exists=true;
        $showError = "username already exist";
        echo $showError;
    }
    else{
        $hash=password_hash($password, PASSWORD_DEFAULT);// making hashes of password
        $sql="INSERT INTO `signupuser`(`FirstName`, `LastName`, `Email_Id`, `password`, `date`, `token`, `status`) 
                                VALUES ('$firstname','$lastname','$emailid','$hash', current_timestamp(), '$token', 'inactive')";
        $result=mysqli_query($conn, $sql);
        if($result){

            $subject = "Email Activation";
            $body = "Hi, $username. Click here to activate your account
            http://localhost/completewebsite/activate.php?token=$token";
            $sender_email = "From: purposetesting92@gmail.com";

            if(mail($emailid, $subject, $body, $sender_email)){
                session_start();
                $_SESSION['msg'] = "check your email to activate your account $emailid";
                echo $_SERVER['msg'];
            }
            else{
                echo "sending email failed";
            }

        }

        $showAlert = "Hello ".$firstname."! your registration has been successfull! Now you can login";
        echo $showAlert;
    }

}

?>