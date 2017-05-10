<?php 
session_start();
$_SESSION['page']="players";
require(realpath(__DIR__) . '/templates/header.php'); 
require('dbconnect.php');
require('showList.php');
?>

        <div class="showListHeader"> Title </div>
        <div class="showListContent">
            <div class="row-list-columnheader">
                <div> item1 </div>
                <div> item2 </div>
                <div> item3 </div>
                <div> item1 </div>
                <div> item2 </div>
                <div> item3 </div>
            </div>
            <div class="row-list">
                <div> item1 </div>
                <div> item2 </div>
                <div> item3 </div>
                <div> item1 </div>
                <div> item2 </div>
                <div> item3 </div>
            </div>
            <div class="row-list">
                <div> item1 </div>
                <div> item2 </div>
                <div> item3 </div>
                <div> item1 </div>
                <div> item2 </div>
                <div> item3 </div>
            </div>
            <div class="row-list">
                <div> item1 </div>
                <div> item2 </div>
                <div> item3 </div>
                <div> item1 </div>
                <div> item2 </div>
                <div> item3 </div>
            </div>
            <div class="row-list">
                <div> item1 </div>
                <div> item2 </div>
                <div> item3 </div>
                <div> item1 </div>
                <div> item2 </div>
                <div> item3 </div>
            </div>
            <div class="row-list">
                <div> item1 </div>
                <div> item2 </div>
                <div> item3 </div>
                <div> item1 </div>
                <div> item2 </div>
                <div> item3 </div>
            </div>
        </div>
        <div class="showListFooter"></div>
    <?php
    

    $teamsQuery = "SELECT id, poule_id, name FROM `tbl_teams`";
    $teams = $conn->query($teamsQuery)->fetchAll(PDO::FETCH_ASSOC);


    foreach ($teams as $key) {
        $playersQuery = "SELECT id, first_name as voornaam, last_name as achternaam, student_id as studentnummer, created_at as registratiedatum FROM `tbl_players` WHERE team_id = ".$key['id'];
        $players = $conn->query($playersQuery)->fetchAll(PDO::FETCH_ASSOC);
        $showList = new showList($key['name'], $players, 1, 0);
    }


    ?>
    </div>

<?php require(realpath(__DIR__) . '/templates/footer.php');
