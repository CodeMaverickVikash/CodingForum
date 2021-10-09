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
    <?php

            // Submit question
            // $method = $_SERVER['REQUEST_METHOD']; // when you want to request at same page and show undefined index do this
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                // $name = $_POST['name'];
                $title = $_POST['title'];
                $slug = preg_replace('/[^a-z0-9]+/i', '-', trim(strtolower($_POST["title"]))); // making slug to title

                $body = $_POST['desc'];
                $tags = $_POST['skill'];
                $questions = addslashes($body);

                // session_start();
                $postedBy = $_SESSION['firstname'].$_SESSION['lastname'];

                // insert into comments table
                $sql = "INSERT INTO `que_threads`(`thread_title`, `thread_desc`, `thread_cat_id`, `posted_by`, `timestamp`, `tags`, `slug`) VALUES ('$title','$questions','','$postedBy',current_timestamp(),'$tags', '$slug')";
                $query = mysqli_query($conn, $sql);

                echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>success!</strong> Your query has been added!.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div> ';

            }
        ?>

    <!-- question form -->
    <?php
        if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true ){
                        echo '<h3 class="text-center mt-5">Ask a question</h3>
                        <div class="container col-md-6 my-5" style="margin:0 auto; float:none; background-color: beige;">
                        <form action="'.$_SERVER['REQUEST_URI'].'" method="post">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Problem Title</label>
                                <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Ellaborate your concern</label>
                                <textarea name="desc" id="summernote" class="form-control" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tags</label>
                                <small class="d-block">Add tags up to 3.</small>
                                <input type="text" name="skill" id="skill" class="form-control" />
                            </div>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </form>
                    </div>';
        }
        else{
            header("location: login.php");
        }
    ?>


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
            tooltip: 'place your code here',
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
        placeholder: 'Describe your questions.....',
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
    // autofill
    // $(function() {
    //         $("#autofill").autofill({
    //             data: ["javascript","jquery","mysql","sean","clark"]
    //         });
    //     });

    // tag
    // $('#autofill').tags();
    // $('#autofill').on("tagRemove", function(e, tag){
    //     console.log("remove", tag);
    // })

    // $('#autofill').tags({
    //     requireData: true,
    //     unique: true
    // }).autofill({
    //     data: ["javascript","jquery","mysql","sean","clark"]
    // });
    </script>

    <script>
    $(document).ready(function() {

        $('#skill').tokenfield({
            autocomplete: {
                source: ['PHP', 'Codeigniter', 'HTML', 'JQuery', 'Javascript', 'CSS', 'Laravel',
                    'CakePHP', 'Symfony', 'Yii 2', 'Phalcon', 'Zend', 'Slim', 'FuelPHP', 'PHPixie',
                    'Mysql'
                ],
                delay: 100
            },
            showAutocompleteOnFocus: true
        });

        // form validation
        $('#programmer_form').on('submit', function(event) {
            event.preventDefault();
            if ($.trim($('#name').val()).length == 0) {
                alert("Please Enter Your Name");
                return false;
            } else if ($.trim($('#skill').val()).length == 0) {
                alert("Please Enter Atleast one Skill");
                return false;
            } else {
                var form_data = $(this).serialize();
                $('#submit').attr("disabled", "disabled");

                $.ajax({
                    url: "insert.php",
                    method: "POST",
                    data: form_data,
                    beforeSend: function() {
                        $('#submit').val('Submitting...');
                    },
                    success: function(data) {
                        if (data != '') {
                            $('#name').val('');
                            $('#skill').tokenfield('setTokens', []);
                            $('#success_message').html(data);
                            $('#submit').attr("disabled", false);
                            $('#submit').val('Submit');
                        }
                    }
                });

                setInterval(function() {
                    $('#success_message').html('');
                }, 5000);
            }
        });

    });
    </script>
    <script type="text/javascript">
    function menuToggle() {
        const menuToggle = document.querySelector('.menu');
        menuToggle.classList.toggle('active');
    }
    </script>
</body>

</html>