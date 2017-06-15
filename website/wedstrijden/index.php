<?php 
// ------------------------------------ STARTUP
session_start();
$_SESSION['page']="games";
require('../assets/dbconnect.php');
require('../assets/showList.php');
require('../assets/header.php'); 
require('../assets/showDetails.php');

// ------------------------------------ Target page

if (isset($_GET['pageId'])) {
    $target = $_GET['pageId'];
    // -------------------------------- Targeted
    

    // get match informatoin
        $matchQuery = "SELECT m.id, m.poule_id, m.team_id_a, m.team_id_b, a.team_name AS team_name_a, b.team_name AS team_name_b, m.score_team_a, m.score_team_b, m.start_time 
        FROM `tbl_matches` m
        INNER JOIN `tbl_teams` a ON m.team_id_a = a.id
        INNER JOIN `tbl_teams` b ON m.team_id_b = b.id
        WHERE m.id = ".$target;
    $matchInfo = $conn->query($matchQuery)->fetchAll(PDO::FETCH_ASSOC);

    if (!empty($matchInfo)) {

            // get winner
    if ($matchInfo['0']['score_team_a'] > $matchInfo['0']['score_team_b']) {
        $winner = "a";
        $goal_difference = $matchInfo['0']['score_team_a'] - $matchInfo['0']['score_team_b'];

        $team1Query = "SELECT id, CONCAT( first_name, ' ', last_name) AS naam, goals_poules AS 'Goals poules' FROM `tbl_players` WHERE team_id = ". $target;
        $team2Query = "SELECT id, goals_poules AS 'Goals poules', CONCAT( first_name, ' ', last_name) AS naam FROM `tbl_players` WHERE team_id = ". $target;

    } else if ($matchInfo['0']['score_team_a'] == $matchInfo['0']['score_team_b']) {
        $winner = "even";
        $goal_difference = 0;

        $team1Query = "SELECT id, CONCAT( first_name, ' ', last_name) AS naam, goals_poules AS 'Goals poules' FROM `tbl_players` WHERE team_id = ". $target;
        $team2Query = "SELECT id, goals_poules AS 'Goals poules', CONCAT( first_name, ' ', last_name) AS naam FROM `tbl_players` WHERE team_id = ". $target;

    } else {
        $winner = "b";
        $goal_difference = $matchInfo['0']['score_team_b'] - $matchInfo['0']['score_team_a'];

        $team1Query = "SELECT id, goals_poules AS 'Goals poules', CONCAT( first_name, ' ', last_name) AS naam FROM `tbl_players` WHERE team_id = ". $target;
        $team2Query = "SELECT id, CONCAT( first_name, ' ', last_name) AS naam, goals_poules AS 'Goals poules' FROM `tbl_players` WHERE team_id = ". $target;
    }

    // get players

    $team1Players = $conn->query($team1Query)->fetchAll(PDO::FETCH_ASSOC);
    $team2Players = $conn->query($team1Query)->fetchAll(PDO::FETCH_ASSOC);






  echo '<div class="centerPage">
            <div class="sectionMiddle matchesClr">
                <div class="sectionHalfPadding"> 
                    <div class="sectionMiddleHeader">
                        <div class="flexCol">
                            <div class="flexRowCenter fontp">
                                <div>
                                    <svg width="50" height="50" data-jdenticon-hash="'.hash("md5", $matchInfo['0']['team_name_a']).'"></svg>
                                </div>
                                <div>'.$goal_difference.'</div>
                                <div>
                                    <svg width="50" height="50" data-jdenticon-hash="'.hash("md5", $matchInfo['0']['team_name_b']).'"></svg>
                                </div>
                            </div>
                            <div class="flexRowCenter fontp">';
                            if ($winner == "a" or $winner == "even")
                            {
                          echo '<div>'.$matchInfo['0']['score_team_a'].'</div>
                                <div>/</div>
                                <div>'.$matchInfo['0']['score_team_b'].'</div>';
                            } else {
                          echo '<div>'.$matchInfo['0']['score_team_b'].'</div>
                                <div>/</div>
                                <div>'.$matchInfo['0']['score_team_a'].'</div>';        
                            }
                      echo '</div>
                        </div>
                    </div>
                </div>
                <div class="sectionHalfPadding sectionMiddleHalf" id="rmvPadTop">';
                    if ($winner == "a" or $winner == "even")
                    {
                        $showList = new showList($matchInfo['0']['team_name_a']." Spelers", $team1Players, 1, 0, "spelers");
                        $showList = new showList($matchInfo['0']['team_name_b']." Spelers", $team2Players, 1, 0, "spelers");
                    } else {
                        $showList = new showList($matchInfo['0']['team_name_b']." Spelers", $team2Players, 1, 0, "spelers");
                        $showList = new showList($matchInfo['0']['team_name_a']." Spelers", $team1Players, 1, 0, "spelers");
                    }
                    
          echo '</div>
            </div>
        </div>';

    } else {
  echo '<div class="centerPage">
            <div class="sectionMiddle matchesClr">
                <div class="errorMsg fontHeader">Match could not be found</div>
            </div>
        </div>';
    }

    




} else { 
    // -------------------------------- Index
    echo '<div class="section matchesClr">';

    /*	LIST OF TOP 10 BEST SCORED GAMES  */
    $query = "
        SELECT m.id, p.poule_name, a.team_name AS name_a, b.team_name AS name_b, m.score_team_a, m.score_team_b, m.poule_id AS poule, m.team_id_a AS team_A, m.team_id_b AS team_B, m.start_time AS start
        FROM `tbl_matches` m 
        
        INNER JOIN `tbl_teams` AS a ON m.team_id_a = a.id
        INNER JOIN `tbl_teams` AS b ON m.team_id_b = b.id
        INNER JOIN `tbl_poules` AS p ON m.poule_id = p.id

        ORDER BY m.score_team_a DESC, m.score_team_b DESC
        LIMIT 10";
    $list = $conn->query($query)->fetchAll(PDO::FETCH_ASSOC);
    $showList = new showList("Top 10 games", $list, 6, 1, "wedstrijden");

    echo '</div><div class="section matchesClr">';

    /* LIST OF ALL GAMES */
    $query = "
        SELECT m.id, a.team_name AS name_a, b.team_name AS name_b, m.score_team_a, m.score_team_b, m.poule_id AS poule, m.team_id_a AS team_A, m.team_id_b AS team_B, m.start_time AS start, p.poule_name 
        FROM `tbl_matches` m 
        
        INNER JOIN `tbl_teams` a ON m.team_id_a = a.id
        INNER JOIN `tbl_teams` b ON m.team_id_b = b.id
        INNER JOIN `tbl_poules` p ON m.poule_id = p.id
        ORDER BY start";

    $list = $conn->query($query)->fetchAll(PDO::FETCH_ASSOC);
    $showList = new showList("All games", $list, 6, 1, "wedstrijden");


    echo '</div>';

}
require('../assets/footer.php');