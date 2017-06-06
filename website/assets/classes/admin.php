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

    public function addToTeam($tname, $sid)
    {
        try{
            $tid = $this->getTeamId($tname)[0]["id"];
            $sql = "UPDATE `tbl_players` SET team_id = :tid WHERE student_id = :sid";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':tid', $tid);
            $stmt->bindparam(':sid', $sid);
            $stmt->execute();
            return true;
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    public function addToPoule($pname, $tname)
    {
        try{
            $pid = $this->getPouleId($pname)[0]["id"];
            $sql = "UPDATE `tbl_teams` SET poule_id = :pid WHERE team_name = :tname";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':tname', $tname);
            $stmt->bindparam(':pid', $pid);
            $stmt->execute();

            return true;
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    public function checkPouleAmount($pname)
    {
        $pid = $this->getPouleId($pname)[0]['id'];
        $sql = "SELECT poule_id FROM `tbl_teams` WHERE poule_id = :pid";
        $stmt = $this->db->prepare($sql);
        $stmt->bindparam(':pid', $pid);
        $stmt->execute();

        if($stmt->rowCount() >= 5)
        {
            return false;
        }
        else{
            return true;
        }
    }

    public function checkPouleName($pname)
    {
        $sql = "SELECT * FROM `tbl_poules` WHERE poule_name = :pname";
        $stmt = $this->db->prepare($sql);
        $stmt->bindparam(':pname', $pname);
        $stmt->execute();


        if($stmt->rowCount() > 0)
        {
            return true;
        }
        else{
            return false;
        }
    }

    public function setPoule($pname)
    {
        try
        {
            $sql = "INSERT INTO `tbl_poules` (poule_name) VALUES (:pname)";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(":pname", $pname);
            $stmt->execute();

            return $stmt;
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    public function showUnassignedTeams()
    {
        $sql = "SELECT team_name FROM `tbl_teams` WHERE poule_id = 0";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $teams = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $output = "";
        foreach ($teams as $team)
        {
            $tname = $team["team_name"];

            $output .= "<tr>";
            $output .= "<td>" . $tname . "</td>";

            $output .= "<td><select name=\"poule_select\">";
            $output .= "<option disabled selected value> -- Select A Poule -- </option>";
            foreach ($this->getPoules() as $poule => $poule_name)
            {
                $output .= "<option value=\"{$poule_name["poule_name"]}\">" . $poule_name["poule_name"] ."</option>";
            }
            $output .= "</select>";
            $output .= "<button type=\"submit\" name='addtopoule' value=\"$tname\" class='submit'>Add To Poule</button></td>";

            $output .= "</tr>";
        }
        return $output;
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
            $output .= "<td><select name=\"team_select\">";
            $output .= "<option disabled selected value> -- Select A Team -- </option>";
            foreach ($this->getTeams() as $team => $team_name)
            {
                $output .= "<option value=\"{$team_name["team_name"]}\">" . $team_name["team_name"] ."</option>";
            }
            $output .= "</select>";
            $output .= "<button type=\"submit\" name='addtoteam' value=\"$sid\" class='submit'>Add To Team</button></td>";

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
            $sql = "INSERT INTO `tbl_teams` (team_name) VALUES (:tname)";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(":tname", $tname);
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
        $sql = "SELECT team_name FROM `tbl_teams` WHERE team_name IS NOT NULL";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $teams = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $teams;
    }

    public function getPoules()
    {
        $sql = "SELECT poule_name FROM `tbl_poules` WHERE poule_name IS NOT NULL";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $poules = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $poules;
    }

    public function getPouleId($pname)
    {
        $sql = "SELECT id FROM `tbl_poules` WHERE poule_name = :pname";
        $stmt = $this->db->prepare($sql);
        $stmt->bindparam(":pname", $pname);
        $stmt->execute();
        $pid = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $pid;
    }

    public function getTeamId($tname)
    {
        $sql = "SELECT id FROM `tbl_teams` WHERE team_name = :tname";
        $stmt = $this->db->prepare($sql);
        $stmt->bindparam(":tname", $tname);
        $stmt->execute();
        $tid = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $tid;
    }

    public function pouleIdCount()
    {
        try
        {
            $sql = "SELECT poule_id FROM `tbl_teams` WHERE id IS NOT NULL";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            $teams = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $count = array();
            foreach($teams as $team){
                foreach($team as $key => $value){
                    if(array_key_exists($value, $count)){
                        $count[$value] = $count[$value] + 1;
                    } else {
                        $count[$value] = 1;
                    }
                }
            }
            return $count;
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    public function createKnockouts()
    {
        $sql = "SELECT * FROM `tbl_teams` WHERE id IS NOT NULL";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $teams = $stmt->fetchAll(PDO::FETCH_ASSOC);

//        if teams <= 4  = knockout
//        if teams > 4 = poule
//        if teams > 8 = 2 poules etc.
        if($stmt->rowCount() <= 4){
            foreach ($teams as $team)
            {
                //KNOCKOUTSSSSS

            }
        }
        elseif($stmt->rowCount() > 4)
        {
            return false;
        }

    }


}