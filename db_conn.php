	<!-- i have used this page to generate connection with MySQL -->
	<?php

	$sname= "localhost:5506";
	$uname= "root";
	$password = "illusio9";

	$db_name = "nettantra";

	$conn = mysqli_connect($sname, $uname, $password, $db_name);

	if (!$conn) {
		echo "Connection failed!";
	}