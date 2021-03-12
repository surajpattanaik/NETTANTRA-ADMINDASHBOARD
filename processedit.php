<?php 
include "db_conn.php";


if (isset($_POST['update'])) {
function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

    $uid=$_POST['id'];
	$email = validate($_POST['email']);
	$pass = validate($_POST['password']);
	$name = validate($_POST['name']);
	$add = validate($_POST['address']);
	$hq = validate($_POST['hq']);
	$ts = validate($_POST['ts']);
	$filename = $_FILES["image"]["name"]; 
    $tempname = $_FILES["image"]["tmp_name"];     
    $folder = 'images/'; 
    $uploadfile = $folder . basename($filename);


	if (empty($name)) {
		header("Location: edit.php?error=Name is required");
	    exit();
	}if (empty($email)) {
		header("Location: edit.php?error=Email is required");
	    exit();
	}if(empty($pass)){
        header("Location: edit.php?error=Password is required");
	    exit();
	}
	if(empty($filename)){

        $sql ="UPDATE `users` SET `uname`='$name',`email`='$email',`password`='$pass',`highest qualification`='$hq',`technical skills`='$ts',`address`='$add' WHERE uid=$uid";
		if (mysqli_query($conn, $sql)) {
			header("Location: home.php?success=User updated");
		        exit();
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}else if(move_uploaded_file($tempname, $uploadfile)){ 
		$sql ="UPDATE `users` SET `uname`='$name',`email`='$email',`password`='$pass',`highest qualification`='$hq',`technical skills`='$ts',`address`='$add',`image`='$uploadfile' WHERE uid=$uid";
		if (mysqli_query($conn, $sql)) {
			header("Location: home.php?success=User updated");
		        exit();
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}else{
	header("Location: home.php?error=image couldn't be uploaded");
    exit();
}
}
?>