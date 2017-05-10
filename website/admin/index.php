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

    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<div class="header">
    <div class="">
        <label><a href="logout.php"><i class=""></i>Logout</a></label>
    </div>
</div>
<div class="">
    welcome : <?php print($_SESSION['username']); ?>
</div>

</body>
</html>