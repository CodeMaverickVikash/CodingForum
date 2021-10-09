<?php
    include 'partials/dbconnection.php';
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- jquery ui and bootstrap tokenfield css cdn -->
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tokenfield/0.12.0/css/bootstrap-tokenfield.min.css">

    <!-- bootstrap and summernote css -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">

    <!-- highlight css -->
    <!-- <link rel="stylesheet" href="./styles/base16/atelier-dune.min.css"> -->
    <!-- <link rel="stylesheet" href="./styles/a11y-dark.min.css"> -->
    <link rel="stylesheet" href="./styles/monokai-sublime.min.css">
    <!-- highlight js -->
    <script src="js/highlight.min.js"></script>
  <script>hljs.highlightAll();</script>

    <!-- prism css -->
    <!-- <link rel="stylesheet" type="text/css" href="css/prism.css"> -->
    <!-- prism js -->
    <!-- <script type="text/javascript" src="js/prism.js"></script> -->

    <link rel="stylesheet" type="text/css" href="css/user-menu.css">

    <title>Hello, world!</title>
    <style type="text/css">
    body {
        background-color: #e9ecef;
    }

    .tokenfield .token {
        height: 25px;
    }

    .copy-to-clipboard-button {
        margin-right: 19px;
    }

    .st {
        max-height: 600px;
    }
    </style>
</head>

<body>
    <?php include 'partials/header.php'; ?>

    <!-- fetching all content from Que_threads -->
    <?php
                  if(isset($_REQUEST['que']) == true){
                      $slug = $_REQUEST['que'];
                      $sql1 = "select * from que_threads where slug = '$slug'";
                      $query1 = mysqli_query($conn, $sql1);

                      while($row = mysqli_fetch_array($query1)){
                          echo '<div class="container my-4">
                            <div class="jumbotron">
                                <h1 class="display-4">'.$row['thread_title'].'</h1>
                                <hr class="my-4">
                                <p class="lead">'.$row['thread_desc'].'</p>
                                
                                <p class="text-right"><b>Posted by '.$row['posted_by'].'</b></p>
                                <hr class="mt-4">
                            </div>
                        </div>';
                       }
                    }
    ?>

    <div class="container">

        <!-- fetching answer -->
        <?php

                    // get id from link
                    if (isset($_REQUEST['que'])) {
                    $slug = $_REQUEST['que'];

                    // fetch comment if post_id is $id 
                    $sql3 = "select * from comment where que_slug = '$slug' ";
                    $query3 = mysqli_query($conn, $sql3);
                    $num_rows = mysqli_num_rows($query3);
                    echo '<h3 class="border-bottom border-gray pb-2 mb-0">'.$num_rows.' Reply</h3>';
                    // echo $thread_id;
                    $number_answer = 1;
                    if($num_rows > 0){
                        while($row3 = mysqli_fetch_array($query3)){
                        $commentid = $row3['comment_id'];
                        $commentcontent = $row3['comment_content'];
                        $time = $row3['corrent_time'];
                        // $user_name = $row3['username'];
                        $user_name2 = $row3['comment_by'];
                            
                        echo '<h6 class="border-bottom border-gray pb-2 mb-0">'.$number_answer.' Answers</h6>
                        '.$commentcontent.'';
                        $number_answer++;
                        }
                    }
                    else{
                       echo '<div class="jumbotron jumbotron-fluid">
                      <div class="container">
                        <p class="display-4">There is no answer.</p>
                        <p class="lead">Be the first persion to ask a question.</p>
                      </div>
                    </div>';
                  }
                    }

                ?>

        <!-- submitting answer -->
        <?php

            // Submit answer
            // $method = $_SERVER['REQUEST_METHOD']; // when you want to request at same page and show undefined index do this
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                // $name = $_POST['name'];
                $c_content = $_POST['desc'];
                $answer = addslashes($c_content);
                $slug = $_REQUEST['que'];

                // session_start();
                // $u_name = $_SESSION['firstname'].$_SESSION['lastname'];

                // insert into comments table
                $sql = "INSERT INTO `comment`(`comment_content`, `que_slug`, `comment_by`, `username`, `corrent_time`) VALUES ('$answer','$slug','sanu','vikash',current_timestamp())";

                $query = mysqli_query($conn, $sql);

                echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>success!</strong> Your comment has been added!.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div> ';

    }
?>

        <!-- answer form -->
        <div class="container" style="margin:0 auto; float:none;">
            <form action="<?php echo htmlentities($_SERVER['REQUEST_URI']) ?>" method="post">
                <div class="form-group">
                    <label for="exampleInputPassword1">Drop your answer</label>
                    <textarea name="desc" id="summernote" class="form-control pr" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-success mb-3">Drop your answer</button>
            </form>
        </div>
        <div id="preview"></div>


    </div>

    <?php include 'partials/footer.php'; ?>

    <!-- Optional JavaScript -->
    <!-- jquery, proper, bootstrap and summernote js -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>



    <!-- jquery cdn -->
    <!-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script> -->

    <!-- autofill.js and tags.js -->
    <script type="text/javascript" src="js/autofill.js"></script>
    <script type="text/javascript" src="js/tags.js"></script>

    <!-- jquery ui and bootstrap tokenfield js cdn -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tokenfield/0.12.0/bootstrap-tokenfield.js"></script>

    <script>
    var HelloButton = function(context) {
        var ui = $.summernote.ui;

        // create button
        var button = ui.button({
            contents: 'Code block',
            tooltip: 'place your code',
            click: function() {
                
                $('#summernote').summernote('pasteHTML',
                        '<pre class="st"><code class="language-html" id="target">Place your code here</code></pre>');

                var node = document.getElementById('target');
                if (document.body.createTextRange) {
                    const range = document.body.createTextRange();
                    range.moveToElementText(node);
                    range.select();
                } else if (window.getSelection) {
                    const selection = window.getSelection();
                    const range = document.createRange();
                    range.selectNodeContents(node);
                    selection.removeAllRanges();
                    selection.addRange(range);
                } else {
                    console.warn("Could not select text in node: Unsupported browser.");
                }
            }
        });
    
        return button.render(); // return button as jquery object 

    }

    $('#summernote').summernote({
        placeholder: 'Type here.....',
        minHeight: 200,
        toolbar: [
            ['style', ['style']],
            ['mybutton', ['hello']],
            ['font', ['bold', 'italic', 'underline', 'clear']],
            ['para', ['ul', 'ol']],
            ['height', ['height']],
            ['insert', ['link', 'picture']],
            ['view', ['fullscreen', 'codeview']],
            ['help', ['help']]
        ],

        buttons: {
            hello: HelloButton
        }
    });
    </script>

    <script type="text/javascript">
    function menuToggle() {
        const menuToggle = document.querySelector('.menu');
        menuToggle.classList.toggle('active');
    }
    </script>
    <script>
	// var id = document.getElementById('summernote');
	// var previews = document.getElementById('preview');
	// id.addEventListener('click', ()=>{
	// 	console.log("hellllll");
	// 	})
</script>

</body>

</html>