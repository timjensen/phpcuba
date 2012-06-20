<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php 
require_once './scripts/functions.php';
connect(); 
?>
<html>
<head>
<link rel="StyleSheet" href="./css/main.css" type="text/css" />
<script type="text/javascript" src="./scripts/control.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
   <script src="./scripts/jquery.ae.image.resize.min.js"></script>
  <script>
     $(function() {
      $( ".resizeme" ).aeImageResize({ height: 190, width: 180 });
    });
	
	function vertAlign(pImg) {
	var lHeight = pImg.clientHeight;
	var lParentHeight = pImg.parentNode.clientHeight;
	pImg.style.marginTop = (lParentHeight - lHeight)/2 + "px"; }
	
	function vertAlignOnFly(pImg) {
	var lHeight = pImg.clientHeight;
	var lParentHeight = pImg.parentNode.clientHeight;
	if (navigator.appName == "Microsoft Internet Explorer") { 
	var lHeight = pImg.clientHeight;
	var lParentHeight = pImg.parentNode.clientHeight;
	pImg.style.marginBottom = (lParentHeight - lHeight)/2 + "px";
	}else {
	pImg.style.marginTop = (lParentHeight - lHeight)/2 + "px"; }}
	
  </script>
<title>Cuba Street Bakehouse</title>
</head>
<body>
<div id='mainContainer'>
<div id='mainWrapper'>
<div id='logo'><img src="./images/Logo.png" onload="vertAlign(this)" /></div>
<div id='filler'><img src="./images/filler.png" onload="vertAlign(this)" /></div>
<div id='specboard'><?php include 'includes/spec.php' ?></div>
<div id='sidebar'><?php include 'includes/sidebar.php' ?></div>
<div id='main'><?php
include 'includes/mainpage.php'
?>
</div>
<div id='footer'><a href="./admin/index.php">Admin Login</a></div>
</div>
</div>
</body>
</html>