<!-- unset and destroy the session variables when user logs out. -->
<?php 
session_start();

session_unset();
session_destroy();

header("Location: index.php");