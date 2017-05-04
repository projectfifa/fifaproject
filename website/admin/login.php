<?php
	session_start();
	
	if (isset($_SESSION['loggedin'])) {
		if ($_SESSION['loggedin'] != $_SERVER['REMOTE_ADDR']) {
			session_destroy();
			header("location: login.php");
			exit;
		}
		header("location: index.php");
		exit;
	}
	
	include '../dbconnect.php';
    $config = array(
        "admin_user" => "admin",
        "admin_pass" => "admin"
    );

	if (isset($_POST['username']) && isset($_POST['password'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		if (strtolower($username) == strtolower($config['admin_user']) && $password == $config['admin_pass']) {
			$_SESSION['loggedin'] = $_SERVER['REMOTE_ADDR'];
			$_SESSION['username'] = $username;
			$_SESSION['password'] = $password;
			header("location: index.php");
			exit;
		} else {
			$user = $conn->prepare("SELECT * FROM tbl_admins WHERE username=$username AND password=$password");
			
			if ($user == null) {
				$error = "Invalid username or password";
			} else {
				$_SESSION['loggedin'] = $_SERVER['REMOTE_ADDR'];
				$_SESSION['username'] = $username;
				$_SESSION['password'] = rtrim($db->encrypt($password));
				header("location: index.php");
				exit;
			}
		}
	}
	
?>
<!DOCTYPE html>
<html>
<body>
	<div class="admin">
			<h3>Sign In</h3>
			<form action="login.php" method="post" autocomplete="off">
				<div class="form-group">
					<label>Username</label>
					<input type="text" name="username" id="username" autocomplete="off" required>
				</div>
				<div class="form-group">
					<label>Password</label>
					<input type="password" name="password" class="form-control" id="password" autocomplete="off" required>
				</div>
				<div class="form-group">
					<button type="submit">Sign In</button>
				</div>
			</form>
		</div>
	</div>
</body>
</html>