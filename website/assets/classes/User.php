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
            $sql = "SELECT * FROM `tbl_admins` WHERE username=:uname AND password=:pword";
            $query = $this->db->prepare($sql);
            $query->execute(array(':uname'=>$username, ':pword'=>$password));
            $rows = $query->fetchAll(PDO::FETCH_ASSOC);
            if($query->rowCount() > 0)
            {
                $_SESSION['user_session'] = $rows['user_id'];
                return true;

            }
            else
            {
                return false;
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