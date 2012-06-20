<?php 
require_once '../scripts/functions.php';
// Connect to MySql db
connect(); 
// Create form in multi string variable
$create_form = <<<EOT
	<h5>Enter New Staff Members Details</h5>
	<form action="bb" method="post" id="staff-create" style="margin-left: 5px;">
		<table>
			<tr>
				<td width="175px;"><label for="Staff_Name">Staff Member Name:</label></td>
				<td><input type="text" id="s-name"></td>
			</tr>
			<tr>
				<td width="175px;"><label for="Staff_Title">Staff Member Title:</label></td>
				<td><input type="text" id="s-title"></td>
			</tr>
		</table>
		<label>Staff Members Bio:</label><br>
		<textarea id="s-bio" cols="30" rows="5"></textarea><br><br>
		<center><input type="button" value="Create" onclick="staffadd()"></input></center>
	</form>
EOT;
// If filter for page display or staff create statement
if (isset($_GET['action']))
{
	mysql_close();
	connect();
		
	$name = mysql_real_escape_string($_GET['name']);
	$title = mysql_real_escape_string($_GET['title']);
	$bio = mysql_real_escape_string($_GET['bio']);
	
	if($name == '') {
	// Product creation form with error msg
	echo $create_form; 
	echo "<p>Staff profile cannot be created without a staff members name!!</p>";
	}
	else{
	
	mysql_query("INSERT INTO `cubastreet`.`staff` (`id`, `name`, `title`, `blurb`, `image`) VALUES (NULL, '$name', '$title', '$bio', 'comingsoon.png')");
	echo "Your staff profile has been successfully created";
	}
} else {
	// Create staff form
	echo $create_form;
}