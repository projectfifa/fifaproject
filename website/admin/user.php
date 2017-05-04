<?php
	if (count(get_included_files()) <= 1) {
		exit;
	}
	
	if (!isset($_SESSION['username']) || !isset($_SESSION['password'])) {
		session_destroy();
		header("location: login.php");
		exit;
	}
	
	if (!isset($_SESSION['loggedin']) || $_SERVER['REMOTE_ADDR'] != $_SESSION['loggedin']) {
		session_destroy();
		header("location: login.php");
		exit;
	}
	
	$username = $_SESSION['username'];
	$password = $_SESSION['password'];
	$decrypt = rtrim($db->decrypt($_SESSION['password']));
	
	if (strtolower($username) == strtolower($config['admin_user'])) {
		if ($decrypt != $config['admin_pass']) {
			session_destroy();
			header("location: login.php");
			exit;
		}
	} else {
		if ($db->getUser($_SESSION['username'], $decrypt) == null) {
			session_destroy();
			header("location: login.php");
			exit;
		}
	}
	
	
?>