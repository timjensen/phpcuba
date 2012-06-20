<?php 
require_once '../scripts/functions.php';
// Connect to MySql db
connect(); 
// If filter for page display or update
if (isset($_GET['pro']))
{
	$idd = $_GET['pro'];
	$result = mysql_query("SELECT * FROM products WHERE id='$idd'");
	$row = mysql_fetch_array($result);
	$destination_path = getcwd().DIRECTORY_SEPARATOR;
	// Grab list of image files in products directory to populate listbox
	if ($dir = opendir($destination_path . "../images/products/")) {
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
	<div id="oldinner">
		<form>
		<center>
			<p>Current Image</p>
			<img src="../images/products/<?php echo $row['image']?>" alt=""  height="180px" class="resizeme1" width="140px" onload=”$(this).aeImageResize({ height: 130, width: 150});” /><br>
			<label for=""><?php echo $row['image']; ?></label>
		</center>
	</div>
</div>
<?php echo '<div id="listbox_pro">'; ?>
<center><input type='text' id='piccy' value="<?php echo $row['image'];?>" disabled="disabled" ></center><br>
<?php
echo '<center><select size="10" id="lbx_pro" onchange="up();">';
foreach($images as $image) {
	echo '<option>';
	echo $image;
	echo '</option>';
}
echo '</select></center></div>';?>
<div id="picpic">
	<div id="newinner">
	<center>
		<label id="newpictitle">New Image</label><br>
		<img src="../images/products/<?php echo $row['image']?>" alt=""  height="180px" class="resizeme1" width="140px" onload=”$(this).aeImageResize({ height: 130, width: 150});” />
		<label id="newpic"><?php echo $row['image']; ?></label>
	</center>
	</div> 
</div>
<center><input type="button" Value="Update" onclick="update_pro_pic(<?php echo $row['id']; ?>);"></input>
</form></center><?php
} 
// Update process
else if (isset($_GET['action'])){
	$idd = $_GET['action'];
	$pic = $_GET['pic'];
	mysql_query("UPDATE products SET image = '$pic' WHERE id = '$idd'");
	echo "Your product has been successfully updated <br>";
} else {
	echo "Image change failed";
}?>