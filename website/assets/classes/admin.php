<?php
class admin
{
    private $db;

    public function __construct($conn)
    {
        $this->db = $conn;
    }

    public function setGame($team_id_a, $team_id_b)
    {
        try
        {
            $sql = "INSERT INTO `tbl_matches` (team_id_a, team_id_b) VALUES (:ida, :idb)";
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
            $sql = "INSERT INTO `tbl_matches` (score_team_a, score_team_b) VALUES (:scorea, :scoreb)";
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

    public function setPlayer($first_name, $last_name, $student_id)
    {
        try
        {
            $sql = "INSERT INTO `tbl_players` (student_id, first_name, last_name) VALUES (:id, :firstname, :lastname)";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(":id", $student_id);
            $stmt->bindparam(":firstname", $first_name);
            $stmt->bindparam(":lastname", $last_name);
            $stmt->execute();

            return $stmt;
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    public function setTeam($teamname)
    {
        try
        {
            $sql = "INSERT INTO `tbl_teams` (team_name) VALUES (:team_name)";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(":team_name", $teamname);
            $stmt->execute();

            return $stmt;
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    public function getTeam($teamname)
    {
        try
        {
            $sql = "SELECT * FROM `tbl_players` WHERE EXISTS (SELECT id FROM `tbl_teams` WHERE team_name=:team_name)";
            $stmt = $this->db->prepare($sql);
            $stmt->execute(array(':team_name'=>$teamname));
            $team = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $team;

        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }

}