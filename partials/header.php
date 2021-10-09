
<?php

include 'google_login/config.php';  // compulsory
// include 'facebook_login/fb_config.php'; // compulsory


// new navbar
echo '<div class="bgimg">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand text-uppercase text-warning font-weight-bold font-italic ml-lg-5" href="index.php">coding forum</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">';
    echo '<ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link text-uppercase" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link text-uppercase" href="questions.php" id="over">Questions</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link text-uppercase" href="about.php">About</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link mr-3 text-uppercase" href="contact.php">Contact</a>
      </li>
    </ul>';
    echo '';
    
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
        echo '<!-- user account dropdown menu -->
        <p class="my-2 my-sm-0 text-white" style="margin-right: 64px; text-transform: uppercase;">'.$_SESSION['firstname'].'</p>
    <div class="action">
        <div class="profile" onclick="menuToggle();">
            <img class="img-profile rounded-circle" src="'.$_SESSION['user_image'].'">
        </div>
        <div class="menu">
                <h3>'.$_SESSION['firstname']." ".$_SESSION['lastname'].'<br><span>'.$_SESSION['username'].'</span></h3>
                <ul>
                    <li><a class="dropdown-item" href="#">
                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                        Profile
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#">
                            <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                            Settings
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#">
                            <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                            Activity Log
                        </a>
                    </li>
                    <hr>
                    <li>
                        <a class="dropdown-item" href="partials/logout.php">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2"></i>
                            Logout
                        </a>
                    </li>
                </ul>
        </div>
    </div>';
    }
    else{
        echo '<div class="d-flex justify-content-end align-items-end">
        <a href="login.php" class="btn my-2 my-sm-0 text-dark mr-5">Sign in</a>
        </div>
        <div class="action">
            <div class="profile">
                <a href="login.php"><img class="img-profile rounded-circle" src="images/default.png"></a>
            </div>
        </div>';
    }

  echo "</div>
</nav>";


    // Signup
    if (isset($_GET['signupsuccess']) && $_GET['signupsuccess'] == "true") {
            echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>success!</strong> Your account is now created and you can login.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div> ';
        
    }
    if (isset($_GET['signupsuccess']) && $_GET['signupsuccess'] == "false"){
            $showError = $_GET['error'];
            echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> '.$showError.'
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div> ';
    }

    // login
    if (isset($_GET['loginsuccess']) && $_GET['loginsuccess'] == "true") {
        echo ' <div class="alert alert-success alert-dismissible fade show" id="success-alert" role="alert">
        <strong>success!</strong> You are logged in.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div> ';
    }

    if (isset($_GET['loginsuccess']) && $_GET['loginsuccess'] == "false"){
        $showError = $_GET['error'];
        echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> '.$showError.'
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div> ';

    }


?>