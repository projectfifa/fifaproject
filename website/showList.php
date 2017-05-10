<?php
class showList {

	public function __construct($nameInput, $listInput, $negate, $type) {
		$header = $nameInput;
		$list = $listInput;
		$arrayKeys = array_keys($list[0]);
		$columnCnt = count($list[0]);


		// Header
		echo '<div class="showListHeader">'; echo $header; echo'</div>				
		      <div class="showListContent">';

		echo '<div class="row-list-columnheader">';
		for ($i=$negate; $i < $columnCnt; $i++) { 
 				echo '<div>'.$arrayKeys[$i].'</div>';
 			}
 			echo '</div>';


 		switch ($type) {
 			case 0:
 			default:

 				// Rows default
				foreach ($list as $row) {
 					echo '<div class="row-list">';

 					for ($i=$negate; $i < $columnCnt; $i++) { 
 						echo '<div>'.$row[$arrayKeys[$i]].'</div>';
 					}
 					echo '</div>';
				}
 			break;

 			case 1:

 				break;
 		}
 		/*
		// Rows default
		foreach ($list as $row) {
 			echo '<div class="row-list">';

 			for ($i=$negate; $i < $columnCnt; $i++) { 
 				echo '<div>'.$row[$arrayKeys[$i]].'</div>';
 			}
 			echo '</div>';
		}*/

		// Footer
		echo '</div>
		      <div class="showListFooter"></div>';



		
		
	}
}
?>