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
    public function checkPlayerId($sid)
    {
        $sql = "SELECT * FROM `tbl_players` WHERE student_id = :sid";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':sid', $sid);
        $stmt->execute();


        if($stmt->rowCount() > 0){
            return true;
        }
        else{
            return false;
        }
    }

    public function setPlayer($sid, $fname, $lname)
    {
        try
        {
            $sql = "INSERT INTO `tbl_players` (student_id, first_name, last_name) VALUES (:sid, :fname, :lname)";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(":sid", $sid);
            $stmt->bindparam(":fname", $fname);
            $stmt->bindparam(":lname", $lname);
            $stmt->execute();

            return $stmt;
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    public function showUnassignedPlayers()
    {
        $sql = "SELECT first_name, last_name, student_id FROM `tbl_players` WHERE team_id IS NULL";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $players = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $output = "";
        foreach ($players as $player)
        {
            $fname = $player['first_name'];
            $lname = $player['last_name'];
            $sid =  $player['student_id'];

            $output .= "<tr>";
            $output .= "<td>" . $fname . "</td>";
            $output .= "<td>" . $lname . "</td>";
            $output .= "<td>" . $sid . "</td>";
            $output .= "</tr>";


        }
        return $output;
    }

    public function checkTeamName($tname)
    {
        $sql = "SELECT * FROM `tbl_teams` WHERE team_name = :tname";
        $stmt = $this->db->prepare($sql);
        $stmt->bindparam(':tname', $tname);
        $stmt->execute();


        if($stmt->rowCount() > 0){
            return true;
        }
        else{
            return false;
        }
    }

    public function setTeam($tname)
    {
        try
        {
            $sql = "INSERT INTO `tbl_teams` (team_name) VALUES (:team_name)";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(":team_name", $tname);
            $stmt->execute();

            return $stmt;
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    public function getTeams()
    {
        $sql = "SELECT team_id FROM `tbl_players` WHERE team_id = NULL";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        if($stmt->rowCount() > 0)
        {
            return;
        }
    }



}