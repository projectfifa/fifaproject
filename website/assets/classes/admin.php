<?php
class admin
{
    private $db;

    public function __construct($conn)
    {
        return $this->db;
    }

    public function setGame($team_id_a, $team_id_b)
    {
        try
        {
            $sql = "INSERT INTO `tbl_admins` (team_id_a, team_id_b) VALUES (:ida, :idb)";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(":ida", $team_id_a);
            $stmt->bindparam(":idb", $team_id_b);
            $stmt->execute();

            return $stmt;
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    public function setScore($score_team_a, $score_team_b)
    {
        try
        {
            $sql = "INSERT INTO `tbl_admins` (score_team_a, score_team_b) VALUES (:scorea, :scoreb)";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(":scorea", $score_team_a);
            $stmt->bindparam(":scoreb", $score_team_b);
            $stmt->execute();

            return $stmt;
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    

}