<?php 
require_once '../scripts/functions.php';
// Connect to MySql db
connect(); 
// If statement to filter for page load	
if (isset($_GET['itemType']))
{
    switch($_GET['itemType'])
    {
        case'basic2':
		mysql_close();
		connect();
		
		$body = mysql_real_escape_string($_GET['body']);
		
		mysql_query("UPDATE pages SET body = '$body' WHERE id = '1'");
		updatedhome();
		break;
	}
}
else{
	// Display admin home page
	$result = mysql_query("SELECT id, admintitle, body FROM pages WHERE id='1'");
	$row = mysql_fetch_array($result);?>
	<h1>Edit Your Home Page</h1><br>
	<form action="aa" method="post" id="home-update">
		<textarea  cols="90" rows="20"id="homey" ><?php echo $row['body']; ?></textarea><br>
		<center><input type="button" value="Save" onclick="nicEditors.findEditor('homey').saveContent();updatehomepage()"></input></center>
	</form><?php
}
function updatedhome() {
	// Function for admin home page after update
	$result = mysql_query("SELECT id, admintitle, body FROM pages WHERE id='1'");
	$row = mysql_fetch_array($result);
	echo "<h1>Home Page Updated</h1>";
	echo $row['body'];?>
	<?php
}
mysql_close();?>
