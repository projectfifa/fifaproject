<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Project Fifa</title>
    <link rel="stylesheet" type="text/css" href="/projectfifa3/website/assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="/projectfifa3/website/assets/css/addFonts.css">
    <script language="JavaScript" type="text/javascript" src="/projectfifa3/website/assets/javascript/navSidePanel.js"></script> 
</head>
<body>
<header>
    <div class="acp">
        <a href="admin/login.php">ACP</a>
    </div>
    
    <div class="banner">
        
        <?php 
        if (isset($_SESSION['page'])) {
        	switch ($_SESSION['page']) {

        	case 'index':
        		echo '<img src="/projectfifa3/website/assets/img/banners/index_banner.png" alt="Project Fifa">';
        		break;

        	case 'players':
        		echo '<img src="/projectfifa3/website/assets/img/banners/players_banner.png" alt="Project Fifa">';
        		break;      

        	case 'teams':
        		echo '<img src="/projectfifa3/website/assets/img/banners/teams_banner.png" alt="Project Fifa">';
        		break;  	

        	case 'poules':
        		echo '<img src="/projectfifa3/website/assets/img/banners/poules_banner.png" alt="Project Fifa">';
        		break;

        	case 'games':
        		echo '<img src="/projectfifa3/website/assets/img/banners/games_banner.png" alt="Project Fifa">';
        		break;

        	default:
        		echo '<img src="/projectfifa3/website/assets/img/banners/index_banner.png" alt="Project Fifa">';
        		break;
        	}

        } else {
        	echo '<img src="/projectfifa3/website/assets/img/banners/index_banner.png" alt="Project Fifa">';
        }     
        ?>


    </div>
</header>



<?php
    function navList($querry) {
        require('dbconnect.php');
        $list = $conn->query($querry)->fetchAll(PDO::FETCH_ASSOC);
        foreach ($list as $row) {
            echo '<div>'.$row['team_name'].'</div>';
        }
    }
            
?>

<div id="closeBtn" onclick="navSidePanelSwitch()">&#10006;</div>
<nav id="navSidePanel">
    <img class="logo" src="/projectfifa3/website/assets/img/" alt="logo">

    <div class="nav-list-header" onclick="navListSwitch('nav-list-pouls')">
        <div>Pouls</div>
    </div>
    <div class="nav-list">
        <div id="nav-list-pouls">jupilerLeague</div>
        <div>baseball league</div>

    </div>

    <div class="nav-list-header" onclick="navListSwitch('nav-list-teams')">
        <div>Teams</div>
    </div>
    <div class="nav-list">
        <div id="nav-list-teams">psv</div>
        <div>ajax</div>
        <div>nac</div>
    </div>

    <div class="nav-list-header" onclick="navListSwitch('nav-list-players')">
        <div>Players</div>
    </div>
    <div class="nav-list">
        <div id="nav-list-players">Guido</div>
        <div>Alex</div>
        <div>bjorn</div>
    </div>

    <div class="nav-list-header" onclick="navListSwitch('nav-list-games')">
        <div>Games</div>
    </div>
    <div class="nav-list">
        <div id="nav-list-games">psv</div>
        <div>ajax</div>
        <div>nac</div>
    </div>

</nav>


<div class="content">
    <div class="section">
        <div id="errorlogfirst">errorlog1</div>
        <div id="errorlogsecond">errorlog2</div>
        <div id="errorlogthird">errorlog3</div>
    </div>

    <div class="section">
        <div class="errorlog">Dev:</div>
        <form method="GET">
            <input type="number" name="pageId">
            <input type="submit" value="Submit">
        </form>
    </div>