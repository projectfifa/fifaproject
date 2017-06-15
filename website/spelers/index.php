<?php 
// ------------------------------------ STARTUP
session_start();
$_SESSION['page']="players"; 
require('../assets/dbconnect.php');
require('../assets/showList.php');
require('../assets/header.php'); 
require('../assets/showDetails.php');

// ------------------------------------ Target page

if (isset($_GET['pageId'])) {
    $target = $_GET['pageId'];
    // -------------------------------- Targeted


    // Get player information
    $playerQuery = "
    SELECT id, CONCAT(first_name, ' ', last_name) AS naam, student_id, team_id, goals_poules, goals_total, created_at
    FROM `tbl_players` 
    WHERE id = ". $target;
    $playerInfo = $conn->query($playerQuery)->fetchAll(PDO::FETCH_ASSOC);



    echo '<div class="sectionLeft matchesClr"><div class="sectionHalfPadding">';

    if (!empty($playerInfo)) {

        // Show all matches
        $matchesQuery = "
        SELECT m.id, a.team_name AS name_a, b.team_name AS name_b, m.score_team_a, m.score_team_b, m.poule_id, p.poule_name AS 'poule_name',  m.team_id_a AS 'team 1', m.team_id_b AS 'team 2', m.start_time AS 'start'
        FROM `tbl_matches` m 
        INNER JOIN `tbl_teams` a ON m.team_id_a = a.id
        INNER JOIN `tbl_teams` b ON m.team_id_b = b.id
        INNER JOIN `tbl_poules` p ON m.poule_id = p.id
        WHERE m.team_id_a = ".$playerInfo['0']['team_id']." OR m.team_id_b = ".$playerInfo['0']['team_id']." 
        ORDER BY m.start_time LIMIT 15";
        $matches = $conn->query($matchesQuery)->fetchAll(PDO::FETCH_ASSOC);



        if (!empty($matches)) {
            $showList = new showList($playerInfo['0']['naam']." laatste wedsrijden", $matches, 6, 1, "wedstrijden");
        } else {
            echo '<div class="errorMsg fontHeader">error</div>';
        }

        echo '</div></div>';
    
    
        $showDetails = new showDetails("players", $playerInfo);
    } else {
        echo '<div class="errorMsg fontHeader">error</div>';
        echo '</div></div>';

        echo '<div class="showDetails"><div class="sectionHalfPadding"><div class="errorMsg fontHeader">error</div></div></div>';
    }
    
    
    
} else { 
    // -------------------------------- Index
    echo '<div class="section playersClr">';

    /*	LIST OF TOP 10 BEST PLAYERS  */
    $query = "
        SELECT id, CONCAT(first_name, ' ', last_name) AS naam, student_id AS 'studenten nummer', goals_poules AS 'goals poules', goals_total AS 'goals total'
        FROM `tbl_players`
        ORDER BY goals_total ASC
        LIMIT 10";
    $list = $conn->query($query)->fetchAll(PDO::FETCH_ASSOC);
    $showList = new showList("Top 10 players:", $list, 1, 0, "spelers");


    echo '</div><div class="section playersClr">';

    /* LIST OF ALL PLAYERS */
    $query = "
        SELECT id, CONCAT(first_name, ' ', last_name) AS naam, student_id AS 'studenten nummer', goals_poules AS 'goals poules', goals_total AS 'goals total', created_at AS 'Registratie datum'
        FROM `tbl_players`
        ORDER BY created_at ASC";

    $list = $conn->query($query)->fetchAll(PDO::FETCH_ASSOC);
    $showList = new showList("All players:", $list, 1, 0, "spelers");


    echo '</div>';
}
require('../assets/footer.php');