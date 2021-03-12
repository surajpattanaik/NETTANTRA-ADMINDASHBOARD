	<?php 
	session_start();
	include "db_conn.php";


	if (isset($_SESSION['id']) && isset($_SESSION['name'])) {

	 ?> 
	<!DOCTYPE html>
	<html>
	<head>
		<script>    
	    if(typeof window.history.pushState == 'function') {
	        window.history.pushState({}, "Hide", '<?php echo $_SERVER['PHP_SELF'];?>');
	    }
	</script>

	<!-- I have used bootstrap for the NAVBAR and to show list of users. -->

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="style1.css">
		<title>HOME</title>
		
	</head>
	<body>
		<nav class="navbar navbar-inverse">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <button class="navbar-brand" data-toggle="modal" data-target="#myModal"><?php echo $_SESSION['name']; ?></button>
	    </div>
	    <ul class="nav navbar-nav">
	      <li class="active"><a href="#">Home</a></li>
	      <li ><a href="#">About Us</a></li>
	      <li ><a href="#">Contact Us</a></li>
	      <li><a href="adduser.php">Add User</a></li>
	      <li ><a href="logout.php">Logout</a></li>
	    </ul>
	  </div>
	</nav>

	<!-- Modal -->
	<div id="myModal" class="modal fade" role="dialog">
	  <div class="modal-dialog">

	    <!-- Modal content-->
	    <div style="background-color: pink" class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 style="text-align: center;" class="modal-title"><?php echo $_SESSION['email']; ?></h4>
	      </div>
	      <div class="modal-body">
	        <p style="text-align: center;">Hello <?php echo $_SESSION['name']; ?>!!!</p>
	        <img style="margin-left: 250px; border-radius: 50%;display: block;height:100px;max-width:100px;"src="<?php echo $_SESSION['image']; ?>">
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	      </div>
	    </div>

	  </div>
	</div>

	<?php
	$sql = "SELECT * FROM users";

			$result = mysqli_query($conn, $sql);

	?>
	<?php if (isset($_GET['delete'])) { ?>
	     		<p class="btn-danger"><?php echo $_GET['delete']; ?></p><?php }else if (isset($_GET['error'])) { ?>
	     			<p class="btn-danger"><?php echo $_GET['error']; ?></p>
	     		<?php }else if(isset($_GET['success'])){ ?>
	            <p class="btn-info"><?php echo $_GET['success']; ?></p>

	     		<?php } ?>


	<table align="center" class="table table-striped table-dark">
			<thead>
				<tr>
					<th>User ID</th>
					<th>User Name</th>
					<th>E-mail</th>
					<th>Password</th>
					<th>Address</th>
					<th>Highest Qualification</th>
					<th>Technical Skills</th>
					<th>Profile pic</th>
					<th>Action</th>
				</tr>
			</thead>
			<?php
			while ($row=mysqli_fetch_assoc($result)):		?>
			<tr>
				<td><?php echo $row['uid'] ?></td>
				<td><?php echo $row['uname'] ?></td>
				<td><?php echo $row['email'] ?></td>
				<td><?php echo $row['password'] ?></td>
				<td><?php echo $row['address'] ?></td>
				<td><?php echo $row['highest qualification'] ?></td>
				<td><?php echo $row['technical skills'] ?></td>
				<td><img style="border-radius: 50%;display: block;height:50px;max-width:50px;" src="<?php echo $row['image'] ?>"></td>

				<td>
					<a class="btn btn-primary" style="width:100px;" href="edit.php?edit=<?php echo $row['uid']; ?>">Edit
				</a>
						<a href="processdelete.php?delete=<?php echo $row['uid']; ?>"
							class="btn btn-danger">Delete User</a>

					</td>
			</tr>
		<?php endwhile; ?>
		</table>






	</body>
	</html>

	<?php 
	}else{
	     header("Location: index.php");
	     exit();
	}
	 ?>