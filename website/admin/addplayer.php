<?php
include('../dbconnect.php');
if( !isset($_SESSION['username']) ) {
    header("Location: login.php");
    exit;
}

if(isset($_POST['setplayer'])) {
    $errMsg = '';
    $successMsg = '';

    $sid = $_POST['student_id'];
    $fname = $_POST['first_name'];
    $lname = $_POST['last_name'];

    $ncheck = $user->checkPlayerId($sid);
    if($ncheck == false)
    {
        $user->setPlayer($sid, $fname, $lname);
        $successMsg = 'Player successfully added.';
    }
    elseif($ncheck == true)
    {
        $errMsg = 'This ID already exists.';
    }
}
?>
<html>
<head><title>Add Player</title></head>
<body>
<div>
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
    <div>
    <div>
    <form action="" method="post">
        <label>First Name</label>
            <input type="text" name="first_name" class="box"/>
        <label>Last Name</label>
            <input type="text" name="last_name" class="box"/>
        <label>Student ID</label>
            <input type="text" name="student_id" class="box"/>

        <input type="submit" name='setplayer' value="Add Player" class='submit'/><br />
    </form>
    </div>
        <h1>Unassigned Players</h1>
        <table style="width: 40%;">
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Student ID</th>
            </tr>
        <?php echo $user->showUnassignedPlayers(); ?>
        </table>

</div>
</body>
</html>