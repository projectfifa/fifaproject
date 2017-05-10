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
            $sql = "SELECT * FROM `tbl_admins` WHERE username=:uname";
            $query = $this->db->prepare($sql);
            var_dump($query);
            die;
            $query->execute(array(':uname'=>$username));
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if($stmt->rowCount() > 0)
            {
                if(password_verify($password, $rows['password']))
                {
                    $_SESSION['user_session'] = $rows['user_id'];
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