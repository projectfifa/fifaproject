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



?>
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
<?php
require(realpath(__DIR__) . '/templates/footer.php');
