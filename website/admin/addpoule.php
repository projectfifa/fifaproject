<?php
require ('../dbconnect.php');
if( !isset($_SESSION['username']) ) {
    header("Location: login.php");
    exit;
}

if(isset($_POST['setpoule'])){
    $errMsg = '';
    $successMsg = '';

    $pname = $_POST['poule_name'];

    $pcheck = $user->checkPouleName($pname);

    if($pcheck == false){
        $user->setPoule($pname);
        $successMsg = 'Successfully added poule.';
    }
    elseif($pcheck == true) {
        $errMsg = 'This poule name is already taken.';
    }
}

if(isset($_POST['poule_select'])){
    $errMsg = '';
    $successMsg = '';
    $output = '';
    $pname = $_POST['poule_select'];
    $tname = $_POST['addtopoule'];
    $user->checkPouleAmount($pname);

    if ($user->checkPouleAmount($pname))
    {
        if ($user->addToPoule($pname, $tname)) {
            $successMsg = 'Team added to Poule';
        } elseif (!$user->addToTeam($pname, $tname)) {
            $errMsg = 'Failed.';
        }
    }
    elseif(!$user->checkPouleAmount($pname))
    {
        $output = "<p>There are already 5 teams in this poule!</p><br>";
        $output .= "<p>Try an other poule.</p><br>";
        $output .= "<form action=\"\" method=\"post\">";
        $output .= "<button type=\"submit\" name='proceed' class='submit'>OK</button>";
        $output .= "</form>";
    }
}
if(isset($_POST['proceed']))
{
    unset($_POST['poule_select']);
}
?>

<html>
<head><title>Create Poule</title></head>
<body>
<div>
    <a href="addteam.php">Add Teams</a>
    <a href="addplayer.php">Add Players</a>
    <a href="scores.php">Edit Match</a>
    <a href="index.php">Home</a>
    <h1>Create A Poule</h1>
    <div>
        <?php
        if (isset($errMsg)) {
            echo '<div style="color:#FF0000;text-align:center;font-size:12px;">' . $errMsg . '</div>';
        }
        if (isset($successMsg)) {
            echo '<div style="color:#00ff00;text-align:center;font-size:12px;">' . $successMsg . '</div>';
        }
        ?>
        <div>
            <form action="" method="post">
                <table>
                    <tr>
                        <th>Poule name:</th>
                    </tr>
                    <tr>
                        <td><input type="text" name='poule_name' class="box" required/></td>
                    </tr>
                </table>
                <input type="submit" name='setpoule' value="Add Poule" class='submit'/><br/>
            </form>
        </div>
        <h1>Unassigned Teams</h1>
        <?php
        if (isset($output)) {
            echo '<div>' . $output . '</div>';
        }
        ?>
        <table style="width: 40%;">
            <form action="" method="post">
                <tr>
                    <th>Team Name</th>>
                    <th>Add To Poule</th>
                </tr>
                <?php echo $user->showUnassignedTeams(); ?>
            </form>
        </table>
    </div>
</div>
</body>
