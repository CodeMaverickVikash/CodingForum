<?php
    include 'dbconnection.php';
    // print_r($_POST)

    // Login User
    $login = false;
    $showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    $sql = "SELECT * FROM `signupuser`";
    $query = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_array($query)){
        $firstname = $row['FirstName'];
        $lastname = $row['LastName'];
    }

    $username=$_POST["email"];
    $password2=$_POST["password"];

    $existSql="SELECT * FROM `signupuser` WHERE Email_Id='$username' and status='active'";
    $result = mysqli_query($conn, $existSql);
    $numExixtRows = mysqli_num_rows($result);
    if($numExixtRows == 1){
            $rows=mysqli_fetch_assoc($result);
            if(password_verify($password2, $rows['password'])){

                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $username;
                $_SESSION['firstname'] = $firstname;
                $_SESSION['lastname'] = $lastname;
                // print_r($_SESSION);
                // echo "logged in". $username;
                // $login = true;  // this is used for show message

                // remember functionality using cookies
                if(isset($_POST['rememberMe'])){
                    setcookie('emailcookie', $username, time()+86400, '/');
                    setcookie('passwordcookie', $password2, time()+86400, '/');
                    // echo $cookie1;
                    // header("location: /completewebsite/index.php");
                }
                

                // header("location: /completewebsite/index.php");
            }
            else{
                $showError = "Invalid credentials";
                echo $showError;
            }
        
    }
    else{
        $showError = "User Does Not Exist";
        echo $showError;
    }

}

?>