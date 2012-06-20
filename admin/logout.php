<?php
//Start the current session
session_start(); 
//Destroy it! So we are logged out now
session_destroy(); 
// Move back to login.php with a logout message
header("location:../index.php"); 
?>