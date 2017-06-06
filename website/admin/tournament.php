<?php
include('../dbconnect.php');
if( !isset($_SESSION['username']) ) {
    header("Location: login.php");
    exit;
}
?>
<html>
<head><title>Add Player</title></head>
<body>
<div>
    <a href="addteam.php">Add Teams</a>
    <a href="addplayer.php">Add Players</a>
    <a href="scores.php">Edit Match</a>
    <a href="index.php">Home</a>
    <h1>Add Player</h1>
    <div>
        <?php
        if(isset($errMsg)){
            echo '<div style="color:#FF0000;text-align:center;font-size:12px;">'.$errMsg.'</div>';
        }
        if(isset($successMsg)){
            echo '<div style="color:#00ff00;text-align:center;font-size:12px;">'.$successMsg.'</div>';
        }
        ?>
    </div>
</div>

<?php
//$user->pouleIdCount();
$user->assignPoule();
//$user->createTournament();
//if($user->createTournament() == true)
//{
//    echo "YES";
//}
//elseif($user->createTournament() == false)
//{
//    echo "Nope";
//}
?>

</body>
</html>