<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<link rel ="StyleSheet" href="../css/admincss.css"/>
<title>Cuba Street Bakehouse Login</title>
</head>
<body>
<div id="admincontainer">
	<div id="logindiv">
	<?php
    $login_form = <<<EOD
	<center><form name="login" id="login" method="POST" action="login_check.php">
	<table>
	<tr><td witdh="190px"><label for="username">Please Enter Username: </label></td><td><input type="text" size="25" name="username" id="username" value="Enter Username here" /></td></tr>
	<tr><td><label for="password">Please Enter Password: </label></td><td><input type="password" size="25" name="password" id="password" value="" /></td></tr><tr><td colspan="2"> &nbsp </td></tr>
	<td colspan="2"><center><p><input type="submit" name="submit" id="submit" value="Submit"/> <input type="reset" name="reset" id="reset" value="Reset"/></p></center></td>
	</form></table><br></center>
EOD;
	//GET the message
	$msg = $_GET['msg']; 
	//If message is set echo it 
	if($msg!='') echo '<p>'.$msg.'</p>'; 
	echo "<center><h1>Please enter your Login Information</h1></center><br><br>";
	echo $login_form;	?>
	</div>
</div>
</body>
</html>