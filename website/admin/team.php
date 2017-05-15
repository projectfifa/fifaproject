<?php
include ('../dbconnect.php');
if( !isset($_SESSION['username']) ) {
    header("Location: login.php");
    exit;
}
?>

<html>
<head><title>Login Page</title></head>
<body>
<div align="center">
    <div style="width:300px; border: solid 1px #006D9C; " align="left">
        <?php
        if(isset($errMsg)){
            echo '<div style="color:#FF0000;text-align:center;font-size:12px;">'.$errMsg.'</div>';
        }
        ?>
<div style="margin:30px">
    <form action="" method="post">
        <label>team  :</label><input type="text" name="teamname" class="box"/><br /><br />

        <input type="submit" name='findteam' value="Submit" class='submit'/><br />
    </form>
</div>
        <?php
        if(isset($_POST['findteam'])){
            $teamname = $_POST['teamname'];
            $teams = $user->getTeam($teamname);

            foreach ($teams as $team) {
                echo $team['last_name'];
            }
        }
        ?>
    </div>
</div>
</body>
</html>