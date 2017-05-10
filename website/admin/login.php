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

</body>
</html>