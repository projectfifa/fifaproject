<?php 
// ------------------------------------ STARTUP

session_start();
$_SESSION['page']="games";
require('../assets/dbconnect.php');
require('../assets/showList.php');
require('../assets/header.php'); 


// ------------------------------------ Target page

if (isset($_GET['pageId'])) {
    // -------------------------------- Targeted
    echo '<div class="errorlog">Targeted</div>';
    

    
} else { 
    // -------------------------------- Index
    echo '<div class="errorlog">index</div>';


    /*	LIST OF TOP 10 BEST SCORED GAMES  */
    $query = "
        SELECT m.id, a.team_name AS name_a, b.team_name AS name_b, m.score_team_a, m.score_team_b, m.poule_id AS poule, m.team_id_a AS team_A, m.team_id_b AS team_B, m.start_time AS start 
        FROM `tbl_matches` m 
        
        INNER JOIN `tbl_teams` a ON m.team_id_a = a.id
        INNER JOIN `tbl_teams` b ON m.team_id_b = b.id
        ORDER BY m.score_team_a DESC, m.score_team_b DESC
        LIMIT 10";
    $list = $conn->query($query)->fetchAll(PDO::FETCH_ASSOC);
    $showList = new showList("Top 10 games", $list, 5, 1);




    /* LIST OF ALL GAMES */
    $query = "
        SELECT m.id, a.team_name AS name_a, b.team_name AS name_b, m.score_team_a, m.score_team_b, m.poule_id AS poule, m.team_id_a AS team_A, m.team_id_b AS team_B, m.start_time AS start 
        FROM `tbl_matches` m 
        
        INNER JOIN `tbl_teams` a ON m.team_id_a = a.id
        INNER JOIN `tbl_teams` b ON m.team_id_b = b.id
        ORDER BY m.score_team_a, m.score_team_b";

    $list = $conn->query($query)->fetchAll(PDO::FETCH_ASSOC);
    $showList = new showList("All games", $list, 5, 1);




}
require('../assets/footer.php');