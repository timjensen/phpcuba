<?php
require_once '../scripts/functions.php';
// Connect to MySql db
connect(); 
// Check for current specials and display correct response
$result = mysql_query("SELECT name, spec FROM products WHERE spec IS NOT NULL");
$row = mysql_fetch_array($result);
if (date("Y-m-d") < $row['spec']) {?>
	<?php echo $row['name'] ?> is currently set as this weeks special
	<?php
}
else if (date("Y-m-d") > $row['spec']){ ?>
	<?php echo $row['name'] ?> is set as a special but has expired <?php
}
else { echo "No specials currently set"; }?>