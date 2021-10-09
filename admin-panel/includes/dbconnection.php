<?php

	$conn = mysqli_connect('localhost', 'root', '', 'formdb');
	if (!$conn) {
		die("error".mysqli_connect_error());
	}
	// else{
	// 	echo "Successful";
	// }

?>