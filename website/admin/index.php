<?php
include_once '../dbconnect.php';
if(!$user->is_loggedin())
{
    $user->redirect('index.php');
}
$user_id = $_SESSION['user_session'];
$stmt = $conn->prepare("SELECT * FROM tbl_admins WHERE id=:user_id");
$stmt->execute(array(":user_id"=>$user_id));
$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
?>
<?php require(realpath(__DIR__) . '../templates/header.php'); ?>
<div class="header">
    <div class="">
        <label><a href="logout.php?logout=true"><i class=""></i>Logout</a></label>
    </div>
</div>
<div class="">
    welcome : <?php print($userRow['user_name']); ?>
</div>
<?php require(realpath(__DIR__) . '../templates/footer.php');