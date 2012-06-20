<?php 
require_once '../scripts/functions.php';
// Connect to MySql db
connect(); 
// If filter for page display or update statement
if (isset($_GET['pro']))
{
	$idd = $_GET['pro'];
	$result = mysql_query("SELECT * FROM staff WHERE id='$idd'");
	$row = mysql_fetch_array($result);
	$destination_path = getcwd().DIRECTORY_SEPARATOR;
	// Grab list of image files in staff directory to populate listbox
	if ($dir = opendir($destination_path . "../images/staff/")) {
	$images = array();
	while (false !== ($file = readdir($dir))) {
		if ($file != "." && $file != "..") {
			$images[] = $file; 
		}
	}
	closedir($dir);
}
// Image update form ?>
<div id="pichead">
	<h5><?php echo $row['name'];?></h5>
</div>
<div id="picpic">
	<div id="oldinner"><form>
		<center>
		<p>Current Image</p>
		<img src="../images/staff/<?php echo $row['image']?>" alt=""  height="180px" class="resizeme1" width="140px" onload=”$(this).aeImageResize({ height: 130, width: 150});” /><br>
		<label for=""><?php echo $row['image']; ?></label>
		</center>
	</div>
</div>
<?php echo '<div id="listbox_pro">'; ?>
<center><input type='text' id='staffpiccy' value="<?php echo $row['image'];?>" disabled="disabled" > </center><br>
<?php echo '<center><select size="10" id="lbx_pro_staff" onchange="upstaff();">';
foreach($images as $image) {
	echo '<option>';
	echo $image;
	echo '</option>';
}
echo '</select></center></div>';?>
<div id="picpic">
	<div id="staff_newinner">
		<center>
		<label id="newpictitle">New Image</label><br>
		<img src="../images/staff/<?php echo $row['image']?>" alt=""  height="180px" class="resizeme1" width="140px" onload=”$(this).aeImageResize({ height: 130, width: 150});” /><br>
		<label id="newpic"><?php echo $row['image']; ?></label>
		</center>
	</div> 
</div>
<center><input type="button" Value="Update" onclick="update_staff_pic(<?php echo $row['id']; ?>);"></input></form></center><?php
} 
// Update process
else if (isset($_GET['action'])){
	$idd = $_GET['action'];
	$pic = $_GET['pic'];
	mysql_query("UPDATE staff SET image = '$pic' WHERE id = '$idd'");
	echo "Your product has been successfully updated <br>";
	echo "$pic <br>";
	echo "$idd <br>";
} else {
echo "Image change failed";
}?>