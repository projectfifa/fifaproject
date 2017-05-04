<?php
class USER
{
    private $db;

    function __construct($conn)
    {
        $this->db = $conn;
    }

    public function login($username,$password)
    {
        try
        {
            $stmt = $this->db->prepare("SELECT * FROM tbl_admins WHERE username=:uname LIMIT 1");
            $stmt->execute(array(':uname'=>$username, ':umail'=>$umail));
            $userRow=$stmt->fetch(PDO::FETCH_ASSOC);
            if($stmt->rowCount() > 0)
            {
                if(password_verify($password, $userRow['password']))
                {
                    $_SESSION['user_session'] = $userRow['user_id'];
                    return true;
                }
                else
                {
                    return false;
                }
            }
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    public function is_loggedin()
    {
        if(isset($_SESSION['user_session']))
        {
            return true;
        }
    }

    public function redirect($url)
    {
        header("Location: $url");
    }

    public function logout()
    {
        session_destroy();
        unset($_SESSION['user_session']);
        return true;
    }
}
?>