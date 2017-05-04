<?php
require_once '../dbconnect.php';

if($user->is_loggedin()!="")
{
    $user->redirect('index.php');
}

if(isset($_POST['btn-login']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];

    if($user->login($username,$password))
    {
        $user->redirect('index.php');
    }
    else
    {
        $error = "Wrong Details !";
    }
}
?>
<?php require(realpath(__DIR__) . '../templates/header.php'); ?>
<div class="container">
    <div class="">
        <form method="post">
            <h2>Sign in.</h2>
            <?php
            if(isset($error))
            {
                ?>
                <div class="">
                    <i class=""></i> &nbsp; <?php echo $error; ?> !
                </div>
                <?php
            }
            ?>
            <div class="form-group">
                <input type="text" class="form-control" name="username" placeholder="Username" required />
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Password" required />
            </div>
            <div class="clearfix"></div><hr />
            <div class="form-group">
                <button type="submit" name="btn-login" class="">
                    <i class=""></i>&nbsp;SIGN IN
                </button>
            </div>
        </form>
    </div>
</div>
<?php require(realpath(__DIR__) . '../templates/footer.php');