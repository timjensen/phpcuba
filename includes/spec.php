<?php
require_once './scripts/functions.php';
// Connect to MySql db
connect(); 
// Check for current specials and display correct response
$result = mysql_query("SELECT name, sprice, spec FROM products WHERE spec IS NOT NULL");
$row = mysql_fetch_array($result);
if (date("Y-m-d") < $row['spec']) {?>
	<br>At Cuba StreetBakehouse This Week<br>
	Delicous <?php echo $row['name'] ?> Only $<?php echo $row['sprice'] ?>
	<?php
}
else { echo "<br>New Specials Coming Soon!!"; }?>