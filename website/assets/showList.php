<?php
class showList {

	public function __construct($nameInput, $listInput, $negate, $type, $link) {
		$header = $nameInput;
		$list = $listInput;
		$arrayKeys = array_keys($list[0]);
		$columnCnt = count($list[0]);





		// Header
		echo '<div class="list">';
		echo '<div class="showListHeader">'; echo $header; echo'</div>				
		      <div class="showListContent">';

		// Columnheader
		echo '<div class="row-list" id="clmnHeader">';
		for ($i=$negate; $i < $columnCnt; $i++) { 
 				echo '<div>'.$arrayKeys[$i].'</div>';
 			}
 			echo '</div>';

 		// Rows switch
 		switch ($type) {
 			case 0:
 			default:

 				// Rows default
				foreach ($list as $row) {
 					echo '<a class="row-list" href="/projectfifa3/website/'.$link.'/?pageId='.$row['id'].'" id="removeLinkStyle">';

 					for ($i=$negate; $i < $columnCnt; $i++) { 
 						echo '<div>'.$row[$arrayKeys[$i]].'</div>';
 					}
 					echo '</a>';
				}
 			break;

 			case 1:

 				// Rows match
 				foreach ($list as $row) {
 				  echo '<a class="row-list" href="/projectfifa3/website/wedstrijden/?pageId='.$row['id'].'" id="removeLinkStyle">
            				<div>
            					<svg width="50" height="50" data-jdenticon-hash="'.hash("md5", $row['poule_name'] * 5).'"></svg>
            				</div>
            				<div>
            					<svg width="50" height="50" data-jdenticon-hash="'.hash("md5", $row['name_a']).'"></svg>
								<h3>'.$row['name_a'].'</h3>
								<h4>'.$row['score_team_a'].'</h4>
            				</div>
            				<div>
            					<svg width="50" height="50" data-jdenticon-hash="'.hash("md5", $row['name_b']).'"></svg>
								<h3>'.$row['name_b'].'</h3>
								<h4>'.$row['score_team_b'].'</h4>
            				</div>
            				<div>'.$row['start'].'</div>
        				</a>';
 				}
 				break;
 		}

		// Footer
		echo '</div>
		      </div>';

		
	}
}
?>