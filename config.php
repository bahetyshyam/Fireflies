<?php
	ob_start();

	$con = mysqli_connect("35.200.141.8", "root", "nopassword", "Fireflies");

	if(mysqli_connect_errno()) {
		echo "Failed to connect: " . mysqli_connect_errno();
	}

	else
		echo "Database Connected";
?>