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
	$(".inline").colorbox({inline:true, width:"30%", height:"64%", onClosed:function(){ window.location.reload();}});
	$(".inlinetest").colorbox({inline:true, width:"710px", height:"385px"});
	$("input[id='create_product']").colorbox({inline:true, width:"400px", height:"380px", href:"#inline_contentx", onClosed:function(){ window.location.reload();}}); 
	$("input[id='upload_product_image']").colorbox({inline:true, width:"400px", height:"350px", href:"#inline_proimage_upload"});
});
</script>
<title>AdminZone</title>
</head>
<body>
<div id='adminContainer'>
	<div id='adminWrapper'>
		<div id='header'><h1>Cuba Street BakeHouse Administration Area</h1></div>
		<div id='navbar'> <center><?php  include '../includes/adminnav.php' ?></center></div>
		<div id='main'> 
			<center>
			<input type="button" value="Create a new product" onclick="createtest()" id="create_product"/>
			<input type="button" value="Upload Product Image" onclick="" id="upload_product_image"/><br><br>
			<label><?php include '../includes/speclabel.php' ?></label>
			</center><br>
			<div id="AccordionContainer" class="AccordionContainer">
				<div onclick="runAccordion(1);">
					<div class="AccordionTitle" onselectstart="return false;">
						Pies
					</div>
				</div>
				<div id="Accordion1Content" class="AccordionContent">
				<?php showprodadmin(pie); ?>
				</div>
				<div onclick="runAccordion(2);">
					<div class="AccordionTitle" onselectstart="return false;">
						Breads
					</div>
				</div>
				<div id="Accordion2Content" class="AccordionContent">
					<?php showprodadmin(bread); ?> 
				</div>
				<div onclick="runAccordion(3);">
					<div class="AccordionTitle" onselectstart="return false;">
						Cakes and Sweets
					</div>
				</div>
				<div id="Accordion3Content" class="AccordionContent">
					<?php showprodadmin(sweet); ?>
				</div>
				<div onclick="runAccordion(4);">
					<div class="AccordionTitle" onselectstart="return false;">
						Sandwichs
					</div>
				</div>
				<div id="Accordion4Content" class="AccordionContent">
					<?php showprodadmin(Sandwhich); ?>
				</div>
				<div onclick="runAccordion(5);">
					<div class="AccordionTitle" onselectstart="return false;">
						Misc
					</div>
				</div>
				<div id="Accordion5Content" class="AccordionContent">
					<?php showprodadmin(misc); ?>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Hidden div for product editing colorbox -->
<div style='display:none'>
	<div id='inline_content' style='background:#F0DB99;'>
		<?php include '../includes/pro.php' ?> 
	</div>
</div>
<!-- Hidden div for new product colorbox -->
<div style='display:none'>
	<div id='inline_contentx' style='background:#F0DB99;'>
		<?php include '../includes/pro-create.php' ?>
	</div>
</div>
<!-- Hidden div for product image upload colorbox -->
<div style='display:none'>
	<div id="inline_proimage_upload" >
		<div id="upimg" style="overflow: hidden;">
			<h5>Select New Product Image To Upload</h5><br>
			<center><p id="result"></p></center>
            <form action="process_upload.php" method="post" enctype="multipart/form-data" target="upload_target" onsubmit="startUpload();">
                <center><input name="myfile" type="file" /></center><br>
                <center><input type="submit" name="submitBtn" value="Upload" /></center>
				<iframe id="upload_target" name="upload_target" src="#" style="width:0;height:0;border:0px solid #fff;"></iframe>
            </form>
			<center><p id="f1_upload_process">Loading...<br/><img src="../images/loading.gif" alt="spinning gif image" ></p></center><div>
		</div>
	</div>
</div>
<!-- Hidden div for product image assignment colorbox -->
<div style='display:none'>
	<div id='assignpic_content' style='background:#F0DB99;'>
		<?php include '../includes/pro-pic.php' ?>
	</div>
</div>	
</body>
</html>
<?php }