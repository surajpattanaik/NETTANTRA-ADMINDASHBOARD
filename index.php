<!DOCTYPE html>
<html>
<head>
     <script>    
    if(typeof window.history.pushState == 'function') {
        window.history.pushState({}, "Hide", '<?php echo $_SERVER['PHP_SELF'];?>');
    }
</script>
	<title>USER LOGIN</title>
    <!-- designed the login page using HTML/CSS but used BootStrap for homepage. -->
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
     <form action="login.php" method="post">
     	<h2>LOGIN</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
     	<label>Email</label>
     	<input type="email" name="email" placeholder="E-mail"><br>

     	<label>password</label>
     	<input type="password" name="password" placeholder="enter password"><br>

     	<button type="submit">Login</button>
     </form>
</body>
</html>