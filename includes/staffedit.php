<?php 
require_once '../scripts/functions.php';
// Connect to MySql db
connect(); 
// If filter for page display 
if (isset($_GET['pro']))
{
	$idd = $_GET['pro'];
	$result = mysql_query("SELECT * FROM staff WHERE id='$idd'");
	$row = mysql_fetch_array($result);
	// Edit staff form ?>
	<h5>Update Staff Members Information</h5>
	<form action="dd" method="post" id="staff-update" style="margin-left: 5px;">
		<input type="hidden" id="id" value="<?php echo $row['id']; ?>">
		<table>
			<tr>
				<td width="175px;"><label for="Staff_Name">Staff Member Name:</label></td>
				<td><input type="text" id="name" value="<?php echo $row['name']; ?>"></td>
			</tr>
			<tr>
				<td width="175px;"><label for="Staff_Title">Staff Member Title:</label></td>
				<td><input type="text" id="title" value="<?php echo $row['title']; ?>"></td>
			</tr>
		</table>
		<p><label for="bio">Staff Member Bio:<label></p>
		<textarea id="bio" cols="30" rows="5"> <?php echo $row['blurb']; ?> </textarea><br><br>
		<center><input type="button" value="Update" onclick="staffupdate()"></input></center>
	</form>
	<?php	
	mysql_close();
}
// If filter for edit statement and display
else if (isset($_GET['action']))
{
	mysql_close();
	connect();
		
	$id = mysql_real_escape_string($_GET['id']);
	$name = mysql_real_escape_string($_GET['name']);
	$title = mysql_real_escape_string($_GET['title']);
	$bio = mysql_real_escape_string($_GET['bio']);
	
	mysql_query("UPDATE staff SET name = '$name', title = '$title', blurb = '$bio'  WHERE id = '$id'");
	
	echo "Your staff profile has been successfully updated";
	echo "$diss";
}
else{
	echo "";
}?>