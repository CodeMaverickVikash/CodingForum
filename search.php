<?php
    include 'partials/dbconnection.php';

    $query = "SELECT * FROM `categories` ";
    $result = mysqli_query($conn, $query) 

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
    <style>
    .container {
        min-height: 100vh;
    }
    </style>
</head>

<body>
    <?php include 'partials/header.php'; ?>

    <!-- Search results -->
    <!-- how to enable fulltext search in mysql -->
    <!-- ALTER TABLE que_threads ADD FULLTEXT(`thread_title`, `thread_desc`); -->

    <div class="container my-3">
        <h1 class="py-3">Search result for "<?php echo $_GET['query'] ?>"</h1>

        <?php
                    $query = $_GET["query"];
                      $sql1 = "SELECT * FROM `que_threads` WHERE MATCH (thread_title, thread_desc) against ('$query')";
                      $query1 = mysqli_query($conn, $sql1);

                      $row1 = mysqli_num_rows($query1);
                      if($row1 > 0){
                            while($row = mysqli_fetch_array($query1)){
                              $title = $row['thread_title'];
                              $desc = $row['thread_desc'];
                              $id = $row['thread_id'];

                                //   desplay the search result
                                echo '<div class="result">
                                <h3><a href="/completewebsite/thread.php?threadid='.$id.'">'.$title.'</a></h3>
                            </div>';
                            }
                      }
                      else{
                        echo '<div class="container">
                                    <p class="display-4">No Result Found</p>
                            </div>';
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
</body>

</html>