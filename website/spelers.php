<?php 
require(realpath(__DIR__) . '/templates/header.php'); 
require('dbconnect.php');
require('showList.php');
?>

    <header>
        <div class="acp">
            <a href="admin/login.php">ACP</a>
        </div>
        <div class="banner">
            <div class="container">
                <img src="assets/img/banners/spelers_banner.png" alt="Project Fifa">
            </div>
        </div>
        <div class="container">
            <nav>
                <ul class="row-spaced">
                    <li><a  href="teams.php">
                            <img class="back" src="assets/img/nav/teams2.png" alt="">
                            <img class="front" src="assets/img/nav/teams.png" alt="">
                        </a></li>
                    <li><a href="wedstrijden.php">
                            <img class="back" src="assets/img/nav/wedstrijden2.png" alt="">
                            <img class="front" src="assets/img/nav/wedstrijden.png" alt="">
                        </a></li>
                    <li><a  href="index.php">
                            <img class="back" src="assets/img/nav/home2.png" alt="">
                            <img class="front" src="assets/img/nav/home.png" alt="">
                        </a></li>
                    <li><a href="poules.php">
                            <img class="back" src="assets/img/nav/poules2.png" alt="">
                            <img class="front" src="assets/img/nav/poules.png" alt="">
                        </a></li>
                    <li><a href="spelers.php">
                            <img class="back" src="assets/img/nav/spelers2.png" alt="">
                            <img class="front" src="assets/img/nav/spelers.png" alt="">
                        </a></li>
                </ul>
            </nav>
        </div>
    </header>
    <div class="content">
        <div class="showListHeader"> Title </div>
        <div class="showListContent">
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
        $playersQuery = "SELECT id, first_name, last_name, student_id, created_at FROM `tbl_players` WHERE team_id = ".$key['id'];
        $players = $conn->query($playersQuery)->fetchAll(PDO::FETCH_ASSOC);
        $showList = new showList($key['name'], $players);
    }


    ?>
    </div>

<?php require(realpath(__DIR__) . '/templates/footer.php');
