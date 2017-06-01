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
	echo '<div class="section"><div class="errorlog">Targeted</div></div>';

    

    // Get team information
    $teamQuery = "SELECT id, poule_id, team_name, created_at, goals_with, goals_against, goal_difference FROM `tbl_teams` WHERE id = ". $target;
    $teamInfo = $conn->query($teamQuery)->fetchAll(PDO::FETCH_ASSOC);


    echo '<div class="section">';
	var_dump($teamInfo);
    echo '</div>';



	echo '<div class="sectionLeft">';

    // Show all players
    $playersQuery = "
    SELECT id, first_name, last_name, student_id, created_at, goals_poules, goals_total 
    FROM `tbl_players` 
    WHERE team_id = ".$target."
    ORDER BY goals_total";

	$players = $conn->query($playersQuery)->fetchAll(PDO::FETCH_ASSOC);
    $showList = new showList($teamInfo['0']['team_name'], $players, 1, 0);


    echo '</div>';
    $showDetails = new showDetails("team", $teamInfo);

} else { 
    // -------------------------------- Index
    echo '<div class="section"><div class="errorlog">index</div></div>';

    echo '<div class="section">';
	$teamsQuery = "SELECT id, poule_id, team_name FROM `tbl_teams`";
	$teams = $conn->query($teamsQuery)->fetchAll(PDO::FETCH_ASSOC);

	// var_dump($teams);

	foreach ($teams as $key) {
	    $playersQuery = "SELECT id, first_name as voornaam, last_name as achternaam, student_id as studentnummer, created_at as registratiedatum FROM `tbl_players` WHERE team_id = ".$key['id'];
	    $players = $conn->query($playersQuery)->fetchAll(PDO::FETCH_ASSOC);
    	$showList = new showList($key['team_name'], $players, 1, 0);
	}
	echo '</div>';

}
require('../assets/footer.php');