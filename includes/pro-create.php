<?php 
require_once '../scripts/functions.php';
// Connect to MySql db
connect(); 
// Create form in multi string variable
$create_form = <<<EOT
	<form action="bb" method="post" id="pro-create" style="margin-left: 5px;">
		<h5>Enter New Product Details</h5>
		<table>
			<tr>
				<td><label for="Product_Type">Product Type:</td>
				<td>
					<select id="p-type">
						<option>pie
						<option>sweet
						<option>sandwhich
						<option>bread
						<option>misc
					</select>
				</td>
			</tr>
			<tr>
				<td width="175px;"><label for="Product_Name">Product Name:</td>
				<td><input type="text" id="p-name"></td>
			</tr>
			<tr>
				<td><label for="Product_Price">Product Price:</td>
				<td><input type="text" id="p-price"></td>
			</tr>
			<tr>
				<td><label for="Product_Special_Price">Product Special Price:</td>
				<td><input type="text" id="p-sprice"></td>
			</tr>
		</table>
		<label>Product Discription:</label><br>
		<textarea id="p-dis" cols="30" rows="5"></textarea><br><br>
		<center><input type="button" value="Create" onclick="productcreate()"></input></center>
	</form>
EOT;
// If filter for product create query or page display
if (isset($_GET['action']))
{
	mysql_close();
	connect();
		
	$type = mysql_real_escape_string($_GET['type']);
	$name = mysql_real_escape_string($_GET['name']);
	$price = mysql_real_escape_string($_GET['price']);
	$sprice = mysql_real_escape_string($_GET['sprice']);
	$diss = mysql_real_escape_string($_GET['dis']);
	
	if($name == '') {
	// Product creation form with error msg
	echo $create_form; 
	echo "<p>Products cannot be created without a product name!!</p>";
	}
	else{
	// Sql Insert statment to create new product
	mysql_query("INSERT INTO `cubastreet`.`products` (`id`, `type`, `image`, `discrip`, `price`, `sprice`, `name`, `Spec`) VALUES (NULL, '$type', 'comingsoon.png', '$diss', '$price', '$sprice', '$name', NULL)");
	echo "Your product has been successfully created";
	}
	}
	else
	{
	// Product creation form
	echo $create_form;
}