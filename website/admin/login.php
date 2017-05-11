<?php
session_start();
include('../dbconnect.php');

if(isset($_POST['submit'])){
    $errMsg = '';

    $username = $_POST['username'];
    $password = $_POST['password'];

    if($username == '')
        $errMsg .= 'You must enter your Username';

    if($password == '')
        $errMsg .= 'You must enter your Password';


    if($errMsg == ''){
        $sql = "SELECT id,username,password FROM  `tbl_admins` WHERE username = :username AND password = :password";
        $records = $conn->prepare($sql);
        $records->bindParam(':username', $username);
        $records->bindParam(':password', $password);
        $records->execute();
        $results = $records->fetchAll(PDO::FETCH_ASSOC);
        if(count($results) > 0){

            $_SESSION['username'] = $results[0]['username'];
            header('location:index.php');
        }else{
            $errMsg .= 'Username and Password are not found';
        }
    }
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
        <div style="background-color:#006D9C; color:#FFFFFF; padding:3px;"><b>Login</b></div>
        <div style="margin:30px">
            <form action="" method="post">
                <label>Username  :</label><input type="text" name="username" class="box"/><br /><br />
                <label>Password  :</label><input type="password" name="password" class="box" /><br/><br />
                <input type="submit" name='submit' value="Submit" class='submit'/><br />
            </form>
        </div>
    </div>
</div>
</body>
</html>