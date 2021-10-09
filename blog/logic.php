<?php

	$conn = mysqli_connect('localhost', 'root', '', 'formdb');
	if (!$conn) {
		die("error".mysqli_connect_error());
	}
	// else{
	// 	echo "Successful";
	// }
	
	// Fetch all the data
	$sql = "select * from data";
	$query = mysqli_query($conn, $sql);

	if (isset($_REQUEST['new_post'])) {
		$title = $_REQUEST['title'];
		$content = $_REQUEST['content'];

		$query = "insert into data(title, content) values('$title', '$content')";
		$result = mysqli_query($conn, $query);

		header("location: index1.php?info=added");
		exit();
	}

	// get id from link
	if (isset($_REQUEST['id'])) {
		$id = $_REQUEST['id'];

		$sql = "select * from data where id = '$id' ";
		$query = mysqli_query($conn, $sql);
	}

?>