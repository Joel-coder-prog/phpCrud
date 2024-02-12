<?php 
if (isset($_POST['file'])) {
	$file = $_POST['file'];

	if (is_file($file)) {
		chmod($file, 0777);
		if (unlink($file)) {
			echo true;
		}
	}
}
?>