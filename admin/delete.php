<?php 
require_once '../scripts/functions.php';
// Connect to MySql db
connect();
// Variable and if statement to check either staff or product
$forsort = $_GET['sort'];
if ($forsort == "staff") {
	// Delete profile from db using staff id then redirect to admin staff page
	$num = $_GET['id'];
	mysql_query("DELETE FROM staff WHERE id='".$num."'");
	header("location:staff.php"); 
}
else {
	// Delete product from db using product id then redirect to admin product page
	$num = $_GET['id'];
	mysql_query("DELETE FROM products WHERE id='".$num."'");
	header("location:prod.php"); 
}


