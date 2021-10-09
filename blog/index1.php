<?php

	include 'logic.php';   // Now i am able to access everything from logic.php

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Blog using php and mysql</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>

	<?php
		if (isset($_REQUEST['info'])) { // ager request ke under info hai
			if (isset($_REQUEST['info']) == 'added') {
				?>

				<div class="alert alert-success" role="alert">
									Post has been added successfully
								</div>
				<?php
			}
		}
	?>

	<div class="container mt-5">
		<div class="text-center">
			<a href="create.php" class="btn btn-outline-dark">Create a new post</a>
		</div>
	</div>

	<div class="row">
		
		<?php foreach ($query as $q) { ?>
				<div class="col-4 d-flex justify-content-center align-items-center">
					<div class="card text-white bg-dark mt-5">
						<div class="card-body" style="width: 18rem">
							<h5 class="card-title"><?php echo $q['title']; ?></h5>
							<p class="card-text"><?php echo $q['content']; ?></p>
							<a href="view.php?id=<?php echo $q['id'] ?>" class="btn btn-light">Read more <span class="text-danger">&rarr;</span></a>
						</div>
					</div>
				</div>
		<?php } ?>

	</div>


	<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>