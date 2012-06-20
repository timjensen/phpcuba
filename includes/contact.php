<?php 
require_once '../scripts/functions.php';
connect(); 
// If statement to filter for page load
if (isset($_GET['itemType']))
{
    switch($_GET['itemType'])
    {
        case'basic3':
		mysql_close();
		connect();
		
		$body = mysql_real_escape_string($_GET['body']);
		mysql_query("UPDATE pages SET body = '$body' WHERE id = '4'");
		updatedcontact();
		break;
	}
}
else{
	// Display admin contact page
	$result = mysql_query("SELECT id, admintitle, body FROM pages WHERE id='4'");
	$row = mysql_fetch_array($result);?>
	<h1>Edit Your Contacts Page</h1><br>
	<form action="aa" method="post" id="contact-update">
		<textarea  cols="90" rows="20"id="contact" ><?php echo $row['body']; ?></textarea><br>
		<center><input type="button" value="Save" onclick="nicEditors.findEditor('contact').saveContent();updatecontactpage()"></input></center>
	</form><?php
}
// Function for admin contact page after update
function updatedcontact() {
	$result = mysql_query("SELECT id, admintitle, body FROM pages WHERE id='4'");
	$row = mysql_fetch_array($result);
	echo "<h1>Contact Page Updated</h1>";
	echo $row['body'];?>
	<?php
}
mysql_close();?>
