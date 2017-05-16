<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Project Fifa</title>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="assets/css/addFonts.css">
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
        		echo '<img src="assets/img/banners/index_banner.png" alt="Project Fifa">';
        		break;

        	case 'players':
        		echo '<img src="assets/img/banners/players_banner.png" alt="Project Fifa">';
        		break;      

        	case 'teams':
        		echo '<img src="assets/img/banners/teams_banner.png" alt="Project Fifa">';
        		break;  	

        	case 'poules':
        		echo '<img src="assets/img/banners/poules_banner.png" alt="Project Fifa">';
        		break;

        	case 'games':
        		echo '<img src="assets/img/banners/games_banner.png" alt="Project Fifa">';
        		break;

        	default:
        		echo '<img src="assets/img/banners/index_banner.png" alt="Project Fifa">';
        		break;
        	}

        } else {
        	echo '<img src="assets/img/banners/index_banner.png" alt="Project Fifa">';
        }     
        ?>


    </div>
    <div class="container">
        <ul class="row-spaced">
			<li><a href="teams.php">
                    <img class="back" src="assets/img/nav/teams2.png" alt="">
                    <img class="front" src="assets/img/nav/teams.png" alt="">
                </a></li>
            <li><a href="wedstrijden.php">
                    <img class="back" src="assets/img/nav/wedstrijden2.png" alt="">
                    <img class="front" src="assets/img/nav/wedstrijden.png" alt="">
                </a></li>
            <li><a href="index.php">
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
    </div>
</header>

<nav>
    <img class="logo" src="/" alt="logo">
    <div class="nav-list-header">
        <div>Pouls</div>
    </div>
    <div class="nav-list">
        <div>jupilerLeague</div>
        <div>baseball league</div>
    </div>
    <div class="nav-list-header">
        <div>Teams</div>
    </div>
    <div class="nav-list">
        <div>psv</div>
        <div>ajax</div>
        <div>nac</div>
    </div>
    <div class="nav-list-header">
        <div>Players</div>
    </div>
    <div class="nav-list">
        <div>Guido</div>
        <div>Alex</div>
        <div>bjorn</div>
    </div>
    <div class="nav-list-header" onclick="document.getElementById('navListGames').style.display = 'none'">
        <div>Games</div>
    </div>
    <div class="nav-list" id="navListGames">
        <div>psv</div>
        <div>ajax</div>
        <div>nac</div>
    </div>
</nav>


<div class="content">
