<?php
    include 'partials/dbconnection.php'; 

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body id="top">
    <?php include 'partials/header.php'; ?>

    <!-- submiting form -->
    <?php

            // Submit comment
            $method = $_SERVER['REQUEST_METHOD']; // when you want to request at same page and show undefined index do this
            if ($method == 'POST') {
                $title = $_POST['title'];
                $c_content = $_POST['desc'];
                $id = $_REQUEST['cat_id'];

                // session_start();
                $postedBy = $_SESSION['firstname'].$_SESSION['lastname'];

                // insert into comments table
                $sql = "INSERT INTO `que_threads`(`thread_title`, `thread_desc`, `thread_cat_id`, `posted_by`, `timestamp`) VALUES ('$title','$c_content','$id','$postedBy', current_timestamp())";
                $query = mysqli_query($conn, $sql);

                echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>success!</strong> Your query has been added!.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div> ';

}
?>

    <!-- fetching all content from category -->
    <?php
                  if(isset($_REQUEST['cat_id']) == true){
                      $id = $_REQUEST['cat_id'];
                      $sql1 = "select * from categories where category_id = '$id'";
                      $query1 = mysqli_query($conn, $sql1);

                      while($row = mysqli_fetch_array($query1)){
                          echo '<div class="container my-4">
                            <div class="jumbotron">
                                <h1 class="display-4">Welcome to '.$row['category_name'].' forum</h1>
                                <p class="lead">'.$row['category_description'].'</p>
                                <hr class="my-4">
                                <p>This is a peer to peer forum for sharing knowledge with each other. No Spam / Advertising /
                                Self-promote in the forums is not allowed. Do not post copyright-infringing material.
                                Do not post “offensive” posts, links or images.
                                Do not cross post questions.
                                Remain respectful of other members at all times.</p>
                                <p><b>Created on '.$row['created'].'</b></p>
                            </div>
                        </div>';
                       }
                    }
    ?>

    <!-- form -->
    <div class="container">
        <h1 class="py-2">Start a Discussion</h1>
        <?php
        if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true ){
                        echo '<form action="'.$_SERVER['REQUEST_URI'].'" method="post">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Problem Title</label>
                                        <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Ellaborate your concern</label>
                                        <textarea name="desc" id="desc" class="form-control" rows="3"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </form>';
                    }
                    else{
                        echo "<p>You are not logged in. Please loggin for drop you query here</p>";
                    }
    ?>
    </div>


    <!-- fetching threads -->
    <div class="container">
        <h1>Browse Question</h1>
        <?php
            if(isset($_REQUEST['cat_id']) == true){
                      $id = $_REQUEST['cat_id'];
                      $sql = "select * from que_threads where thread_cat_id = '$id'";
                      $result = mysqli_query($conn, $sql);
                      $row = mysqli_num_rows($result);
                      // echo $noResult;

                  //   echo var_dump($noResult);
                  if($row > 0){
                      while($row1 = mysqli_fetch_array($result)){
                          $id = $row1['thread_id'];
                        echo '<div class="media my-3">
                                <img src="images/image2.png" width="54px" class="mr-3" alt="...">
                                <div class="media-body">
                                    <h5 class="mt-0"><a href="thread.php?threadid='.$id.'" class="text-dark">'.$row1['thread_title'].'</a></h5>
                                    '.$row1['thread_desc'].'
                                </div>
                            </div>';
                       }
                  }
                  else{
                       echo '<div class="jumbotron jumbotron-fluid">
                      <div class="container">
                        <p class="display-4">No Result Found</p>
                        <p class="lead">Be the first persion to ask a question.</p>
                      </div>
                    </div>';
                  }
              }

     ?>
    </div>

    <?php include 'partials/footer.php'; ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script>
    // console.log("hey");
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        });
    }, 2000);
    </script>
</body>

</html>