<?php
    include 'partials/dbconnection.php';

    $query = "SELECT * FROM `categories` ";
    $result = mysqli_query($conn, $query);

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
    <!-- <link rel="shortcut icon" href="images/image1.jpg" type="image/x-icon"> -->

    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer">
        
    <link rel="stylesheet" href="css/test.css">
    <link rel="stylesheet" type="text/css" href="css/user-menu.css">

    <!-- dynamic title -->
    <title>Hello, world!</title>
</head>

<body>
    <?php include 'partials/header.php'; ?>
    <!-- <div class="container d-flex justify-content-center align-items-center">
        <img class="rounded-circle" src="images/image4.jpg" alt="Generic placeholder image" width="140" height="140">
    </div> -->
    <!-- to be type string -->
    <div id="typed-strings">
        <p>Welcome to coding <strong>forum</strong> .</p>
        <p>Share your problem or answer.</p>
        <p>And improve your skill :)</p>
        <p>This website designed for developer.</p>
    </div>

    <div class="container text-center headerset" id="typed-strings">
        <!-- <h2 class="text-capitalize">Welcome to coding forum! </h2> -->
        <h1><span id="typed"></span></h1>
        <a href="questions.php" class="btn btn-warning text-white btn-lg mt-2 text-capitalize">Explore your
            kwonledge</a>
    </div>
    </div>

    <!-- category container start here -->
    <!-- <div class="wrapper row3">
        <main class="hoc container clear">
            <h2 class="text-center my-3">Categories</h2>
            <div class="row"> -->

                <!-- use a for loop to iterate categories -->
                <?php //foreach($result as $r){ // handle object ?>
                <!-- <div class="col-md-4 my-2">
                    <div class="card" style="width: 18rem;">
                        <img src="images/image1.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><a
                                    href="threadlist.php?cat_id=<?php //echo $r['category_id']; ?>"><?php //echo $r['category_name']; ?></a>
                            </h5>
                            <p class="card-text"><?php //echo substr($r['category_description'], 0, 90); ?>......</p>
                            <a href="threadlist.php?cat_id=<?php //echo $r['category_id']; ?>"
                                class="btn btn-primary">View Thread</a>
                        </div>
                    </div>
                </div> -->
                <?php //} ?>

            </div>
        </main>
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
    <!-- jquery js -->
    <script src="js/jquery-3.5.1.min.js"></script>
    <!-- backtotop js -->
    <!-- <script src="layout/scripts/jquery.backtotop.js"></script> -->
    <!-- type.js cdn -->
    <script src="https://s3.amazonaws.com/myadvobuck/static/libs/typed.min.js"></script>

    <script type="text/javascript">
    
        var type = new Typed('#typed', {
            stringsElement: '#typed-strings',
            typeSpeed: 100,
            backSpeed: 20,
            loop: true,
            loopCount: 20,
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