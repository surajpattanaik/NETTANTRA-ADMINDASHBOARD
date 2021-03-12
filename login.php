
<!-- checks if email and password coming from index page are null, if not, checks if they are empty, if empty append error message in the query string and redirect the page to index.php and terminate the current script if not empty, redirect the user to home.php. -->
<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['email']) && isset($_POST['password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$email = validate($_POST['email']);
	$pass = validate($_POST['password']);

	if (empty($email)) {
		header("Location: index.php?error=Email is required");
	    exit();
	}else if(empty($pass)){
        header("Location: index.php?error=Password is required");
	    exit();
	}else{
		$sql = "SELECT * FROM users WHERE email='$email' AND password='$pass'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['email'] === $email && $row['password'] === $pass) {
            	$_SESSION['image'] = $row['image'];
            	$_SESSION['email'] = $row['email'];
            	$_SESSION['name'] = $row['uname'];
            	$_SESSION['id'] = $row['uid'];
            	header("Location: home.php");
		        exit();
            }else{
				header("Location: index.php?error=Incorect Email or Password 222");
		        exit();
			}
		}else{
			header("Location: index.php?error=Incorect Email or Password 111");
	        exit();
		}
	}
	
}else{
	header("Location: index.php");
	exit();
}