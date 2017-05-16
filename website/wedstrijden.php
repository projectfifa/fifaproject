<?php 
session_start();
$_SESSION['page']="games";
require(realpath(__DIR__) . '/templates/header.php'); 
require('dbconnect.php');
require('showList.php');



/*	LIST OF TOP 10 BEST SCORED GAMES  */
$query = "SELECT id, poule_id, team_id_a, team_id_b, score_team_a, score_team_b FROM `tbl_matches` ORDER BY score_team_a, score_team_b DESC LIMIT 3";
$list = $conn->query($query)->fetchAll(PDO::FETCH_ASSOC);
$showList = new showList("Top 10 games", $list, 1, 0);




/* LIST OF ALL GAMES */
$query = "
    SELECT m.id, a.name AS name_a, b.name AS name_b, m.score_team_a, m.score_team_b, m.poule_id AS poule, m.team_id_a AS team_A, m.team_id_b AS team_B, m.start_time AS start 
    FROM `tbl_matches` m 
    
    INNER JOIN `tbl_teams` a ON m.team_id_a = a.id
    INNER JOIN `tbl_teams` b ON m.team_id_b = b.id
    ORDER BY m.score_team_a, m.score_team_b";

$list = $conn->query($query)->fetchAll(PDO::FETCH_ASSOC);
$showList = new showList("All games", $list, 5, 1);




/* LIST OF ALL GAMES */
$query = "
    SELECT m.id, a.name AS name_a, b.name AS name_b, m.score_team_a, m.score_team_b, m.poule_id AS poule, m.team_id_a AS team_A, m.team_id_b AS team_B, m.start_time AS start 
    FROM `tbl_matches` m 
    INNER JOIN `tbl_teams` a ON m.team_id_a = a.id
    INNER JOIN `tbl_teams` b ON m.team_id_b = b.id";

$list = $conn->query($query)->fetchAll(PDO::FETCH_ASSOC);
$showList = new showList("All games", $list, 5, 1);



/*
<div class="showListHeader"> Title </div>
    <div class="showListContent">
        <div class="row-list-columnheader">
            <div> League: </div>
            <div> teamA </div>
            <div> teamB </div>
            <div> Tijd </div>
		</div>

		<div class="row-list-match">
            <div class="row-list-match-header">
				<img src="" alt="Pool">
            </div>
            <div class="row-list-match-team">
				<img src="" alt="TeamA">
				<h3>Fitesse</h3>
				<h4>5</h4>
            </div>
            <div class="row-list-match-team">
            	<img src="" alt="TeamB">
            	<h3>Feyenoord</h3>
            	<h4>3</h4>
            </div>
            <div class="row-list-match-footer">17 maart</div>
        </div>

		<div class="row-list-match">
            <div class="row-list-match-header">
				<img src="" alt="Pool">
            </div>
            <div class="row-list-match-team">
				<img src="" alt="TeamA">
				<h3>Fitesse</h3>
				<h4>5</h4>
            </div>
            <div class="row-list-match-team">
            	<img src="" alt="TeamB">
            	<h3>Feyenoord</h3>
            	<h4>3</h4>
            </div>
            <div class="row-list-match-footer">17 maart</div>
		</div>
    </div>
<div class="showListFooter"></div>

*/
require(realpath(__DIR__) . '/templates/footer.php');
