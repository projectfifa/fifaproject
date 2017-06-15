<?php 
// ------------------------------------ STARTUP
session_start();
$_SESSION['page']="teams";
require('../assets/dbconnect.php');
require('../assets/showList.php');
require('../assets/header.php');
require('../assets/showDetails.php');


// ------------------------------------ Target page

if (isset($_GET['pageId'])) {
	// -------------------------------- Targeted

	$target = $_GET['pageId'];

    

    // Get team information
    $teamQuery = "SELECT id, poule_id, team_name, created_at, goals_with, goals_against, goal_difference 
    FROM `tbl_teams` 
    WHERE id = ". $target;
    $teamInfo = $conn->query($teamQuery)->fetchAll(PDO::FETCH_ASSOC);




	echo '<div class="sectionLeft playersClr"><div class="sectionHalfPadding">';

    // Show all players
    $playersQuery = "
    SELECT id, CONCAT(first_name, ' ', last_name) AS naam, student_id, goals_poules AS 'Goals poules', goals_total AS 'Goals totaal'
    FROM `tbl_players` 
    WHERE team_id = ".$target."
    ORDER BY goals_total";

	$players = $conn->query($playersQuery)->fetchAll(PDO::FETCH_ASSOC);

    if (!empty($players)) {
        $showList = new showList($teamInfo['0']['team_name'], $players, 1, 0, "spelers");
    } else {
        echo '<div class="errorMsg fontHeader">error</div>';
    }

    echo '</div></div>';
    
    if (!empty($teamInfo)) {
        $showDetails = new showDetails("team", $teamInfo);
    } else {
        echo '<div class="showDetails"><div class="sectionHalfPadding"><div class="errorMsg fontHeader">error</div></div></div>';
    }
    


} else { 
    // -------------------------------- Index


    // get all teams
	$teamsQuery = "SELECT id, poule_id, team_name FROM `tbl_teams`";
	$teams = $conn->query($teamsQuery)->fetchAll(PDO::FETCH_ASSOC);

	// show all teams
	foreach ($teams as $key) {
	    $playersQuery = "SELECT id, first_name as voornaam, last_name as achternaam, student_id as studentnummer, created_at as registratiedatum FROM `tbl_players` WHERE team_id = ".$key['id'];
	    $players = $conn->query($playersQuery)->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($players))
        {
            echo '<div class="section playersClr">';
            $showList = new showList($key['team_name'], $players, 1, 0, "spelers");
            echo '</div>';
        }
	}


}
require('../assets/footer.php');