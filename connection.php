<?php
	$host = "localhost";
	$username = "root";
	$password = "";
	$database = "db_blog";
	$koneksi = mysqli_connect($host, $username, $password, $database);
	if ($koneksi) {
	echo "";
	}else {
	echo "Server not Connected";
	}
	?>
