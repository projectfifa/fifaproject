<?php
	if (count(get_included_files()) <= 1) {
		exit;
	}
	
	if (!isset($_SESSION['loggedin'])) {
		header("location: login.php");
		exit;	
	}
	
?>
