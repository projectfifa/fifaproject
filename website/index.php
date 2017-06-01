<?php 

// ------------------------------------ STARTUP

session_start();
$_SESSION['page']="index";
require('/assets/dbconnect.php');
require('/assets/showList.php');
require('/assets/header.php');



?>
<div class="splitter">

		<?php
		$teamsQuery = "SELECT id, poule_id, team_name FROM `tbl_teams`";
		$teams = $conn->query($teamsQuery)->fetchAll(PDO::FETCH_ASSOC);

		foreach ($teams as $key) {
		    $playersQuery = "SELECT id, first_name as voornaam, last_name as achternaam, student_id as studentnummer, created_at as registratiedatum FROM `tbl_players` WHERE team_id = ".$key['id'];
		    $players = $conn->query($playersQuery)->fetchAll(PDO::FETCH_ASSOC);

		    
		    $showList = new showList($key['team_name'], $players, 1, 0);
		}
		?>

</div>
<div class="splitter">
	<h1>test</h1>
</div>
<div class="splitter">
	<h1>test</h1>
</div>
<div class="splitter">
	<h1>test</h1>
</div>
<?php

require('/assets/footer.php');