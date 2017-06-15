<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Project Fifa</title>
    <link rel="stylesheet" type="text/css" href="/projectfifa3/website/assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="/projectfifa3/website/assets/css/addFonts.css">
    <script language="JavaScript" type="text/javascript" src="/projectfifa3/website/assets/javascript/navSidePanel.js"></script> 
    <script language="JavaScript" type="text/javascript" src="/projectfifa3/website/assets/javascript/jdenticon-1.4.0.js"></script>
    <script language="JavaScript" type="text/javascript" src="/projectfifa3/website/assets/javascript/jdenticon-1.4.0.min.js"></script>
</head>
<body onload="startUpCall()">

<header>
    <nav id="navSidePanel" class="pageTransition">

        <div class="logo">
            <a class="logocircle" href="/projectfifa3/website">
                <div class="logoimg" alt="logo"></div>
            </a>
        </div>
        
        
        <a class="nav-list-header" id="nav-list-teams" href="/projectfifa3/website/teams">
            <div>Teams</div>
        </a>
        <div class="nav-list">
        <?php

            $teamsQuery = "SELECT id, team_name, created_at FROM `tbl_teams` ORDER BY created_at ASC LIMIT 5";
            $listItems = $conn->query($teamsQuery)->fetchAll(PDO::FETCH_ASSOC);
            foreach ($listItems as $key) {
                echo '<a href="/projectfifa3/website/teams/?pageId='.$key['id'].'">'.$key['team_name'].'</a>';
            }
        ?>
        </div>


        <a class="nav-list-header" id="nav-list-players" href="/projectfifa3/website/spelers">
            <div>Players</div>
        </a>
        <div class="nav-list">
        <?php

            $playersQuery = "SELECT id, CONCAT(first_name, ' ', last_name) AS naam, created_at FROM `tbl_players` ORDER BY created_at ASC LIMIT 5";
            $listItems = $conn->query($playersQuery)->fetchAll(PDO::FETCH_ASSOC);
            foreach ($listItems as $key) {
                echo '<a href="/projectfifa3/website/spelers/?pageId='.$key['id'].'">'.$key['naam'].'</a>';
            }
        ?>
        </div>



        <a class="nav-list-header" id="nav-list-pouls" href="/projectfifa3/website/pouls">
            <div>Pouls</div>
        </a>
        <div class="nav-list">
        <?php

            $poulsQuery = "SELECT id, poule_name, created_at FROM `tbl_poules` ORDER BY created_at ASC LIMIT 5";
            $listItems = $conn->query($poulsQuery)->fetchAll(PDO::FETCH_ASSOC);
            foreach ($listItems as $key) {
                echo '<a href="/projectfifa3/website/pouls/?pageId='.$key['id'].'">'.$key['poule_name'].'</a>';
            }
        ?>
        </div>
    
        
    
        
    

        <a href="admin/login.php" class="acp" id="acpId">
            <div>Admin control panel</div>
        </a>
    </nav>
    <div class="closeBtnChamber pageTransition" id="closeBtnChamberId">
        <div class="closeBtnCircle" onclick="navSidePanelSwitch()">
            <div id="closeBtn">&#10006;</div>
        </div>
    </div>
    

    
    
    <div class="banner pageTransition" id="bannerId">
        
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
<div class="content pageTransition" id="contentId">