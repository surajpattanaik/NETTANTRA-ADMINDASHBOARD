  
  <!-- start the session and checks if the session variables are null, if null, redirects user to index page and terminate the current script -->
  <?php 
  session_start();

  if (isset($_SESSION['id']) && isset($_SESSION['name'])) {

   ?>
   <!DOCTYPE html>
  <html>
  <head>

      <!--this script is used to unset the get variables from the query string of the page upon refresh.  -->

       <script>    
      if(typeof window.history.pushState == 'function') {
          window.history.pushState({}, "Hide", '<?php echo $_SERVER['PHP_SELF'];?>');
      }
      </script>

      <!-- used bootstrap -->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
       <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


  	<title>Add User</title>
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
       border-radius: 15px;" action="processregister.php" method="post" enctype="multipart/form-data">
       	<h2 style="text-align: center;
       margin-bottom: 40px;">ADD USER</h2>
       <!-- checks if the get variables received from processregister are null, if not, print them. -->
       	<?php if (isset($_GET['error'])) { ?>
       		<p class="error"><?php echo $_GET['error']; ?></p>
       	<?php }else if(isset($_GET['success'])) { ?>
            <p style="color: green"><?php echo $_GET['success']; ?></p>
            <?php } ?>

            <label>User Name</label>
            <input type="text" name="name" placeholder="Enter Name"><br>
       	<label>Email</label>
       	<input type="email" name="email" placeholder="User E-mail"><br>
   
       	<label>Password</label>
       	<input type="password" name="password" placeholder="User password"><br>

            <label>Address</label>
            <input type="text" name="address" placeholder="Enter address"><br>

            <label>Highest Qualification</label>
            <input type="text" name="hq" placeholder="Users' highest Qualification"><br>

            <label>Technical Skills</label>
            <input type="text" name="ts" placeholder="Technical Skills"><br>
             <label>Profile photo</label>
            <input type="file" name="image"><br>


       	<button style="float: right;
       background: #555;
       padding: 10px 15px;
       color: #fff;
       border-radius: 5px;
       margin-right: 10px;
       border: none;" type="submit" name="submit">Add</button>

       </form>
  </div>





  </body>
  </html>
  <?php 
  }else{
       header("Location: index.php");
       exit();
  }
   ?>