<?php
//Set UserName
$username = $_POST['username']; 
//Set Password
$password = $_POST['password']; 
$msg ='';
// If statement to assure password and user name are set
if(isset($username, $password)) {
	//Starts Output buffer
    ob_start();
    //Initiate the MySQL connection
	require_once '../scripts/functions.php';
	connect();  
    // To protect from MySQL injection 
    $myusername = stripslashes($username);
    $mypassword = stripslashes($password);
    $myusername = mysql_real_escape_string($myusername);
    $mypassword = mysql_real_escape_string($mypassword);
    $sql="SELECT * FROM settings WHERE name='$myusername' and value='$mypassword'";
    $result=mysql_query($sql);
    // Mysql_num_row is counting table row
    $count=mysql_num_rows($result);
    // If result matched $myusername and $mypassword, table row must be 1 row
    if($count==1){
        // Register $myusername, $mypassword and redirect to admin homepage
		session_register("admin");
        session_register("password");
        $_SESSION['name']= $myusername;
        header("location:index.php");
    }
    else {
        $msg = "Wrong Username or Password. Please retry, $myusername, $mypassword";
        header("location:login.php?msg=$msg");
    }
    ob_end_flush();
}
else {
    header("location:login.php?msg=Please enter some username and password");
}
?>