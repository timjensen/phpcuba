<?php

// Database configuration
define('DB_NAME', 'CubaStreet');
define('DB_USER', 'root');
// Just for development password will be added for security of live site
define('DB_PASS', '');
define('DB_HOST', 'localhost');

// Base URL
define('BASE_URL', 'http://localhost/CubaStreet');

// Function for connection to MySql database
function connect() {
	$link = mysql_connect(DB_HOST, DB_USER, DB_PASS) or die('Could not connect. ' . mysql_error());
	mysql_select_db(DB_NAME) or die('Could not select database. ' . mysql_error());
}

//	Function to query the database and create a table of staff members for backend.
function showstaff() {
	$result = mysql_query("SELECT * FROM staff ");
	while($row = mysql_fetch_array($result)){
	?>
	<div id="staff">
	<div id="staffpic"><span></span><img src="./images/staff/<?php echo $row['image']?>" alt="" style="display: inline; "height="400px" class="resizeme1" width="400px" onload="vertAlignOnFly(this)" onload=”$(this).aeImageResize({ height: 150, width: 150})" /></div>
	<div id="smalltab"><table style="border-collapse: collapse;">
	<tr><td width="240px" style="padding-left: 5px; border-bottom: solid 1px #B47836;"><center><?php echo $row['name'] ?></center></td>
	<td width="280px" style="border-bottom: solid 1px #B47836;"><center><?php echo $row['title'] ?></center></td></tr>
	</table>
	</div>
	<div id="blurb"><?php echo $row['blurb'] ?></div>
	</div><br>
	<?php	
	}	
}

//	Function to query the database and create a table of staff members for backend.
function showstaffadmin() {
	?>
	<table><tr><td width="140px"><h3>Staff Member</h3></td><td width="120px"><h3><center>Title</center></h3></td><td width="350px"><h3><center>Profile</center></h3></td><td width="75px"></td><td width="75px"></td></tr></table><br>
	<?php $result = mysql_query("SELECT * FROM staff ");
	while($row = mysql_fetch_array($result)){ ?>
	<div id="staffadmin">
	<table>
	<tr><td width="120px"><?php echo $row['name'] ?></td>
	<td width="120px"><center><?php echo $row['title'] ?><center></td>
	<td width="320px"><?php echo substr($row['blurb'],0,30) ?>...</td>
	<td width="75px"><a class='inline' href="#inline_contentz" onclick="editstaff(<?php echo $row['id'] ?>)" >Edit<br> Profile</a></td> 
	<td width="75px"><a class='inlinetest' href="#inline_contentpic" onclick="assignStaffPic(<?php echo $row['id'] ?>)">Assign Picture</a></td>
	<td width="50px"><a href="delete.php?id=<?php echo $row['id'] ?>&sort=staff" onclick="return confirm('Delete this profile?');">Delete Profile</a></td></tr>
	</table> 
	</div> <br><?php
	}
}

//	Function to query the database and create a table of 6 random products for frontend.
function showprod1() {
	$result = mysql_query("SELECT * FROM products ORDER BY rand() LIMIT 6");
	while($row = mysql_fetch_array($result)){
	?>
	<div id="prod"><table>
	<tr><td height="180px"><center><img src="./images/products/<?php echo $row['image']?>" alt="" height="400px" class="resizeme" width="400px" onload=”$(this).aeImageResize({ height: 190, width: 180})”/></center><td><tr>
	<tr><td height="15"><center><?php echo $row['name'] ?></center></td></tr>
	<tr><td height="15"><center>$<?php echo $row['price'] ?></center></td></tr>
	<tr><td valign="top"><center><?php echo $row['discrip'] ?></center></td></tr>
	</table>
	</div>
	<?php	
	}	
}

//	Function to query the database and create a table of products of the type parsed, for backend.
function showprodadmin($str) {
	?>
	<table><tr><td><b>Product Name</b></td><td><b>Descrition</b></td><td><b><center>Price</center></b></td><td><b><center>Promotion Price</center></b></td></tr>
	<?php
	$result = mysql_query("SELECT * FROM products WHERE type='".$str."'");
	while($row = mysql_fetch_array($result)){
	?>
	<tr><td width="230px"><?php echo $row['name'] ?></td>
		<td width="200px"><?php echo substr($row['discrip'], 0, 30) ?>.....</td>
		<td width="75px"><center>$<?php echo $row['price'] ?></center></td>
		<td width="75px"><center>$<?php echo $row['sprice'] ?></center></td>
		<td width="100px"><a class='inline' href="#inline_content" onclick="edittest(<?php echo $row['id'] ?>);" ><center>Edit</center></a></td> 
		<td width="100px"><a class='inlinetest' href="#assignpic_content" onclick="assignPic(<?php echo $row['id'] ?>);" >Assign Image</a></td>
		<td width="100px"><a href="delete.php?id=<?php echo $row['id'] ?>" onclick="return confirm('Delete this product?');"><center>Delete</center></a></td></td> 
		</tr><?php
	
	}
	echo "</table>";
} 
