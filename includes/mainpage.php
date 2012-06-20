<?php 
// If statement to filter for page load
if (isset($_GET['itemType']))
{
	require_once '../scripts/functions.php';
	// Connect to MySql db
	connect(); 

    switch($_GET['itemType'])
    {
        case'1':
            home($_GET['itemType']);
            break;
        case'2':
            products($_GET['itemType']);
            break; 
		case'3':
            staff($_GET['itemType']);
            break;
		case'4':
            contact($_GET['itemType']);
            break;
    }
}
else
{
?> 	<div id="contain"><?php
		echo "<h1>Welcome to Cuba Street Bakehouse</h1>";
		$result = mysql_query("SELECT body FROM pages WHERE id='1'");
		$row = mysql_fetch_array($result);
		echo $row['body'];
?> 	</div><?php
}
// Function for the home page displaying home page data from the db
function home($itemType) {
?>	<div id="contain"><?php
		echo "<h1>Welcome to Cuba Street Bakehouse</h1>";
		$result = mysql_query("SELECT body FROM pages WHERE id='$itemType'");
		$row = mysql_fetch_array($result);
		echo $row['body'];
?> 	</div><?php
}
// Function for the contact us page displaying contact from db and google map
function contact($itemType) {
?>	<div id="contain"><?php
		$result = mysql_query("SELECT title FROM pages WHERE id='$itemType'");
		$row = mysql_fetch_array($result);
		echo "<h1>" . $row['title'] . "</h1>";
		
		$result = mysql_query("SELECT body FROM pages WHERE id='$itemType'");
		$row = mysql_fetch_array($result);	
		echo $row['body'];
?>
		<br><center>
		<iframe width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.co.nz/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=72+Cuba+Street,+Palmerston+North,+Manawatu-Wanganui&amp;aq=1&amp;sll=-41.244772,172.617188&amp;sspn=34.699957,86.572266&amp;vpsrc=0&amp;ie=UTF8&amp;hq=&amp;hnear=72+Cuba+St,+Palmerston+North,+4410,+Manawatu-Wanganui&amp;t=m&amp;z=14&amp;iwloc=A&amp;output=embed"></iframe>
		<br /><small><a href="http://maps.google.co.nz/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=72+Cuba+Street,+Palmerston+North,+Manawatu-Wanganui&amp;aq=1&amp;sll=-41.244772,172.617188&amp;sspn=34.699957,86.572266&amp;vpsrc=0&amp;ie=UTF8&amp;hq=&amp;hnear=72+Cuba+St,+Palmerston+North,+4410,+Manawatu-Wanganui&amp;t=m&amp;z=14&amp;iwloc=A" style="color:#0000FF;text-align:center">View Larger Map</a></small>
		</center><br>
	</div><?php
}
// Function for staff page displaying all profiles in the db
function staff($itemType) {
	echo "<h1>Meet Our Team</h1>";
	$result = mysql_query("SELECT * FROM staff ");
	while($row = mysql_fetch_array($result)){
	?>
	<div id="staff">
		<div id="staffpic"><center><img src="./images/staff/<?php echo $row['image']?>" alt=""  height="180px" class="resizeme1" width="140px" onload=”$(this).aeImageResize({ height: 130, width: 150});” /></center></div>
		<div id="smalltab">
			<table style="border-collapse: collapse;">
				<tr>
					<td width="240px" style="padding-left: 5px; border-bottom: solid 1px #B47836;"><center><?php echo $row['name'] ?></center></td>
					<td width="280px" style="border-bottom: solid 1px #B47836;"><center><?php echo $row['title'] ?></center></td>
				</tr>
			</table>
		</div>
		<div id="blurb"><?php echo $row['blurb'] ?></div>
	</div><br><?php 	
	}
}
// Function for products page using 6 random products from db
function products($itemType) {
	
	$result = mysql_query("SELECT * FROM products ORDER BY rand() LIMIT 6");
	while($row = mysql_fetch_array($result)){
	?>
	<div id="prod">
		<table>
			<tr><td height="180px"><center><img src="./images/products/<?php echo $row['image']?>" alt="" height="190px" class="resizeme" width="180px" onload=”$(this).aeImageResize({ height: 190, width: 180})”/></center><td><tr>
			<tr><td height="15"><center><?php echo $row['name'] ?></center></td></tr>
			<tr><td height="15"><center>$<?php echo $row['price'] ?></center></td></tr>
			<tr><td valign="top"><center><?php echo $row['discrip'] ?></center></td></tr>
		</table>
	</div>
	<?php	
	}
} ?>