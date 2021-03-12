  <?php 
  session_start();
  include "db_conn.php";

  if (isset($_GET['edit'])) {
  	$id=$_GET['edit'];
  	$sql = "SELECT * FROM users WHERE uid=$id";

  		$result = mysqli_query($conn, $sql);

  		if (mysqli_num_rows($result) === 1) {

  			$row = mysqli_fetch_assoc($result);
  			$name=$row['uname'];
  			$email=$row['email'];
  			$password=$row['password'];
  			$address=$row['address'];
  			$hq=$row['highest qualification'];
  			$ts=$row['technical skills'];
  			
  			
  		}
  }

   ?>

   <!DOCTYPE html>
  <html>
  <head>


       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
       <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


  	<title>Edit User</title>
  	<link rel="stylesheet" type="text/css" href="style1.css">
       <style type="text/css">
            input {
       display: block;
       border: 2px solid #ccc;
       width: 95%;
       padding: 10px;
       margin: 10px auto;
       border-radius: 5px;
  }
  label {
       color: #888;
       font-size: 15px;
       padding: 5px;
  }
  .error {
     background: #F2DEDE;
     color: #A94442;
     padding: 10px;
     width: 95%;
     border-radius: 5px;
     margin: 20px auto;
  }

       </style>
  </head>
  <body>

  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <button class="navbar-brand" data-toggle="modal" data-target="#myModal"><?php echo $_SESSION['name']; ?></button>
      </div>
      <ul class="nav navbar-nav">
        <li class="active"><a href="home.php">Home</a></li>
        <li ><a href="#">About Us</a></li>
        <li ><a href="#">Contact Us</a></li>
        <li><a href="logout.php">Logout</a></li>
      </ul>
    </div>
  </nav>

  <div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><?php echo $_SESSION['email']; ?></h4>
        </div>
        <div class="modal-body">
          <p>Hello <?php echo $_SESSION['name']; ?>!!!</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>


  <div class=" justify-content-center" style="background: #1690A7;
       display: flex;
       justify-content: center;
       align-items: center;
       height: 100vh;
       flex-direction: column;
       margin-top: 10px;
       margin-bottom: 10px">


       <form style="width: 500px;
       border: 2px solid #ccc;
       padding: 30px;
       background: #fff;
       border-radius: 15px;" action="processedit.php" method="post" enctype="multipart/form-data">
       	<h2 style="text-align: center;
       margin-bottom: 40px;">EDIT USER</h2>
       	<?php if (isset($_GET['error'])) { ?>
       		<p class="error"><?php echo $_GET['error']; ?></p>
       	<?php }?>
        <input type="hidden" name="id" value="<?php echo $id ?>">
            <label>User Name</label>
            <input type="text" name="name" value="<?php echo($name);?>" placeholder="Enter Name"><br>
       	<label>Email</label>
       	<input type="email" name="email" value="<?php echo($email);?>" placeholder="User E-mail"><br>

       	<label>Password</label>
       	<input type="password" name="password" value="<?php echo($password);?>" placeholder="User password"><br>

            <label>Address</label>
            <input type="text" name="address" value="<?php echo($address);?>" placeholder="Enter address"><br>

            <label>Highest Qualification</label>
            <input type="text" name="hq" value="<?php echo($hq);?>" placeholder="Users' highest Qualification"><br>

            <label>Technical Skills</label>
            <input type="text" name="ts" value="<?php echo($ts);?>" placeholder="Technical Skills"><br>
            <label>Profile photo</label>
            <input type="file" name="image"><br>


       	<button style="float: right;
       background: #555;
       padding: 10px 15px;
       color: #fff;
       border-radius: 5px;
       margin-right: 10px;
       border: none;" type="submit" name="update">Update</button>

       </form>
  </div>





  </body>
  </html>