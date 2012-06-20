<?php
//Start the session
session_start();
//Get the user name from the previously registered super global variable
define(ADMIN,$_SESSION['name']);
//If session not registered 
if(!session_is_registered("admin"))
{ 
	// Redirect to login.php page
	header("location:login.php"); 
}
// Else display page as normal
else { ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php
require_once '../scripts/functions.php';
// Connect to MySql db
connect(); 
?>
<html>
<head>
<link rel ="StyleSheet" href="../css/admincss.css"/>
<script type="text/javascript" src="../scripts/admin.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script> <script type="text/javascript">
//<![CDATA[
        bkLib.onDomLoaded(function() { nicEditors.allTextAreas({buttonList : ['bold','italic','underline','left','center','right','justify','ol','ul','fontSize','fontFamily','fontFormat','indent','outdent']}) });
  //]]>
  </script>
<title>AdminZone</title>
</head>
<body>
<div id='adminContainer'>
	<div id='adminWrapper'>
		<div id='header'><h1>Cuba Street BakeHouse Administration Area</h1></div>
		<div id='navbar'> <?php  include '../includes/adminnav.php' ?></div>
		<div id='main'> <?php include '../includes/homepage.php' ?> </div>
	</div>
</div>
</body>
</html> <?php 
}