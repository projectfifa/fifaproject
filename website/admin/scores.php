<?php
session_start();
include_once '../dbconnect.php';
if( !isset($_SESSION['username']) ) {
    header("Location: login.php");
    exit;
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Project Fifa</title>
    <!-- you can link bootstrap if you want.   -->
    <!--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> -->

    <link rel="stylesheet" href="../assets/css/admin.css">
</head>
<body>


<div class="admin-header">
	<div class="container-admin row-flex">

		<div class="admin-logo">
			<h1>Fifa ACP</h1>
		</div>

			    <div class="admin-nav">
						<ul class="row-flex">
							<li><a href="index.php">Home</a></li>
							<li><a href="teams.php">Teams</a></li>
							<li><a href="game.php">Game</a></li>
							<li><a href="scores.php">Scores</a></li>
							<li><label><a href="logout.php"><i class=""></i>Logout</a></label></li>
						</ul>
				</div>
	</div>
</div>

<div class="container-admin alert-red">
	<div class="admin-alert">
	    Welcome to the ACP <?php print($_SESSION['username']); ?> !
	</div>
</div>

</body>
</html>