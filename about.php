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
    <link rel="stylesheet" type="text/css" href="css/user-menu.css">
    <style type="text/css">
    .container {
        min-height: 100vh;
    }
    </style>
</head>

<body>
    <?php include 'partials/header.php' ?>

    <main role="main">

        <!-- Main jumbotron for a primary marketing message or call to action -->
        <div class="jumbotron">
            <div class="container">
                <h3 class="display-3 text-capitalize text-center">Welcome to coding forum</h3>
                <p class="my-4"><strong>Lorem</strong> ipsum dolor sit amet consectetur adipisicing elit. Nemo et iusto maxime hic, corrupti illo repellat, ex delectus autem aspernatur alias aliquid, modi itaque! Dicta, quos quaerat voluptates reprehenderit qui nihil ad omnis est! <strong>Lorem</strong> ipsum dolor sit amet consectetur adipisicing elit. Obcaecati et commodi mollitia accusantium consequatur, ad ipsam necessitatibus quasi, possimus odio velit! Labore, totam repudiandae incidunt nesciunt eveniet pariatur et molestiae.</p>
            </div>
        </div>

    </main>


    <?php include 'partials/footer.php' ?>

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
    <script type="text/javascript">
    function menuToggle() {
        const menuToggle = document.querySelector('.menu');
        menuToggle.classList.toggle('active');
    }
    </script>
</body>

</html>