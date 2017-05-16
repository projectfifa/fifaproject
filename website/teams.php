<?php 
session_start();
$_SESSION['page']="teams";
require(realpath(__DIR__) . '/templates/header.php'); 
require('dbconnect.php');
require('showList.php');

$teamsQuery = "SELECT id, poule_id, name FROM `tbl_teams`";
$teams = $conn->query($teamsQuery)->fetchAll(PDO::FETCH_ASSOC);

var_dump($teams);

foreach ($teams as $key) {
    $playersQuery = "SELECT id, first_name as voornaam, last_name as achternaam, student_id as studentnummer, created_at as registratiedatum FROM `tbl_players` WHERE team_id = ".$key['id'];
    $players = $conn->query($playersQuery)->fetchAll(PDO::FETCH_ASSOC);
    $showList = new showList($key['name'], $players, 1, 0);
}

require(realpath(__DIR__) . '/templates/footer.php');
?>