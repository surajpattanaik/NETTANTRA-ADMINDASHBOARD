<?php 
session_start();
include "db_conn.php";
if (isset($_GET['delete'])) {

	$uid=$_GET['delete'];
	$ownid=$_SESSION['id'];
	if ($uid===$ownid) {

		header("Location: home.php?error=Can not delete own data");
		        exit();
	
}else{
	$sql ="delete from users where uid=$uid";
		if (mysqli_query($conn, $sql)) {
			header("Location: home.php?delete=User deleted");
		        exit();
		    } else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}
}



 ?>