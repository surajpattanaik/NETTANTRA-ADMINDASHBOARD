<?php 
include "db_conn.php";

if (isset($_POST['submit'])) {


function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}


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
		header("Location: adduser.php?error=Name is required");
	    exit();
	}if (empty($email)) {
		header("Location: adduser.php?error=Email is required");
	    exit();
	}if(empty($pass)){
        header("Location: adduser.php?error=Password is required");
	    exit();
	}if(empty($filename)){

        $sql ="INSERT INTO `users`(`uname`, `email`, `password`, `highest qualification`, `technical skills`, `address`) VALUES ('$name','$email','$pass','$hq','$ts','$add')";
		if (mysqli_query($conn, $sql)) {
			header("Location: adduser.php?success=User added successfully");
		        exit();
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}else if (move_uploaded_file($tempname, $uploadfile)) { 
		$sql ="INSERT INTO `users`(`uname`, `email`, `password`, `highest qualification`, `technical skills`, `address`,`image`) VALUES ('$name','$email','$pass','$hq','$ts','$add','$uploadfile')";
		if (mysqli_query($conn, $sql)) {
			header("Location: adduser.php?success=User added successfully");
		        exit();
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}else{
	header("Location: adduser.php?error=image couldn't be uploaded");
    exit();
}
}else{
	header("Location: adduser.php");
	exit();
}