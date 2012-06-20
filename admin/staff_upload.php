<?php
// Set first part of target path
$destination_path = getcwd().DIRECTORY_SEPARATOR;
// Default $result
$result = 0;
// Set full target path
$target_path = $destination_path . "../images/staff/" . basename( $_FILES['myfile']['name']);
// Create basename then remove all before the first instance of '.' for file type check
$filecheck = basename( $_FILES['myfile']['name']);
$type = strtolower(substr($filecheck, strrpos($filecheck, '.') + 1));
// If filter to determine upload and $result 
if ($type == "jpg" || $type == "gif" || $type == "png")
	{
		if(@move_uploaded_file($_FILES['myfile']['tmp_name'], $target_path))
			{
				$result = 1;
			}
	}
	else {
		$result = 2;
	}
   sleep(1);
?>
<script language="javascript" type="text/javascript">
   window.top.window.stopUpload(<?php echo $result; ?>);
</script>
