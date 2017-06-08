<?php
class showList {

	public function __construct($nameInput, $listInput, $negate, $type) {
		$header = $nameInput;
		$list = $listInput;
		$arrayKeys = array_keys($list[0]);
		$columnCnt = count($list[0]);

		//var_dump($list);

		// Header
		echo '<div class="list">';
		echo '<div class="showListHeader fontHeader">'; echo $header; echo'</div>				
		      <div class="showListContent">';

		// Columnheader
		echo '<div class="row-list">';
		for ($i=$negate; $i < $columnCnt; $i++) { 
 				echo '<div class="fontp">'.$arrayKeys[$i].'</div>';
 			}
 			echo '</div>';

 		// Rows switch
 		switch ($type) {
 			case 0:
 			default:

 				// Rows default
				foreach ($list as $row) {
 					echo '<a class="row-list" href="/projectfifa3/website/spelers/?pageId='.$row['id'].'">';

 					for ($i=$negate; $i < $columnCnt; $i++) { 
 						echo '<div class="fontS">'.$row[$arrayKeys[$i]].'</div>';
 					}
 					echo '</a>';
				}
 			break;

 			case 1:

 				// Rows match
 				foreach ($list as $row) {
 				  echo '<div class="row-list">
            				<div>
								<img src="assets/img/pouls/'.$row['poule'].'.png" alt="Pool" id="row-list-match-header-img">
            				</div>
            				<div>
								<img src="assets/img/teams/'.$row['team_A'].'.png" alt="TeamA">
								<h3>'.$row['name_a'].'</h3>
								<h4>'.$row['score_team_a'].'</h4>
            				</div>
            				<div>
								<img src="assets/img/teams/'.$row['team_B'].'.png" alt="TeamA">
								<h3>'.$row['name_b'].'</h3>
								<h4>'.$row['score_team_b'].'</h4>
            				</div>
            				<div>'.$row['start'].'</div>
        				</div>';
 				}
 				break;
 		}

		// Footer
		echo '</div>
		      </div>';

		
	}
}
?>