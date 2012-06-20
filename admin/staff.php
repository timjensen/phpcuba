<?php 
//Start the session
session_start(); 
//Get the user name from the previously registered super global variable
define(ADMIN,$_SESSION['name']); 
//If session not registered
if(!session_is_registered("admin")){ 
// Redirect to login.php page
header("location:login.php"); 
}
else { ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php 
require_once '../scripts/functions.php';
connect(); 
?>
<html>
<head>
<link rel ="StyleSheet" href="../css/admincss.css"/>
<script type="text/javascript" src="../scripts/admin.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script src="../scripts/jquery.colorbox.js"></script>
<script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script> <script type="text/javascript">
//<![CDATA[
	bkLib.onDomLoaded(function() { nicEditors.allTextAreas({buttonList : ['bold','italic','underline','left','center','right','justify','ol','ul','fontSize','fontFamily','fontFormat','indent','outdent']}) });
//]]>
</script>
<script>
$(document).ready(function(){
	document.getElementById('f1_upload_process').style.visibility = 'hidden';
 	$(".inline").colorbox({inline:true, width:"375px", height:"350px", onClosed:function(){ window.location.reload();}});
	$("input[id='createstaff']").colorbox({inline:true, width:"400px", height:"360px", href:"#inline_contenty", onClosed:function(){ window.location.reload();}}); 
	$("input[id='uploadstaff']").colorbox({inline:true, width:"400px", height:"350px", href:"#inline_proimage_upload"});
	$(".inlinetest").colorbox({inline:true, width:"710px", height:"385px"});
});
</script>
<title>AdminZone</title>
</head>
<body>
<div id='adminContainer'>
	<div id='adminWrapper'>
		<div id='header'><h1>Cuba Street BakeHouse Administration Area</h1></div>
		<div id='navbar'><?php  include '../includes/adminnav.php' ?></div>
		<div id='main'> 
			<center>
				<input type="button" value="Create a staff profile" onclick="createstaff()"" id="createstaff"/>
				<input type="button" value="Upload Staff Member Image" onclick="" id="uploadstaff"/>
			</center><br>
			<?php showstaffadmin(); ?>
		</div>
	</div>
</div>
<!-- Hidden div for staff profile editing colorbox -->
<div style='display:none'>
	<div id='inline_contentz' style='background:#F0DB99;'>
		<?php include '../includes/staffedit.php' ?> 
	</div>
</div>
<!-- Hidden div for staff profile create colorbox -->
<div style='display:none'>
	<div id='inline_contenty' style='background:#F0DB99;'>
		<?php include '../includes/staff-create.php' ?>
	</div>
</div>
<!-- Hidden div for staff image upload colorbox -->
<div style='display:none'>
	<div id="inline_proimage_upload" style='background:#F0DB99;'>
		<div id="upimg" style="overflow: hidden;">
			<h5>Select New Staff Member Image To Upload</h5><br>
			<center><p id="result"></p></center>
			<form action="staff_upload.php" method="post" enctype="multipart/form-data" target="upload_target" onsubmit="startUpload();">
				<center><input name="myfile" type="file" /></center><br>
				<center><input type="submit" name="submitBtn" value="Upload" /></center>
				<iframe id="upload_target" name="upload_target" src="#" style="width:0;height:0;border:0px solid #fff;"></iframe>
			</form>
			<center><p id="f1_upload_process">Loading...<br/><img src="../images/loading.gif" alt="spinning gif image" ></p></center>
		</div>
	</div>
</div>
<!-- Hidden div for staff image assignment colorbox -->
<div style='display:none'>
	<div id='inline_contentpic' style='background:#F0DB99;'>
		<?php include '../includes/staff-pic.php' ?>
	</div>
</div>	
</body>
</html> <?php 
}
