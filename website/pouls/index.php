<?php 
// ------------------------------------ STARTUP
session_start();
$_SESSION['page']="poules";
require('../assets/dbconnect.php');
require('../assets/showList.php');
require('../assets/header.php'); 
require('../assets/showDetails.php');

// ------------------------------------ Target page

if (isset($_GET['pageId'])) {
    $target = $_GET['pageId'];
    // -------------------------------- Targeted 


    // Get Poul information
    $poulQuery = "
    SELECT id, poule_name, created_at
    FROM `tbl_poules` 
    WHERE id = ". $target;
    $pouleInfo = $conn->query($poulQuery)->fetchAll(PDO::FETCH_ASSOC);


    if (!empty($pouleInfo))
    {

        $teamsQuery = "SELECT id, team_name AS 'Team naam', points AS 'Punten', matches_played AS 'Aantal wedstrijden', goals_with AS 'Goals' FROM `tbl_teams` WHERE poule_id = ".$pouleInfo['0']['id']."
        ORDER BY points DESC";
        $team = $conn->query($teamsQuery)->fetchAll(PDO::FETCH_ASSOC);

    
        $matchesQuery = "
        SELECT m.id, a.team_name AS name_a, b.team_name AS name_b, m.score_team_a, m.score_team_b, p.poule_name, m.poule_id AS poule, m.team_id_a AS 'team A', m.team_id_b AS 'team B', m.start_time AS start 
        FROM `tbl_matches` m
        INNER JOIN `tbl_teams` a ON m.team_id_a = a.id
        INNER JOIN `tbl_teams` b ON m.team_id_b = b.id
        INNER JOIN `tbl_poules` p ON m.poule_id = p.id
        WHERE m.poule_id = ".$pouleInfo['0']['id']."
        ORDER BY m.score_team_a DESC, m.score_team_b DESC
        LIMIT 5";
        $matches = $conn->query($matchesQuery)->fetchAll(PDO::FETCH_ASSOC);

        if (!empty($team))
        {
            echo '<div class="sectionLeft teamsClr"><div class="sectionHalfPadding">';
            $showList = new showList($pouleInfo['0']['poule_name']." teams:", $team, 1, 0, "teams");

            if (!empty($matches)) {
                $showList = new showList("Last 5 games", $matches, 6, 1, "wedstrijden");

            } else {
                echo '<div class="errorMsg fontHeader">No corresponding matches</div>';
            }
            echo '</div></div>';

        } else {
            echo '<div class="sectionLeft teamsClr"><div class="sectionHalfPadding">';
            echo '<div class="errorMsg fontHeader">No corresponding teams found</div>';
            echo '</div></div>';
        }

        $showDetails = new showDetails("poules", $pouleInfo);

    } else {
        echo '<div class="sectionLeft teamsClr"><div class="sectionHalfPadding">';
        echo '<div class="errorMsg fontHeader">Pool could not be found</div>';
        echo '</div></div>';
        echo '<div class="showDetails"><div class="sectionHalfPadding"><div class="errorMsg fontHeader">error</div></div></div>';
    }

    
    
    
} else { 
    // -------------------------------- Index
	echo '<div class="section"><div class="errorlog">index</div></div>';

    // Get Poul information
	$poulsQuery = "SELECT id, poule_name, created_at, deleted_at FROM `tbl_poules`";
	$pouls = $conn->query($poulsQuery)->fetchAll(PDO::FETCH_ASSOC);

	// Show each pool
	foreach ($pouls as $key) {

		// Show 
	    $teamsQuery = "SELECT id, team_name, points FROM `tbl_teams` WHERE poule_id = ".$key['id']."
	    ORDER BY points DESC";
	    $team = $conn->query($teamsQuery)->fetchAll(PDO::FETCH_ASSOC);

	    $matchesQuery = "
        SELECT m.id, a.team_name AS name_a, b.team_name AS name_b, m.score_team_a, m.score_team_b, m.poule_id AS poule, m.team_id_a AS team_A, m.team_id_b AS team_B, m.start_time AS start, p.poule_name 
        FROM `tbl_matches` m
        INNER JOIN `tbl_teams` a ON m.team_id_a = a.id
        INNER JOIN `tbl_teams` b ON m.team_id_b = b.id
        INNER JOIN `tbl_poules` p ON m.poule_id = p.id
        WHERE m.poule_id = ".$key['id']."
        ORDER BY m.score_team_a DESC, m.score_team_b DESC
        LIMIT 5";
	    $matches = $conn->query($matchesQuery)->fetchAll(PDO::FETCH_ASSOC);
	    if (!empty($team))
	    {
	    	echo '<div class="sectionHalf"><div class="sectionHalfPadding">';
    		$showList = new showList($key['poule_name'], $team, 1, 0, "teams");
    		if (!empty($matches)) {
    			$showList = new showList("Last 5 games", $matches, 5, 1, "wedstrijden");
    		}
        	echo '</div></div>';
	    }
        
	}
}
require('../assets/footer.php');
