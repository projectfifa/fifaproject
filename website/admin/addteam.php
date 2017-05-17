<?php
require ('../dbconnect.php');
if( !isset($_SESSION['username']) ) {
    header("Location: login.php");
    exit;
}

if(isset($_POST['setteam'])){
    $errMsg = '';
    $successMsg = '';

    $tname = $_POST['team_name'];

    $tcheck = $user->checkTeamName($tname);

    if($tcheck == false){
        $user->setTeam($tname);
        $successMsg = 'Successfully added team.';
    }
    elseif($tcheck == true) {
        $errMsg = 'This Teamname is already taken.';
    }
}
?>

<html>
<head><title>Create Team</title></head>
<body>
<div >
    <h1>Create A Team</h1>
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
    <form action="" method="post">
        <table>
            <tr>
                <th>Teamname:</th>
            </tr>
            <tr>
                <td><input type="text" name='team_name' class="box" required/></td></td>
            </tr>
        </table>
        <input type="submit" name='setteam' value="Add Team" class='submit'/><br />
    </form>
</div>

    </div>
</div>
</body>
</html>