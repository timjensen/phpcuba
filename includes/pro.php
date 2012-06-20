<?php 
require_once '../scripts/functions.php';
// Connect to MySql db
connect(); 
// If filter page display
if (isset($_GET['pro']))
{
	$idd = $_GET['pro'];
	$result = mysql_query("SELECT * FROM products WHERE id='$idd'");
	$row = mysql_fetch_array($result);
	// Check to see if product is currently on special and display edit page with 'take off special' option
	if (date("Y-m-d") < $row['Spec']) {?>
	
	<form action="bb" method="post" id="pro-update" style="margin-left: 5px;">
		<center><h5>Update The Product<?php	echo $row['spec'];?></h5></center>
		<input type="hidden" id="id" value="<?php echo $row['id']; ?>">
		<table>
			<input type="checkbox" name="Promo" id="promo" value="test" style="display:none;"/>
			<tr>
				<td width="175px;"><label for="Product_Name">Product Name:</label></td>
				<td><input type="text" id="name" value="<?php echo $row['name']; ?>"></td>
			</tr>
			<tr>
				<td><label for="Product_Price">Product Price:</label></td>
				<td><input type="text" id="price" value="<?php echo $row['price']; ?>"></td>
			</tr>
			<tr>
				<td><label for="Product_Special_Price">Product Special Price:</label></td>
				<td><input type="text" id="sprice" value="<?php echo $row['sprice']; ?>"></td>
			</tr>
			<tr>
				<td><label for="Product_On_Specail">Remove from Special?</td>
				<td><input type="checkbox" name="Promo1" id="promo1" value="test1"/></td>
			</tr>
		</table>
		<p><label for="Product_Discription">Product Discription:</label></p>
		<textarea id="dis" cols="30" rows="5"> <?php echo $row['discrip']; ?> </textarea><br><br>
		<center><input type="button" value="Update" onclick="productupdate()"></input></center>
	</form>
	
	<?php
	// Display form with 'put on specail' option
} else {
	?>		
	<form action="bb" method="post" id="pro-update" style="margin-left:5px;">
		<center><h5>Update The Product<?php	echo $row['spec'];?></h5></center>
		<input type="hidden" id="id" value="<?php echo $row['id']; ?>">
		<table>
			<input type="checkbox" name="Promo1" id="promo1" value="test1" style="display:none;"/>
			<tr>
				<td width="175px;"><label for="Product_Name">Product Name:</label></td>
				<td><input type="text" id="name" value="<?php echo $row['name']; ?>"></td>
			</tr>
			<tr>
				<td><label for="Product_Price">Product Price:</label></td>
				<td><input type="text" id="price" value="<?php echo $row['price']; ?>"></td>
			</tr>
			<tr>
				<td><label for="Product_Special_Price">Product Special Price:</label></td>
				<td><input type="text" id="sprice" value="<?php echo $row['sprice']; ?>"></td>
			</tr>
			<tr>
				<td><label for="Product_On_Specail">Place Product On Special This Week?</td>
				<td><input type="checkbox" name="Promo" id="promo" /></td>
			</tr>
		</table>
		<p><label for="Product_Discription">Product Discription:</label></p>
		<textarea id="dis" cols="30" rows="5"> <?php echo $row['discrip']; ?> </textarea><br><br>
		<center><input type="button" value="Update" onclick="productupdate()"></input></center>
	</form>
	
	<?php
	mysql_close();
	}
}
// If action is set filter for running update
else if (isset($_GET['action']))
{
	mysql_close();
	connect();
		
	$id = mysql_real_escape_string($_GET['id']);
	$name = mysql_real_escape_string($_GET['name']);
	$price = mysql_real_escape_string($_GET['price']);
	$sprice = mysql_real_escape_string($_GET['sprice']);
	$diss = mysql_real_escape_string($_GET['dis']);
	$test = mysql_real_escape_string($_GET['test']);
	$test1 = mysql_real_escape_string($_GET['test1']);
	$wtf = date('Y-m-d', strtotime('next monday'));
	// Update option for put on special
	if ( $test == 'true' ) {
	
	mysql_query("UPDATE products SET Spec = NULL");
	mysql_query("UPDATE products SET Spec = '$wtf' WHERE id = '$id'");
	mysql_query("UPDATE products SET name = '$name', price = '$price', sprice = '$sprice', discrip = '$diss'  WHERE id = '$id'");
	echo "Your product has been successfully updated";
	}
	// Update option for take off special option
	else if ( $test1 == 'true' ){
		
	mysql_query("UPDATE products SET name = '$name', price = '$price', sprice = '$sprice', discrip = '$diss', Spec = NULL  WHERE id = '$id'");
	echo "Your product has been successfully updated";
	} 
	// Standard update option
	else {
	
	mysql_query("UPDATE products SET name = '$name', price = '$price', sprice = '$sprice', discrip = '$diss'  WHERE id = '$id'");
	
	 echo "Your product has been successfully updated";
	 echo "this is the else";}
	}
	else{
	echo "";
	}
	?>